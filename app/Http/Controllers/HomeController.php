<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Auth;
use App\Category;
class HomeController extends Controller
{
    public function getHome(){
    	return view('pages.home');
    }
    public function getLogout(){
    	Auth::logout();
    	return redirect('login');
    }
    public function trangchu(){
    	return view('pages.index');
    }
    public function category(){
        $catelist = Category::all();
    	return view('pages.category', compact('catelist'));
    }
    public function editcategory(Request $Request, $id){
        $cate = Category::find($id);
    	return view('pages.editcategory', compact('cate'));
    }
    public function themcategory(Request $Request){
        $this->validate($Request ,
             [
                'tendanhmuc'=>'required|min:2|unique:vp_category,cate_name',
            ],
            [   
                'tendanhmuc.required'=>'Bạn chưa nhập tên',
                'tendanhmuc.min'=>'tên phải có ít nhất 2 kí tự',
                'tendanhmuc.unique'=>'Tên không được trùng',
            ]);
        $cate = new Category;
        $cate->cate_name = $Request->tendanhmuc;
        $cate->cate_slug = Str::slug($Request->tendanhmuc);
        $cate->save();
        return redirect('admin/category')->with('thongbao', 'Chúc mừng bạn đã thêm thành công!');
    }
    public function suacategory(Request $Request, $id){
        //dd($id);
        $this-> validate($Request,

            [
                'namet'=>'required|min:2|unique:vp_category,cate_name',
            ],
            [
                'namet.required'=>'Bạn chưa nhập tên',
                'namet.min'=>'tên phải có ít nhất 2 kí tự',
                'namet.unique'=>'Tên không được trùng',
            ]);
        $category = Category::find($id);
        $category->cate_name = $Request->namet;
        $category->cate_slug = Str::slug($Request->namet);
        $category->save();
        return redirect('admin/category')->with('thongbao', 'Chúc mừng bạn đã sửa thành công!');
    }
    public function xoacategory($id){
        $cate = Category::find($id);
        $cate->delete();
        return redirect('admin/category')->with('thongbao', 'Chúc mừng bạn đã xoá thành công!');
    }
}
