<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedback;

class FeedbackController extends Controller
{
    //
    public function getFeedback(){
        $data = Feedback::all();
        return view('admin.feedback.listFeedback',['data'=>$data]);
    }
    public function deleteFeedback($id){
        Feedback::where('id', $id)->delete();
        return redirect()->intended('admin/feedback')->with('success','Đã xóa phản hồi');
    }
}
