<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
class UserController extends Controller
{
    //
    public function getUser(){
        $data=User::get();
        return view('admin.user.listUser',['data' => $data]);
    }
    public function postUser(AddUserRequest $request){
        $users = new User;
        $users->name = $request->name;
        $users->email=$request->email;
        $users->password=bcrypt($request->password);
        $users->phone=$request->phone;
        $users->address=$request->address;
        $users->role=$request->role;
        $users->save();
        return redirect()->intended('admin/user')->with('success','Tạo tài khoản người dùng thành công');
    }
    public function getEditUser($id){
        $user = User::where('id', '=', $id)->first();
        return view('admin.user.editUser',['data'=>$user]);
    }
    public function postEditUser(EditUserRequest $request,$id){
        $users = User::find($id);
        if($users->role==1){
            $users->name = $request->name;
            $users->email=$request->email;
            $users->password=bcrypt($request->password);
            $users->phone=$request->phone;
            $users->address=$request->address;
            $users->role=$request->role;
            $users->save();
        }
        else{
            $users->name = $request->name;
            $users->email=$request->email;
            $users->password=bcrypt($request->password);
            $users->phone=$request->phone;
            $users->address=$request->address;
            $users->role=$users->role;
            $users->save();
        }
        return redirect()->intended('admin/user')->with('success','Sửa tài khoản thành công');
    }

    public function getAddUser(){
        return view('admin.user.addUser');
    }

    public function postDeleteUser(Request $request,$id){
          User::where('id', $id)->delete();
          return redirect()->intended('admin/user')->with('success','Xóa tài khoản thành công');
    }
}
