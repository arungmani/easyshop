<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

use Hash;

use DB;

use App\Customers;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $name = Auth::user()->name;
		
		$brandnew=DB::table('categorys')
        ->where('parentcategory',1)
        ->get();
        $used=DB::table('categorys')
        ->where('parentcategory',2)
        ->get();
        $banner=DB::table('banners')
        ->where('category',null)
        ->get();
        return view('customer/customrdashboard',compact('brandnew','used','banner','name'));
    }
	public function shoplistcustomer($id){
		 $name = Auth::user()->name;
		$banner=DB::table('banners')
        ->where('category',$id)
        ->get();
        $offers=DB::table('category_offers')
        ->where('category',$id)
        ->get();
        $product=DB::table('products')
        ->where('category_id',$id)
        ->get();
      
        return view('customer/shoplist',compact('banner','offers','product','name'));
	}
}
