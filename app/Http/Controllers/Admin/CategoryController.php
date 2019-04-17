<?php

namespace App\Http\Controllers\Admin;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Color;
use App\Size;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
class CategoryController extends Controller
{
    //
    public function getCategory(){
        $data=Category::get();
//        $data=Category::select(['id','name'])->orderBy('id','desc')->get();
//        $data=Category::select(['id'])->groupBy('id')->having('id','>',26)->get();
//        $da   ta=Category::select(['id'])->where('id',24)->get();
//        $data=Category::select(['id'])->groupBy('id')->skip(1)->take(3)->get();

//        foreach ($data as $item){
//            echo $item;
//            echo '<br>';
//        }

        return view('admin.category.listCategory',['data'=>$data]);
    }
    ///
    public function postAddCategory(AddCateRequest $request){
        $category = new Category;
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->slug = str_slug($request->name);
        $category->alias = $request->alias;
        $category->save();
        return redirect()->intended('admin/category')->with('success','Thêm danh mục thành công');
    }
    ///
    public function getAddCategory(){
        return view('admin.category.addCategory');
    }
    ///
    public function getEditCategory($id){
        $category = Category::where('id', '=', $id)->first();
        return view('admin.category.editCategory',['data'=>$category]);
    }
    ///
    public function postEditCategory(EditCateRequest $request,$id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->slug = str_slug($request->name);
        $category->alias = $request->alias;
        $category->save();
        return redirect()->intended('admin/category')->with('success','Sửa danh mục thành công');
    }
    ///
    public function postDeleteCategory(Request $request,$id){
        Category::where('id', $id)->delete();
        return redirect()->intended('admin/category')->with('success','Đã xóa danh mục sản phẩm');
    }
}
