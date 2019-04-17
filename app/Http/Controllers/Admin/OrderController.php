<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\About;
use App\OrderDetail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getOrder(){
        $order = Order::all();
        $orderDetail = OrderDetail::all();
//        $test = [];
//        foreach ($orderDetail as $t){
//            $test[] = $t['product_id'];
//        }
//        dd($test);
//        dd($orderDetail->toArray());
        return view('admin.order.listorder',['order'=>$order,'orderDetail'=>$orderDetail]);
    }

    public function getIntoOrder($id){
        $about=About::first();
        $order=Order::where('id', $id)->first();
//        dd($order);
        $orderDetail = OrderDetail::where('order_id','=',$id)->get();
        return view('admin.order.intoOrder')->with(compact('order','orderDetail','about'));
    }

    public function postActive(Request $request){
        $this->validate($request, [
           'id' => 'required',
           'paramsDetail' => 'required',
        ]);

        $paramsOrderDetail = $request->paramsDetail;
        $id = (int)$request->id;

        if(isset($id)) {
            DB::beginTransaction();
            try {
                Order::where('id', '=', $id)->update(['status' => 1]);
                foreach($paramsOrderDetail as $item){
                    $product = Product::where('id', $item['product_id'])->first();
                    $product->amount = $product->amount - (int) $item['pro_amount'];
                    $product->save();
                }
                DB::commit();
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
            }
            return response()->json(['success' => 'Xác thực thanh toán thành công!']);
        }
    }
    public function postDelete(Request $request)
    {
        $id = (int)$request->id;
        if (isset($id)) {
            $orderProduct = Order::where('id', '=', $id)->delete();
            OrderDetail::where('order_id','=',$id)->delete();
            if ($orderProduct) {
                return response()->json(['success' => 'Xác thực xóa thành công!']);
            }
            return response()->json(['error' => 'Xác thực xóa thất bại!']);
        }
    }
}
