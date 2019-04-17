<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;

class PostController extends Controller
{
    //
    public function getPost(){
        $data = Posts::all();
        return view('admin.posts.listPost',['post'=>$data]);
    }

    public function deletePost($id){
        Posts::where('id', $id)->delete();
        return redirect()->intended('admin/post')->with('success','Đã xóa bản tin');
    }

    public function getAddPost(){
        return view('admin.posts.addPost');
    }
    public function postAddPost(Request $request){
        $data = $request->all();
        $file = $request->file('thumb');
        $filename = 'uploads/posts';
        $file->move($filename,$file->getClientOriginalName());
        $data['thumb'] = $filename .'/'. $file->getClientOriginalName();
        $data['slug'] = str_slug($request->title);
        Posts::create($data);
        return redirect()->intended('admin/post')->with('success','Đã thêm');
    }

    public function getEditPost($id){
        $data = Posts::where('id',$id)->first();
        return view('admin.posts.editPost',['data'=>$data]);
    }
    public function postEditPost(Request $request, $id){
        $input= $request->all();
        $data=Posts::where('id', $id)->first();
        if($request->hasFile('thumb')){
            $file = $request->file('thumb');
            $filename = 'uploads/posts';
            $file->move($filename,$file->getClientOriginalName());
            $input['image'] = $filename .'/'. $file->getClientOriginalName();
        }else{
            $input['thumb'] = $data->thumb;
        }
        $data->update($input);
        return redirect()->intended('admin/post')->with('success','Đã sửa');
    }
}
