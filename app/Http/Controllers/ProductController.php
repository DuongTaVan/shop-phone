<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;
use App\Product;
use DB;
use App\Product_order;
use App\Order;
use Cart;
class ProductController extends Controller
{
    public function trangchuproduct(){
    	return view('pages.homeproduct');
    }
    public function themproduct(){
    	$them = Category::all();
    	return view('pages.addproduct',compact('them'));
    }
    public function suaproduct($id){
        $prod = product::find($id);
        $cate = Category::all();
    	return view('pages.editproduct', compact('prod','cate'));
    }
    public function postaddproduct(Request $Request){
    	$this->validate($Request,['img'=>'image'],['img.image'=>'Không tồn tại file ảnh']);
        $filename = $Request->img->getClientOriginalName();
    	$product = new Product();
    	$product->prod_name = $Request->name;
    	$product->prod_slug = Str::slug($Request->name);
    	$product->prod_price = $Request->price;
    	$product->prod_img = $filename;
    	$product->prod_wanranty = $Request->warranty;
    	$product->prod_accessories = $Request->accessories;
    	$product->prod_condition = $Request->condition;
    	$product->prod_promotion = $Request->promotion;
    	$product->prod_status = $Request->status;
    	$product->prod_description = $Request->description;
    	$product->prod_featured = $Request->featured;
    	$product->prod_cate = $Request->cate;
    	$product->save();
        $Request->img->storeAs('avatar',$filename);
        return redirect('admin/themproduct')->with('thongbao', 'Chúc mừng bạn đã thêm thành công!');

    }
    public function product(){
        $productlist = DB::table('vp_product')->join('vp_category','vp_product.prod_cate','=','vp_category.cate_id')->orderBy('prod_id','desc')->get();
    	return view('pages.product', compact('productlist'));
    }
    public function suasp(Request $Request, $id){
        $this->validate($Request,['img'=>'image'],['img.image'=>'Không tồn tại file ảnh']);
       // $filename = $Request->img->getClientOriginalName();
        $product = Product::find($id);
        $product->prod_name = $Request->name;
        $product->prod_slug = Str::slug($Request->name);
        $product->prod_price = $Request->price;
        if($Request -> hasFile('img')){
            $filename = $Request->img->getClientOriginalName();
            $product->prod_img = $filename;
            $Request->img->storeAs('avatar',$filename);
        }
        
        $product->prod_wanranty = $Request->warranty;
        $product->prod_accessories = $Request->accessories;
        $product->prod_condition = $Request->condition;
        $product->prod_promotion = $Request->promotion;
        $product->prod_status = $Request->status;
        $product->prod_description = $Request->description;
        $product->prod_featured = $Request->featured;
        $product->prod_cate = $Request->cate;
        $product->save();
        
        return redirect('admin/product')->with('thongbao', 'Chúc mừng bạn đã sửa thành công!');
    }
    public function xoasp($id){
        $pr = Product::find($id);
        $pr->delete();
        return redirect('admin/product');
    }
    public function khachhang(){
        $user = Order::where('state',1)->get();
        return view('pages.user', compact('user'));
    }
    public function chitietdonhang($id){
        $user = Order::find($id);
        $chitiet = Product_order::where('or_order','=',$id)->get();
        //dd($chitiet);
        return view('pages.donhang', compact('chitiet','user'));
    }
   public function daxuli($id){
       // $state = Order::where('or_id',$id)->first();
        $state = Order::find($id);
        //sdd($state);
        $state->state = 2;
        $state->save();
        //dd($state);
        return redirect('admin/process');
   }
   public function process()
   {
        $process = Order::where('state',2)->get();
        return view('pages.process', compact('process'));
   }
   public function chitietdonhangdaxuli($id){
        $user = Order::find($id);
        $chitiet = Product_order::where('or_order','=',$id)->get();
        //dd($chitiet);
        return view('pages.donhangdaxuli', compact('chitiet','user'));
    }
}
