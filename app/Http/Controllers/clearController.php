<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Cart;
use App\Comment;
use App\UserK;
use App\Order;
use App\Product_order;
use App\User;
use Mail;
class clearController extends Controller
{
    //
    public function getHome(){
    	$spnb = Product::where('prod_featured','1')->orderBy('prod_id','DESC')->take(8)->get();
  		$spm = Product::orderBy('prod_id','DESC')->take(8)->get();

    	return view('frontend.home', compact('spnb', 'spm'));
    }
    public function getdmsp(){
    	$dm = Category::all();
    	return view('fontend.master', compact('dm'));
    }
    public function getchitiet($id){
    	$detail = Product::find($id);
        $comment = Comment::where('com_product',$id)->paginate(3);
    	return view('frontend.detail', compact('detail','comment'));
    }
    public function getdathang($id){
    	$prod = Product::find($id);
    	Cart::add(['id' => $id,'weight' => 550, 'name' => $prod->prod_name, 'qty' => 1, 'price' => $prod->prod_price,  'options' => ['img' => $prod->prod_img]]);
    	
    	// dd(Cart::content());
    	return redirect('clear/show');
    }
    public function getshow(){
    	$total = Cart::total();
    	$data = Cart::content();
    	//dd($data);
    	return view('frontend.cart', compact('data','total'));
    }
    function getTimkiem(Request $request)
    {
        // $tukhoa = $request->tukhoa;
        $tukhoa=$request->get('tukhoa');
       // dd($tukhoa);
        $product = Product::where('prod_name','like','%'.$tukhoa.'%')->orWhere('prod_price','like','%'.$tukhoa.'%')->paginate(8);
        return view('frontend.timkiem',compact('product','tukhoa'));
    }
    public function getdelete($id){
    	//dd(Cart::content());
    	//$rowid = Cart::rowId;
    	//Cart::remove($id);
    	//return redirect('clear/show');
    	Cart::remove($id);
    	return redirect('clear/show');
		}
	public function getdestroy(){
		Cart::destroy();
		return redirect('clear/show');
    }
    public function getdanhmucsp($id){
		$product = Product::where('prod_cate',$id)->paginate(8);
		return view('frontend/danhmucsp', compact('product'));

    }
    public function getComment(Request $Request,$id){
        $comment = new Comment;
        $comment->com_name = $Request->name;
        $comment->com_email = $Request->email;
        $comment->com_content = $Request->content;
        $comment->com_product = $id;
        $comment->save();
        return back();
    }
    public function getUpdate(Request $Request){
        //dd($Request->$rowId);
        Cart::update($Request->rowId, $Request->qty);
       // return redirect('clear/show');
    }
    public function getComplete(Request $Request){
       // dd(Cart::content());
        $user = new Order;
        $user->or_name = $Request->name;
        $user->or_phone = $Request->phone;
        $user->or_address = $Request->address;
        $user->or_email = $Request->email;
        $user->state = 1;
        $user->or_total = Cart::total();
        $user->save();

        foreach(Cart::content() as $cart)
        {
            $pr =new Product_order;
            $pr->pro_name = $cart->name;
            $pr->or_qty = $cart->qty;
            $pr->or_price = $cart->price;
            $pr->or_img = $cart->options->img;
            $pr->or_order = $user->or_id;
            $pr->save();
        }
        Cart::destroy();
        
        return view('frontend.complete');
    }
    public function getListuser(){
        $user = User::paginate(5);
        return view('pages.listuser',compact('user'));
    }
    public function getAdduser(){
        
        return view('pages.adduser');
    }
    public function getEdituser($id){
        $user = User::find($id);
        return view('pages.edituser', compact('user'));
    }
    public function postAddUser(Request $Request){
        $user = new User;
        $user->email = $Request->email;
        $user->password = $Request->password;
        $user->level = $Request->level;
        $user->save();
        return redirect('clear/listuser')->with('thongbao','Thêm thành công user');
    }
    public function postEditUser($id, Request $Request){
        $user =  User::find($id);
        $user->email = $Request->email;
        $user->password = bcrypt($Request->password);
        $user->level = $Request->level;
        $user->save();
        return redirect('clear/listuser')->with('thongbao','Thêm thành công user');
    }
    public function getDeluser($id){
        $user =  User::find($id);
        $user->delete();
        return redirect('clear/listuser')->with('thongbao','Xóa thành công user');
    }
    public function gettComplete(Request $Request){
        $info = $Request->all();
        $email = $Request->email;
        $total = Cart::total();
        $cart = Cart::content();
        Mail::send('frontend.email',compact('info','email','total','cart'), function ($message) use ($email){
            $message->from('Duongtv2712@gmail.com','DuongGA');

            $message->to($email,$email);

            $message->cc('duongga123@gmail.com','Duong GA');

            $message->subject('xác nhận hóa đơn mua hàng VietPro Shop');
        });
        return view('frontend.complete');
    }

}
    	
   