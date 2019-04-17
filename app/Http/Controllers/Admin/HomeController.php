<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\About;
use App\Order;
use App\Category;
use App\User;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AboutRequest;

class HomeController extends Controller
{
    //
    public function getHome(){
        $data=About::where('id', '=', 1)->first();
        $countUser=User::all()->count();
        $countCate=Category::all()->count();
        $countOrder=Order::all()->count();
        $countProduct=Product::all()->count();
        return view('admin.home.home',['data'=>$data,'countuser'=>$countUser,'countcate'=>$countCate,'countpro'=>$countProduct,'countorder'=>$countOrder]);
    }

    public function postAbout(AboutRequest $request, $id){
        $data = $request->except(['_token']);
        $update = About::where('id','=',$id)->update($data);
//        $updateQueryBuilder = DB::table('about')->where('id','=',$id)->update($data);
        if($update) {
            return back()->with('success','Cập nhật thông tin thành công!!!');
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->intended('/admin/login');
    }
}
