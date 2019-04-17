<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use Session;
class CartController extends Controller
{
    //
    public function getAddCart($id, Request $request){
        $data=$request->all();
        $product=Product::with('sizes','colors')->find($id);
//        dd($product->toArray());
//        dd($product->sizes);

        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => $data['acount'],
            'price' => $product->sale,
            'options' => [
                'img' => $product->thumb,
                'size'=>$data['size'],
                'color'=>$data['color']
            ]
        ]);
//        $data=Cart::content();
//        dd($data);
        return redirect('cart/showcart')->with('success','thêm vào giỏ hàng thành công!!!');
    }

    public function getShowCart(){
        $total = Cart::total();
//        dd($total);
        $data=Cart::content();
//        dd($data);
        return view('client.cart.listCart',['data'=>$data,'total'=>$total]);
    }


    public function getDeleteCart(Request $request){
        if ($request->get('target') == 'all') {
            Cart::destroy();
        } else {
            Cart::remove($request->get('target'));
        }
        return back();
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->rowId,$request->qty);
//        echo json_encode([
//            'success' => true,
//            'new_price' => '',
//        ]);
//        exit;
    }
}
