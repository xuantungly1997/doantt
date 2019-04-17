<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function getComment(){
        $comment = Comment::all();
        return view('admin.product.listcomment',['data'=>$comment]);
    }
    public function deleteComment($id){
        Comment::where('id', $id)->delete();
        return redirect()->intended('admin/comment')->with('success','Đã xóa nhận xét sản phẩm');
    }
}
