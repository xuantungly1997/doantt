<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Product;
use App\ProductSize;
use App\ColorProduct;
use DB;
use App\Color;
use App\Size;
use App\Http\Requests\AddProductRequest;

class ProductController extends Controller
{

    public function getProduct(){
    	$product = Product::with(['cates','colors', 'sizes','comments'])->get();
//    	dd($product->toArray());
        return view('admin.product.listProduct')->with(compact('product'));
    }

    public function getEditProduct($id){
        $cate=Category::select('name','parent_id','id')->get()->toArray();
        $color=Color::all();
        $size=Size::all();
        $editpro = Product::with('colors','sizes')->where('id', '=', $id)->first();
//        dd($editpro->toArray());
        return view('admin.product.editProduct',['data'=>$editpro,'cate'=>$cate,'color'=>$color,'size'=>$size]);
    }
    ///post edit product
    public function postEditProduct(Request $request,$id){
        $data = $request->all();
        $info=Product::where('id',$id)->first();
//        dd($data);
        ColorProduct::where('product_id',$id)->delete();
        ProductSize::where('product_id',$id)->delete();
        if(isset($data['file'])){
            $images = [];
            $files=$data['file'];
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('uploads/products'),$name);
                $images[]=$name;
                $data['file'] = implode("|",$images);
                $img = explode('|',$info->file);
                foreach ($img as $value)
                {
                    File::delete(public_path('uploads/products/'.$value));
                }
            }
        }
        else
        {
            $data['file'] = $info->file;
        }

//        dd($data);

        $record = Product::where('id','=',$id)->first();
        $update = $record->fill($data)->save();
        $this->insertInToTableProductColor($record->id, $data['color']);
        $this->insertInToTableProductSize($record->id, $data['size']);
        if($update){
            return redirect()->intended('admin/product');
        }

    }

    public function getAddProduct(){
        $cate=Category::select('name','id')->get()->toArray();
        $color=Color::all();
        $size=Size::all();
        return view('admin.product.addProduct',['cate'=>$cate,'color'=>$color,'size'=>$size]);
    }
    public function PostAddProduct(AddProductRequest $request){
        $dataProduct = $request->all();
        $images = [];
        if($files=$dataProduct['file']) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('uploads/products'),$name);
                $images[]=$name;
            }
        }
        $dataProduct['file'] = implode("|", $images);
        $insert = Product::create($dataProduct);
        $this->insertInToTableProductColor($insert->id, $dataProduct['color']);
        $this->insertInToTableProductSize($insert->id, $dataProduct['size']);
        return redirect()->intended('admin/product')->with('success','Thêm sản phẩm thành công');

    }

    public function insertInToTableProductColor($idProduct, $dataColor) {
        if(count($dataColor)) {
            foreach ($dataColor as $id) {
                ColorProduct::updateOrCreate(['product_id' => $idProduct, 'color_id' => (int)$id]);
            }
        }
    }
    public function insertInToTableProductSize($idProduct, $dataSize) {
        if(count($dataSize)) {
            foreach ($dataSize as $id) {
                ProductSize::updateOrCreate(['product_id' => $idProduct, 'size_id' => (int)$id]);
            }
        }
    }
//    ============
    public function postDeleteProduct($id){
        Product::where('id', $id)->delete();
        ColorProduct::where('product_id',$id)->delete();
        ProductSize::where('product_id',$id)->delete();
        return redirect()->intended('admin/product')->with('deletesuccess','Đã xóa tài khoản khách hàng');
    }

//    =====delete comment
    public function deleteComment($id){
        $cmt = Comment::where('id', $id)->delete();
        if($cmt) {
            return response()->json(['success' => 'Xóa thành công!']);
        }
        return response()->json(['error' => 'Xóa thất bại!']);
    }
}


