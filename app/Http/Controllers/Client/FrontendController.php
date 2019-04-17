<?php

namespace App\Http\Controllers\Client;
use App\About;
use App\User;
use App\Product;
use App\Comment;
use App\Feedback;
use App\Posts;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use function JmesPath\search;
use Session;
use Auth;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCustomerRequest;
use App\Http\Requests\UpdateInforRequest;
class FrontendController extends Controller
{
    //get home
    public function getHomeCl(){
        $product = Product::where('status',1)->where('feauture',1)->orderBy('id','desc')->get()->take(3);
        $slidepro = Product::where('status',1)->where('feauture',2)->orderBy('id','desc')->get();
//        dd($product->toArray());
        return view('client.home.home')->with(compact('product','slidepro'));
    }
    //get login
    public function getLogin(){
        return view('client.login.login');
    }

    //post login
    public function postLogin(Request $request){
        //kieerm tra login request
        $this->validate($request,
            [
                'email_lg'=>'required|email',
                'password_lg'=>'required|min:6|max:50',
            ],
            [
                'email_lg.email'=>'Chưa đúng định dạng email',
                'email_lg.required'=>'Vui lòng nhập email',
                'password_lg.required'=>'Vui lòng nhập mật khẩu',
                'password_lg.min'=>'Nhập mật khẩu ít nhất 6 kí tự',
                'password_lg.max'=>'Nhập mật khẩu không quá nhất 50 kí tự',
            ]
        );

        $email = $request->input('email_lg');
        $password = $request->input('password_lg');
        $customer = Customer::where('email', '=', $email)->first();
        if($customer && Hash::check($password, $customer->password)) {
            Session::put('customerInfo', $customer);
            return redirect()->back()->with(['flag'=>'alert-success','message'=>'Đăng nhập thành công']);
        } else {
            return redirect()->back()->with(['flag'=>'alert-danger','message'=>'Đăng nhập không thành công']);
        }
    }

    ///logout
    public function getLogout(){
//        return redirect()->intended('/');
        Session::forget('customerInfo');
        return redirect()->intended('login');
    }


/////////add customer
    public function postAddCustomer(AddCustomerRequest $request){
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->birthday = $request->birthday;
        $customer->password = bcrypt($request->password);
        $customer->save();
        return back()->with('success','Tạo tài khoảng thành công');
    }
    //////get about us
    public function getAbout(){
        return view('client.about.about');
    }

    ////get payments
    public function getSupport(){
        return view('client.about.support');
    }
    ////get contact
    public function getContact(){
        return view('client.contact.contact');
    }
    public function postContact(Request $request){
//        dd($request->toArray());
        $feedback = new Feedback;
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->cate_feedback = $request->cate_feedback;
        $feedback->content = $request->feed_content;
        $feedback->save();
        return back()->with('success','Gửi phản hồi thành công!!!');
    }
    //get product theo sarn phẩm mới, hot, sale

    public function getProduct(Request $request,$target){
//        dd($target);
        if($target == 'hot'){
            $product=Product::where('status',1)->where('feauture',2)->orderBy('id','desc')->paginate(6);
        }
        elseif($target == 'new'){
            $product=Product::where('status',1)->where('feauture',1)->orderBy('id','desc')->paginate(6);
        }
        elseif($target == 'sale'){
            $product=Product::where('status',1)->where('promotion_price','>',0)->orderBy('id','desc')->paginate(6);
        }
        else{
            $product=Product::where('status',1)->orderBy('id','desc')->paginate(6);
        }

    //        dd($product->toArray());
        return view('client.product.allProduct',compact('product'));
    }
    ///get product theo category
    public function getCateProduct($id){
        $catepro=Product::where('cate_id',$id)->where('status',1)->where('amount','>',0)->orderBy('id','desc')->paginate(3);
//        dd($catepro->toArray());
        return view('client.product.listProduct',compact('catepro'));
    }
    ///get detail product
    public function getDetail($id){
        $comment = Comment::where('com_product',$id)->get();
        $detailpro=Product::with(['colors', 'sizes'])->find($id);
        $prosame=Product::where('cate_id','=',$detailpro['cate_id'])->get();
//        dd($prosame->toArray());
        return view('client.product.detailProduct')->with(compact('detailpro','comment','prosame'));
    }
    ////post comment
    public function postComment(Request $request, $id){
        $comment = new Comment;
        $comment->name=$request->name;
        $comment->star=$request->star;
        $comment->content=$request->com_content;
        $comment->com_product = $id;
        $comment->save();
//        dd($comment->toArray());
        return back();
    }
    ///get post
    public function getPost(){
        $data = Posts::orderBy('id','desc')->paginate(4);
        return view('client.post.listPost',['data'=>$data]);
    }

    public function getDetailPost($id)
    {
        $detailpost = Posts::where('id',$id)->first();
        return view('client.post.detailPost',['detailpost'=>$detailpost]);
    }

    ////get search
    public function getSearch(Request $request){
       $resultdf= $request->result;
       $result=str_replace(' ','%' , $resultdf);
       $data = Product::where('name','like','%'.$result.'%')->paginate(3);
//       dd($data);
       return view('client.search.search',['product'=>$data,'result'=>$resultdf]);
    }
    ///get infor customer
    public function getUpdate(){
        return view('client.inforcustomer.updateinfor');
    }
    ///update infor customer
    public function postUpdate(Request $request, $id){

        $data = $request->except(['_token']);

        $dataCustomer = Customer::where('id', '=', $id)->first();
//        dd($dataCustomer->toArray());
        $dataValidate = [
            'name'=>'required|min:6|max:150',
            'email'=>'required|email|unique:customer,email,'.$id,
            'phone'=>'required|numeric|min:10',
            'address'=>'required|max:500',
            'birthday'=>'required',
        ];
        $dataMessage = [
            'name.required'=>'Yêu cầu nhập họ tên!!!',
            'name.min'=>'Tên k dưới 6 kí tự',
            'name.max'=>'Tên k trên 150 kí tự',
            'email.required'=>'Yêu cầu nhập email',
            'email.email'=>'Chưa đúng định dạng email',
            'email.unique'=>'email đã sử dụng',
            'phone.required'=>'Yêu cầu nhập số điện thoại',
            'phone.min'=>'Số điện thoại trên 10 số',
            'phone.numeric'=>'Đây k phải số điện thoại',
            'address.required'=>'Yêu cầu nhập địa chỉ',
            'address.max'=>'Địa chỉ k quá 250 kí tự',
            'birthday.required'=>'Yêu cầu nhập ngày',
        ];

        if(isset($data['password'])) {
            $dataValidate['password'] = 'min:6|max:30';
            $dataValidate['confirmpass'] = 'required|same:password';
            $dataMessage['password.min'] = 'Mật khẩu ít nhất 6 kí tự';
            $dataMessage['password.max'] = 'Mật khẩu k quá 30 kí tự';
            $dataMessage['confirmpass.required'] = 'Yêu cầu nhập lại pass';
            $dataMessage['confirmpass.same'] = 'nhập lại không đúng pass';
            $data['password']=bcrypt($data['password']);
        } else {
            $data['password'] = $dataCustomer->password;
        }

        $this->validate($request, $dataValidate, $dataMessage);
        unset($data['confirmpass']);
//        dd(Carbon::parse(Session::get('customerInfo')->birthday)->format('d/m/Y'));
        $update = Customer::where('id','=',$id)->update($data);
//        dd($update);
        if($update) {
            return back()->with('success','Bạn đã cập nhật thông tin thành công!!! Vui lòng đăng nhập lại!!!');
        }
    }
}


