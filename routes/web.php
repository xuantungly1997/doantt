<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'Admin'],function(){
//    //router cho login
//    Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function (){
//        route::get('/','LoginController@getLogin');
//        route::post('/','LoginController@postLogin');
//    });
//    /////router cho logout
//    Route::get('logout','HomeController@getLogout')->name('logout');
    /// route home
    route::get('/admin/login','LoginController@getLogin');
    route::post('/admin/login','LoginController@postLogin');
    Route::get('/admin/logout','HomeController@getLogout')->name('logoutadmin');

    Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function (){
        ////
        Route::get('home','HomeController@getHome')->name('homeadmin');
        Route::post('home/{id}','HomeController@postAbout')->name('postabout');
        ///Route user
        Route::group(['prefix'=>'user'],function (){
            Route::get('/','UserController@getUser')->name('user');
            Route::post('/',['as'=>'createuser' , 'uses'=>'UserController@postUser']);
            ///route add user
            Route::get('add','UserController@getAddUser')->name('adduser');
            ///route edit user
            Route::get('edit/{id}','UserController@getEditUser')->name('edituser');
            Route::post('edit/{id}',['as'=>'editpostuser' , 'uses'=>'UserController@postEditUser']);
            ///route delete user
            Route::post('delete/{id}',['as'=>'deleteuser','uses'=>'UserController@postDeleteUser']);
        });
        ///Route category
        Route::group(['prefix'=>'category'],function (){
            Route::get('/','CategoryController@getCategory')->name('category');
            Route::post('/',['as'=>'createcategory' , 'uses'=>'CategoryController@postAddCategory']);
            ///route add category
            Route::get('add','CategoryController@getAddCategory')->name('addcategory');
            ///route edit user
            Route::get('edit/{id}','CategoryController@getEditCategory')->name('editcategory');
            Route::post('edit/{id}',['as'=>'editpostcategory' , 'uses'=>'CategoryController@postEditCategory']);
            ///route delete user
            Route::post('delete/{id}',['as'=>'deletecategory','uses'=>'CategoryController@postDeleteCategory']);
        });
        ////Router product
        Route::group(['prefix'=>'product'],function (){
            Route::get('/','ProductController@getProduct')->name('product');
            //////edit product
            Route::get('edit/{id}','ProductController@getEditProduct')->name('editproduct');
            Route::post('edit/{id}','ProductController@postEditProduct')->name('posteditproduct');
            //////add product
            Route::get('add','ProductController@getAddProduct')->name('addproduct');
            Route::post('add','ProductController@PostAddProduct')->name('postAddProduct');
            //// delete product
            Route::post('delete/{id}',['as'=>'deleteproduct','uses'=>'ProductController@postDeleteProduct']);
            ///delete comment
            Route::post('/{id}','ProductController@deleteComment')->name('deletecomment');

        });
        ////Router custom
        Route::group(['prefix'=>'customer'],function (){
            Route::get('/','CustomerController@getCustomer')->name('customer');
            ///route delete user
            Route::post('delete/{id}',['as'=>'deletecustomer','uses'=>'CustomerController@postDeleteCustomer']);
        });

        ////router feedback
        Route::group(['prefix'=>'feedback'],function (){
            Route::get('/','FeedbackController@getFeedback')->name('feedback');
            Route::post('delete/{id}','FeedbackController@deleteFeedback')->name('deletefeedback');
        });

        ////router comment
        Route::group(['prefix'=>'comment'],function (){
            Route::get('/','CommentController@getComment')->name('comment');
            Route::post('delete/{id}','CommentController@deleteComment')->name('deletecomment');
        });
        ///// tin tức
        Route::group(['prefix'=>'post'],function (){
            Route::get('/','PostController@getPost')->name('post');
            Route::post('delete/{id}','PostController@deletePost')->name('deletepost');

            Route::get('/add','PostController@getAddPost')->name('getaddpost');
            Route::post('/add','PostController@postAddPost')->name('addpost');

            Route::get('/edit/{id}','PostController@getEditPost')->name('geteditpost');
            Route::post('/edit/{id}','PostController@postEditPost')->name('editpost');
        });
        ///thống kê
        Route::group(['prefix'=>'statistical'],function (){
            Route::get('/','StatisticalController@getStatistical')->name('statistical');
            Route::post('/','StatisticalController@getStatisticalintoday')->name('statisticalintoday');

            Route::get('/doanhthu','StatisticalController@getRevenue')->name('revenue');

            Route::get('thongke','StatisticalController@getIndex')->name('thongke');
            Route::get('loc','StatisticalController@filters')->name('filters');
        });
        ///show order
        Route::get('order','OrderController@getOrder')->name('getadminorder');
        Route::post('order','OrderController@postActive');

        Route::post('order/delete','OrderController@postDelete');

        Route::get('order/printorder/{id}','OrderController@getIntoOrder')->name('getintoorder');


    });
});


//========Client====
//======
Route::group(['namespace'=>'Client'],function() {
    //get home client
    Route::get('/','FrontendController@getHomeCl')->name('homeclient');

    Route::get('login','FrontendController@getLogin')->name('getlogin');
    Route::get('logout','FrontendController@getLogout')->name('getlogout');

    //đăng kí tài khoản người dùng
    Route::post('login','FrontendController@postAddCustomer')->name('postcustomer');
    //đăng nhập
    Route::post('save-login','FrontendController@postLogin')->name('postlogin');
    ///about us
    Route::get('about','FrontendController@getAbout')->name('about');
    ///payments
    Route::get('support','FrontendController@getSupport')->name('support');
    //update infor cá nhân
    Route::get('updateinfor','FrontendController@getUpdate')->name('updateinfor');
    Route::post('updateinfor/{id}','FrontendController@postUpdate')->name('postupdate');

    //liên hệ
    Route::get('contact','FrontendController@getContact')->name('getcontact');
    Route::post('contact','FrontendController@postContact')->name('postcontact');

    //product
    Route::get('product/{target}','FrontendController@getProduct')->name('getproduct');
    Route::get('cateproduct/{id}','FrontendController@getCateProduct')->name('getcateproduct');
    /// get detail product
    Route::get('detail/{id}','FrontendController@getDetail')->name('getdetail');
    Route::post('detail/{id}','FrontendController@postComment')->name('postcomment');
    //posst
    Route::get('post','FrontendController@getPost')->name('getpost');
    Route::get('post/detail/{id}','FrontendController@getDetailPost')->name('getdetailpost');

    ///search product
    Route::get('search','FrontendController@getSearch')->name('getsearch');

});

/////add cartgetadd
Route::group(['prefix'=>'cart'],function (){
    //cart
//    Route::get('showcart','CartController@getCart')->name('getcart');
    Route::get('add/{id}','CartController@getAddCart')->name('getadd');
    Route::get('showcart','CartController@getShowCart')->name('getshowcart');
    Route::get('delete','CartController@getDeleteCart')->name('getdeletecart');
    Route::get('update','CartController@getUpdateCart');
});
//====dặt hàng
Route::group(['prefix'=>'order'],function (){
    Route::get('/','OrderController@getOrder')->name('getorder');
    Route::post('/','OrderController@postOrder')->name('postorder');
});


Route::get('test','TestController@getTest');
//dm cái bug lol trâu này làm mình sai :/ nhớ nhớ nhớ
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/craw', function() {
    $crawler = Goutte::request('GET', 'https://dantri.com.vn/');
    $crawler->filter('.ulnew li h4 a')->each(function ($node) {
        echo $node->text(). "</br>";
    });
    return view('welcome');
});


