<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    //
    public function getCustomer(){
        $data=Customer::paginate(4);
        return view('admin.customer.listCustomer',['data'=>$data]);
    }

    public function postDeleteCustomer(Request $request,$id){
        Customer::where('id', $id)->delete();
        return redirect()->intended('admin/customer')->with('deletesuccess','Đã xóa tài khoản khách hàng');
    }
}
