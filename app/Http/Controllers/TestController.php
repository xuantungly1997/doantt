<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
class TestController extends Controller
{
    //
    public function getTest(){
//        $data=User::where('role',1)->get();
        //orderBy để sắp sếp id nhỏ dần
//        $mdata=User::Select(['id','name','role','email'])->where('role',1)->orderBy('id','desc')->get();
       //groupBy nhớm đối tượng vào 1 nhóm có id>36
//        $data = User::select('id')->groupBy('id')->having('id','>',36)->get();
        /// hàm skip === limit php
//        $data = User::select('id')->skip(1)->take(5)->get();

        //đếm
//        echo $data->count();
//        dd($data->toArray());
//        $x = 100;
//        $tong=0;
//        for ($j=0;$j<$x;$i++)
//        if($tong==$x){
//            dd('la so hoan hao: ');
//        }
//        else{
//            dd($x +'khong la so hh');
//        }
        $crawler = Goutte::request('GET', 'https://dantri.com.vn/');
        $crawler->filter('.ulnew li h4 a')->each(function ($node) {
            echo $node->text(). "</br>";
        });

        return view('test');
    }

}
