<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Cart;
use App\Order;
use App\About;
use App\OrderDetail;
use App\Mail\sendOrder;
use Illuminate\Support\Facades\Mail;
use Main;
use Session;

class OrderController extends Controller
{
    //
    public function getOrder(){
        $data=Cart::content();
        $total = Cart::total();
        return view('client.order.order',['data'=>$data,'total'=>$total]);
    }
    public function postOrder(Request $request){
        $this->validate($request,
            [
                'email'=>'email',
                'phone'=>'numeric',
            ],
            [
                'email.email'=>'Chưa đúng định dạng email',
                'phone.numeric'=>'Vui lòng nhập chữ số',
            ]
        );
        $input = $request->all();
        $input['status']= '0';
        $input['date_order'] = Carbon::now()->format('Y-m-d');
        $input['total'] = $this->convertTotal();
        $newOrder = Order::create($input);
//        ========order detail
        $cart = Cart::content();
        $dataOrderDetail = [];
        foreach ($cart as $key)
        {
            $dataOrderDetail['order_id'] = $newOrder->id;
            $dataOrderDetail['product_id'] = $key->id;
            $dataOrderDetail['pro_name'] = $key->name;
            $dataOrderDetail['pro_size'] = $key->options['size'];
            $dataOrderDetail['pro_color'] = $key->options['color'];
            $dataOrderDetail['pro_amount'] = $key->qty;
            $dataOrderDetail['pro_price'] = $key->price;

            if(count($dataOrderDetail)) {
                OrderDetail::create($dataOrderDetail);
            }

        }
        $orderdetails = OrderDetail::where('order_id','=',$newOrder->id)->get();
        $email = $request->email;
        $about = About::find(1);
        /////////////?
        try{

            Mail::to($email,$email)->send(new SendOrder($newOrder,$orderdetails,$about));
        }
        catch(Exception $e){
            throw $e;
        }
//        ===========

        Cart::destroy();
        return back()->with('success','Đặt hàng thành công!!!!');
    }
//format string về double
    public function convertTotal() {
        $strTotal = '';
        $dataTotal = explode(',',explode('.',Cart::total())[0]);
        foreach ($dataTotal as $item) {
            $strTotal = $strTotal . $item;
        }
        return (float)$strTotal;
    }
}
