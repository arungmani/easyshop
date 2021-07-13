<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Hash;

use DB;

use Auth;

use App\Customers;

use App\Tbl_order_masters;

use App\Tbl_order_trans;

use App\Tbl_deladds;

use App\Reviews;

use App\Tbl_shipping_details;

use App\Tbl_countrys;

use App\Shop_products;

use App\Product_variants;

use App\Shop;


use Redirect;



class WebController extends Controller
{
    public function index(){
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           
        }else{
            $id=0;
        } 
        $brandnew=DB::table('categorys')
        ->where('parentcategory',1)
        ->where('deleted_status',0)
        ->get();
       // echo "<pre>";print_r($brandnew);exit;
        $used=DB::table('categorys')
        ->where('parentcategory',2)
        ->where('deleted_status',0)
        ->get();
        $banner=DB::table('banners')
        ->where('category',null)
        ->get();
        return view('index',compact('brandnew','used','banner','id'));
    }
    public function errorpage(){
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           
        }else{
            $id=0;
        } 
        return view('errorpage',compact('id'));
    }
    public function subcatlist($idd){
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           
        }else{
            $id=0;
        } 
         $subcat=DB::table('categorys')
         ->where('parentcategory',$idd)
         ->where('deleted_status',0)
         ->get();
         $banner=DB::table('banners')
         ->where('category',$idd)
         ->get();
         $category=DB::table('categorys')
         ->where('id',$idd)
         ->where('deleted_status',0)
         ->first();
         return view('subcatlist',compact('subcat','banner','category','id'));
    }
    public function productlist($idd){
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           
        }else{
            $id=0;
        } 
        $banner=DB::table('banners')
        ->where('category',null)
        ->get();
        $offers=DB::table('category_offers')
        ->where('category',$idd)
        ->where('deleted_status',0)
        ->get();
        $product=DB::table('products')
        ->where('subsub_cat_id',$idd)
        ->where('deleted_status',0)
        ->get();
        $product1=DB::table('products')
        ->where('subsub_cat_id',$idd)
        ->where('deleted_status',0)
        ->get();
        $subcat=DB::table('categorys')
        ->where('id',$idd)
        ->where('deleted_status',0)
        ->first();
        $category=DB::table('categorys')
        ->where('id',$subcat->parentcategory)
        ->where('deleted_status',0)
        ->first();
       



      //echo "<pre>";print_r($product);exit;
        return view('productlist',compact('idd','banner','offers','product','product1','category','subcat','id'));
       // return view('productlist',compact('subcat','banner'));
    }
    public function shoplist($id){
		$banner=DB::table('banners')
        ->where('category',$id)
        ->get();
        $offers=DB::table('category_offers')
        ->where('category',$id)
        ->get();
        $product=DB::table('products')
        ->where('subsub_cat_id',$id)
        ->get();
        $product1=DB::table('products')
        ->where('subsub_cat_id',$id)
        ->get();
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           
        }else{
            $id=0;
        } 
      
        return view('shoplist',compact('banner','offers','product','product1','id'));
    }
    public function shoplisting($idd,$catid){
        
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           
        }else{
            $id=0;
        } 
        
        $banner=DB::table('shop_list_banners')
       ->get();
       $offers=DB::table('category_offers')
       ->where('category',$catid)
       ->where('deleted_status',0)
       ->orderBy('id', 'DESC')
       ->take(2)
       ->get();
       $subsubcategory=DB::table('categorys')
       ->where('id',$catid)
       ->where('deleted_status',0)
       ->first();
       $subcategory=DB::table('categorys')
       ->where('id',$subsubcategory->parentcategory)
       ->where('deleted_status',0)
       ->first();
    //    $products=DB::table('shop_products')
    //         ->leftJoin('shops', 'shop_products.shop_id', '=', 'shops.id')
    //         ->leftJoin('products', 'shop_products.product_id', '=', 'products.id')
    //         ->where('shop_products.product_id',$proid)
    //         ->where('shop_products.shop_id',$idd)
    //         ->select('products.*','shop_products.product_id as product_id','shop_products.shop_id','shop_products.moq as moq','shop_products.id as shoproid','shop_products.price as shprice','shop_products.offer_price as shoffprice','shop_products.discount as shdiscount','shop_products.stock as stock','shop_products.size','shop_products.color',
    //         'shop_products.storage','shop_products.RAM','shop_products.inch','shop_products.weight','shop_products.display','shop_products.lens','shop_products.type','shop_products.material','shop_products.speed','shop_products.beamwidth',
    //         'shop_products.Headshape','shop_products.Cover','shop_products.Madeof','shop_products.Inclusions','shop_products.capacity','shop_products.Language'
    //         ,'shop_products.Binding','shop_products.Publisher','shop_products.Genre','shop_products.ISBN','shop_products.Pages','shop_products.quantity','shop_products.shade')
    //         ->first();
       $product=DB::table('products')
       ->where('id',$idd)
       ->where('deleted_status',0)
       ->first();
            $shoplist=DB::table('shop_products')
            ->leftJoin('shops', 'shop_products.shop_id', '=', 'shops.id')
             ->where('product_id',$idd)
            ->where('shop_products.deleted_status',0)
            ->groupBy('shop_products.shop_id')
            ->select('shop_products.id','shop_products.price','shops.shop_image','shops.shop_name','shop_products.product_id','shop_products.shop_id')
            ->paginate(10);
           
            $shoplist1=DB::table('shop_products')
            ->leftJoin('shops', 'shop_products.shop_id', '=', 'shops.id')
            // ->leftJoin('reviews', 'shop_products.id', '=', 'reviews.shop_product_id')
            ->where('shop_products.deleted_status',0)
            ->where('product_id',$idd)
            ->groupBy('shop_products.shop_id')
            ->select(DB::raw('(SELECT AVG(rating) FROM reviews WHERE reviews.shop_product_id = shop_products.id) as rating,(SELECT COUNT(id) FROM reviews WHERE reviews.shop_product_id = shop_products.id) as count,shop_products.id,shop_products.stock,shop_products.price,shop_products.offer_price,shops.shop_image,shops.shop_name,shops.shop_place,shop_products.product_id,shop_products.shop_id'),'shop_products.color')
            // ->select('shop_products.id','shop_products.stock','shop_products.price','shop_products.offer_price','shops.shop_image','shops.shop_name','shops.shop_place','shop_products.product_id','shop_products.shop_id')
            //->orderBy('id','desc')
            ->paginate(10);
            
            
           
            return view('shoplisting',compact('catid','idd','subcategory','subsubcategory','shoplist','banner','offers','shoplist1','product','id'));
    }
    public function userlogin(){
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           
        }else{
            $id=0;
        } 
        return view('auth/login',compact('id'));
    }
    public function productdetailfetching(Request $request){
        $shop=$request->shop;
        $product=$request->product;
        $productdel=DB::table('shop_products')
        ->leftJoin('products', 'shop_products.product_id', '=', 'products.id')
        ->where('product_id',$product)
        ->where('shop_id',$shop)
        ->select('shop_products.*','products.product_name','products.description','products.image','products.discount')
        ->first();

        $returnHTML = view('product_varient')->with('product_id', $product)->with('idd', $shop)->with('products', $productdel)->render();
        $result['details'] = $productdel;
        $result['varient'] = $returnHTML;
        print_r(json_encode($result));
    }
    public function cusregister(Request $request){
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           
        }else{
            $id=0;
        }
        $email=$request->user_email;
        $emailcheck=DB::table('users')->where('email',$email)->first();
        if(empty($emailcheck)){
            $customer = new User;
            $customer->name=$request->user_name;
            $customer->email=$request->user_email;
            $customer->password=Hash::make($request->user_password);
            $customer->role=$request->role;
            if($customer->save()){
                $cus = new Customers;
                $cus->first_name=$request->user_name;
                $cus->last_name=$request->lastname;
                $cus->address=$request->address;
                $cus->dob=$request->dob;
                $cus->phonenumber=$request->phnumber;
                $cus->cus_loginid=$customer->id;
                $cus->save();
               
               
                $subject = 'EASY SHOP verification link';
                $message = 'Dear Customer, Congratulations 
                            You have successfully Registered Easy Shop
                            Click below click to activate your account for wonderfull shopping
                            Login Url : http://easyshop.espylabs.com/public/email_verification/'.encrypt($email).'';
                $headers = 'From: yourmail@domain.com' . "\r\n" .
                    'Reply-To: yourmail@domain.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                
               
                mail($email, $subject, $message, $headers);
               
              
            }
            $message="Verificaion link send to your registered mail id";
           return redirect('alert_page');
        }else{
            return redirect()->back()->with('message', 'Email id already existed');
        }
     
    }
   
    public function email_verification($id){
        $email=decrypt($id);
        $customer=User::where('email',$email)->first();
        $user=Customers::where('cus_loginid',$customer->id)->first();
        $user->status=1;
        $user->save();
        return redirect('userlogin');
    }
    public function shop_email_verification($id){
        $email=decrypt($id);
        $shop=User::where('email',$email)->first();
        $user=Shop::where('shop_login_id',$shop->id)->first();
        $user->status=1;
        $user->save();
        return redirect('userlogin');
    }
    public function alert_page(){
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           
        }else{
            $id=0;
        } 
        $message="Verificaion link send to your registered mail id";
        return view('alert_page',compact('id','message'));
    }
    public function getproductimages(Request $request){
        $shopproduct=$request->shoproductid;
        $productimages=DB::table('product_images')->where('shop_product_id',$shopproduct)->get();
        print_r(json_encode($productimages));
    }
    public function product_details($idd,$proid,$catid,$colorid){
        
        // echo "hi gopika";exit;
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           
        }else{
            $id=0;
        } 
        
            $products=DB::table('shop_products')
            ->leftJoin('shops', 'shop_products.shop_id', '=', 'shops.id')
            ->leftJoin('products', 'shop_products.product_id', '=', 'products.id')
            ->where('shop_products.product_id',$proid)
            ->where('shop_products.shop_id',$idd)
            ->select('products.*','shop_products.product_id as product_id','shop_products.shop_id','shop_products.moq as moq','shop_products.id as shoproid','shop_products.price as shprice','shop_products.offer_price as shoffprice','shop_products.discount as shdiscount','shop_products.stock as stock','shop_products.size','shop_products.color',
            'shop_products.storage','shop_products.RAM','shop_products.inch','shop_products.weight','shop_products.display','shop_products.lens','shop_products.type','shop_products.material','shop_products.speed','shop_products.beamwidth',
            'shop_products.Headshape','shop_products.Cover','shop_products.Madeof','shop_products.Inclusions','shop_products.capacity','shop_products.Language'
            ,'shop_products.Binding','shop_products.Publisher','shop_products.Genre','shop_products.ISBN','shop_products.Pages','shop_products.quantity','shop_products.shade')
            ->first();
            $shopfeature=DB::table('shop_product_features')
            ->where('product_id',$proid)
            ->where('shop_id',$idd)
            ->where('deleted_status',0)
            ->get();
            //echo "<pre>";print_r($products);exit;
            $banner=DB::table('shop_banners')
            ->where('shop_id',$idd)
            ->where('deleted_status',0)
            ->get();

            

            $productimages=DB::table('product_images')
            ->leftJoin('shop_products', 'product_images.shop_product_id', '=', 'shop_products.id')
            ->where('product_id',$proid)
            ->where('shop_id',$idd)
            ->where('shop_products.color',$colorid)
            ->get();
            $productimages1=DB::table('product_images')
            ->leftJoin('shop_products', 'product_images.shop_product_id', '=', 'shop_products.id')
            ->where('product_id',$proid)
            ->where('shop_products.color',$colorid)
            ->where('shop_id',$idd)
            ->get();
            $productfeatures=DB::table('product_features')
            ->where('product_id',$proid)
            ->get();
         //  echo "<pre>";print_r($proid);exit;
          
            $other_products=DB::table('shop_products')
            ->leftJoin('shops', 'shop_products.shop_id', '=', 'shops.id')
            ->leftJoin('products', 'shop_products.product_id', '=', 'products.id')
            ->leftJoin('product_images', 'shop_products.product_id', '=', 'product_images.shop_product_id')
             ->where('shop_id',$idd)
             ->groupBy('shop_products.id')
            ->select('products.*','shop_products.id as shoppro_id','shop_products.price as shprice','shop_products.id as shpid','shop_products.offer_price as shoffprice','shop_products.discount as shdiscount','shop_products.moq')
             ->get();
             $reviews=DB::table('reviews')
             ->leftJoin('shop_products', 'reviews.shop_product_id', '=', 'shop_products.id')
             ->where('product_id',$proid)
             ->where('shop_id',$idd)
             ->orderBy('reviews.id', 'DESC')
             ->limit(3)->get();
            // $catid=80;
             $subsubcategory=DB::table('categorys')
             ->where('id',$catid)
             ->where('deleted_status',0)
             ->first();
             $subcategory=DB::table('categorys')
             ->where('id',$subsubcategory->parentcategory)
             ->where('deleted_status',0)
             ->first();
             $product=DB::table('products')
             ->where('id',$proid)
             ->where('deleted_status',0)
             ->first();

             $shop=DB::table('shops')
             ->where('id',$idd)
             ->where('deleted_status',0)
             ->first();

    
            
           // echo "<pre>";print_r($products);exit;
            return view('product_details',compact('idd','proid','catid','colorid','shopfeature','shop','product','subsubcategory','subcategory','reviews','products','banner','productimages','productimages1','productfeatures','other_products','id'));
    }
    public function shopproductdetailsfetch(Request $request){
                $id=$request->id;
                $product=DB::table('shop_products')
                ->leftJoin('products', 'shop_products.product_id', '=', 'products.id')
                ->where('shop_products.id',$id)
                ->select('shop_products.*','products.product_name','products.description')
                ->first();
                print_r(json_encode($product));
    }
    public function productvarientfetching(Request $request){
        $size=$request->size;
        $color=$request->color;
        $storage=$request->storage;
        $ram=$request->ram;
        $inch=$request->inch;
        $weight=$request->weight;
        $display=$request->display;
        $lens=$request->lens;
        $type=$request->type;
        $material=$request->material;
        $speed=$request->speed;
        $beamwidth=$request->beamwidth;
        $Headshape=$request->Headshape;
        $Cover=$request->Cover;
        $Madeof=$request->Madeof;
        $Inclusions=$request->Inclusions;
        $capacity=$request->capacity;
        $Language=$request->Language;
        $Binding=$request->Binding;
        $Publisher=$request->Publisher;
        $Genre=$request->Genre;
        $ISBN=$request->ISBN;
        $Pages=$request->Pages;
        $quantity=$request->quantity;
        $shade=$request->shade;


        $proid=$request->productid;
        $shopid=$request->shop_id;
        
        if($size==NULL)
        {
            $size=0;
        }
        if($color==NULL)
        {
            $color=0;
        }
        if($storage==NULL)
        {
            $storage=0;
        }
        if($ram==NULL)
        {
            $ram=0;
        }
        if($inch==NULL)
        {
            $inch=0;
        }
        if($weight==NULL)
        {
            $weight=0;
        }
        if($display==NULL)
        {
            $display=0;
        }
        if($lens==NULL)
        {
            $lens=0;
        }
        if($type==NULL)
        {
            $type=0;
        }
        if($material==NULL)
        {
            $material=0;
        }
        if($speed==NULL)
        {
            $speed=0;
        }
        if($beamwidth==NULL)
        {
            $beamwidth=0;
        }
        if($Headshape==NULL)
        {
            $Headshape=0;
        }
        if($Cover==NULL)
        {
            $Cover=0;
        }
        if($Madeof==NULL)
        {
            $Madeof=0;
        }
        if($Inclusions==NULL)
        {
            $Inclusions=0;
        }
        if($capacity==NULL)
        {
            $capacity=0;
        }
        if($Language==NULL)
        {
            $Language=0;
        }
        if($Binding==NULL)
        {
            $Binding=0;
        }
        if($Publisher==NULL)
        {
            $Publisher=0;
        }
        if($Genre==NULL)
        {
            $Genre=0;
        }
        if($ISBN==NULL)
        {
            $ISBN=0;
        }
        if($Pages==NULL)
        {
            $Pages=0;
        }
        if($quantity==NULL)
        {
            $quantity=0;
        }
        if($shade==NULL)
        {
            $shade=0;
        }
        
        
     
        
        
    
            $product=DB::table('shop_products')
           // ->leftJoin('product_images', 'shop_products.id', '=', 'product_images.shop_product_id')
            ->where('color',$color)
            ->where('size',$size)
            ->where('storage',$storage)
            ->where('RAM',$ram)
            ->where('inch',$inch)
            ->where('weight',$weight)
            ->where('display',$display)
            ->where('lens',$lens)
            ->where('type',$type)
            ->where('material',$material)
            ->where('speed',$speed)
            ->where('beamwidth',$beamwidth)
            ->where('Headshape',$Headshape)
            ->where('Cover',$Cover)
            ->where('Madeof',$Madeof)
            ->where('Inclusions',$Inclusions)
            ->where('capacity',$capacity)
            ->where('Language',$Language)
            ->where('Binding',$Binding)
            ->where('Publisher',$Publisher)
            ->where('Genre',$Genre)
            ->where('ISBN',$ISBN)
            ->where('Pages',$Pages)
            ->where('quantity',$quantity)
            ->where('shade',$shade)
            
            ->where('product_id',$proid)
            ->where('shop_id',$shopid)
            ->first();
           
    
           
       
        print_r(json_encode($product));
    }
    public function shop_productimagesfetch(Request $request){
        $id=$request->id;
        $productimg=DB::table('product_images')
        ->where('shop_product_id',$id)
        ->get();
        print_r(json_encode($productimg));
    }
    public function checkauthentication(Request $request){
        if(Auth::check()) 
        {
            $product=$request->prodiuct_name;
            $qty=$request->product_qty;
          
            $id=Auth::user()->id;
            $user=DB::table('customers')
            ->where('cus_loginid',$id)
            ->value('id');
            $shippingdel=DB::table('tbl_shipping_details')
            ->where('customer_id',$user)
            ->value('id');
            if($shippingdel==null){
               $sh=new Tbl_shipping_details;
               $sh->name=$request->name; 
               $sh->country=$request->country;
               $sh->street_address=$request->address;
               $sh->apartment=$request->apartment;
               $sh->city=$request->city;
               $sh->state=$request->state;
               $sh->pincode=$request->pincode;
               $sh->phone_number=$request->phone;
               $sh->customer_id=$user;
               $sh->save();
            }else{
                $sh=Tbl_shipping_details::where('customer_id',$user)->first();
                $sh->name=$request->name; 
                $sh->country=$request->country;
                $sh->street_address=$request->address;
                $sh->apartment=$request->apartment;
                $sh->city=$request->city;
                $sh->state=$request->state;
                $sh->pincode=$request->pincode;
                $sh->phone_number=$request->phone;
                $sh->customer_id=$user;
                $sh->save();
            }
            $lastRow=DB::table('tbl_order_masters')->orderBy('id', 'desc')->first();
            $order=new Tbl_order_masters;
            $order->customer_id = $user;
          //  print_r($lastRow);exit;
            if($lastRow==null){
                $order->order_id = 0 + 1;
            }else{
                $order->order_id = $lastRow->order_id + 1;
            }
            $order->shipping_charge=0;
            $order->paymethod=$request->pay;
            if($order->save()){
                for($i=0;$i<count($product);$i++){
                        $product_price[$i]=DB::table('shop_products')->where('id',$product[$i])->first();
                        $trans=new Tbl_order_trans;
                        $trans->product_id=$product[$i];
                        $trans->product_qty=$qty[$i];
                      
                        $trans->order_master=$order->id;
                        $trans->product_price=$product_price[$i]->offer_price;
                        $trans->save();
                        $currentstock[$i]=$product_price[$i]->stock-$qty[$i];
                        $productdel=Shop_products::find($product[$i]);
                        $productdel->stock=$currentstock[$i];
                        $productdel->save();

                }
                
                $idsuccess=1;
            }
           
           
        }else{
            $idsuccess=0;
        } 
        print_r(json_encode($idsuccess));
    }
    public function insertreview(Request $request){
            $review=new Reviews;
            $review->name=$request->name;
            $review->rating=$request->yourrate;
            $review->description=$request->description;
            $review->shop_product_id=$request->shop_id;
            $review->save();
            return Redirect::back();
    }
    public function addtocart(Request $request){
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
            $product=$request->pid;
            $qty=$request->qty;
            $user=DB::table('customers')
            ->where('cus_loginid',$id)
            ->value('id');
            $lastRow=DB::table('tbl_order_masters')->orderBy('id', 'desc')->first();
            $order=new Tbl_order_masters;
            $order->customer_id = $user;
          //  print_r($lastRow);exit;
            if($lastRow==null){
                $order->order_id = 0 + 1;
            }else{
                $order->order_id = $lastRow->order_id + 1;
            }
            $order->shipping_charge=0;
            if($order->save()){
                for($i=0;$i<count($product);$i++){
                        $trans=new Tbl_order_trans;
                        $trans->product_id=$product[$i];
                        $trans->product_qty=$qty[$i];
                        $trans->order_master=$order->id;
                        $trans->save();
                }
                return redirect('addtocartlist');
            }
           
        }else{
            $id=0;
            return redirect('userlogin');
        } 
       
       
    }
    public function addtocartnext(Request $request){
        if(Auth::check())
        {
            $id=Auth::user()->id;
            $product=$request->pid;
            $qty=$request->qty;
            
            $producttrans = array();
            $total=$request->gtotal;
            $moq=$request->moq;
            $shop=$request->shop;
            $proid=$request->proid;
            $catid=$request->catid;
            $colorid=$request->colorid;
            if($product==null){
               return view('addtocartnull',compact('id'));
            }else{
                for($i=0;$i<count($product);$i++){
                    $producttrans[]=array('productid'=>$product[$i],
                    'pqty'=> $qty[$i],
                    'moq'=>$moq[$i],
                    'shop'=>$shop[$i],
                    'proid'=>$proid[$i],
                    'catid'=>$catid[$i],
                    'colorid'=>$colorid[$i]
                );
                  
                }
                $tqty=count($product) * count($qty);
                return view('addtocart',compact('id','producttrans','tqty','total'));
            }
          
          
           //echo "<pre>";print_r($tqty);exit;
        }else{
            return redirect('userlogin');
        }
           
        
    }
    public function addtocartpay(Request $request){
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           
        }else{
            $id=0;
        }
            $product=$request->productID;
            $qty=$request->productQTY;
            $producttrans = array();
            $total=$request->subtotal;
            for($i=0;$i<count($product);$i++){
                $producttrans[]=array('productid'=>$product[$i],
                'pqty'=> $qty[$i]);
              
            }
            $user=DB::table('customers')
            ->where('cus_loginid',$id)
            ->value('id');
            $deladd=DB::table('tbl_deladds')
            ->where('customer_id',$user)
            ->get();
            $deladdcheck=DB::table('tbl_deladds')
            ->where('customer_id',$user)
            ->value('id');
           // $tqty=count($product) * count($qty);
       // echo "<pre>";print_r($producttrans);
        return view('addtocartpayment',compact('deladdcheck','deladd','user','id','producttrans','total'));
    }

    public function insertdeladd(Request $request){
        $id=Auth::user()->id;
        $user=DB::table('customers')
        ->where('cus_loginid',$id)
        ->value('id');
       
        $address=new Tbl_deladds;
        $address->customer_id=$user;
        $address->deliveryaddrress=$request->add;
        if($address->save()){
            $result=0;
        }
        print_r(json_encode($result));
    }

    
    public function addtocartlist(){
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
            $user=DB::table('customers')
            ->where('cus_loginid',$id)
            ->value('id');
        }else{
            $id=0;
        }
        $producttrans=DB::table('tbl_order_trans')
        ->leftJoin('tbl_order_masters', 'tbl_order_trans.order_master', '=', 'tbl_order_masters.id')
        ->leftJoin('shop_products', 'tbl_order_trans.product_id', '=', 'shop_products.id')
        ->leftJoin('products', 'shop_products.product_id', '=', 'products.id')
        ->where('tbl_order_masters.customer_id',$user)
        ->where('tbl_order_masters.payment_status',0)
        ->select('tbl_order_trans.*','products.product_name','products.offer_price','products.image')
        ->get();
        //echo "<pre>";print_r($producttrans);exit;
        return view('addtocart',compact('id','producttrans'));
    }
    public function checkout(Request $request){
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
        }else{
            $id=0;
        }
        $countries=Tbl_countrys::all();
        $user=DB::table('customers')
        ->where('cus_loginid',$id)
        ->value('id');
        $product=$request->product;
        //print_r($product);exit;
        $qty=$request->qty;
     
        //echo "<pre>";print_r($varients);exit;
        $producttrans = array();
        $total=$request->grandtotal;
        for($i=0;$i<count($product);$i++){
            $producttrans[]=array('productid'=>$product[$i],
            'pqty'=> $qty[$i]
       );
          
        }
       // $tqty=count($product) * count($qty);
        return view('checkout',compact('id','producttrans','total','user','countries'));
    }
    public function myaccount(){
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           

           
        }else{
            $id=0;
        }
        $customer=DB::table('customers')->where('cus_loginid',$id)->first();
        $orderslist=DB::table('tbl_order_masters')
        ->where('customer_id',$customer->id)
        ->orderBy('id', 'DESC')
        ->get();
    
        return view('myaccount',compact('id','orderslist'));
    }
    public function shopregitser()
    {
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
           
        }else{
            $id=0;
        } 
        $message='';
        return view('shopregitser',compact('id','message'));
    }
    public function shopadd(Request $request)
    {
        if(Auth::check()) 
        {
            $id=Auth::user()->id;
        }else{
            $id=0;
        }
        $shop = new User;
        $email=$request->shop_email;
        $shop->name	=$request->shop_name;
        $shop->email=$request->shop_email;
        $shop->role=5;
        $emailvalidation = User::where('email',$email)->first();
        
        if($emailvalidation)
        {
            $message="Email already exist";
            return view('shopregitser',compact('id','message'));
        }
        $shop->password	=Hash::make($request->shop_password);
        if($shop->save()){
			$shopdetails = new Shop;
			$shopdetails->shop_name	=$request->shop_name;
			$shopdetails->shop_phonenum	=$request->shop_phonenum;
			$shopdetails->shop_email=$request->shop_email;
			$shopdetails->shop_place=$request->shop_place;
            $shopdetails->shop_lattitude="";
            $shopdetails->shop_longitude="";
            $shopdetails->shop_address=$request->shop_address;
            $shopdetails->shop_image="";
            $shopdetails->status=0;
			$shopdetails->shop_login_id	=$shop->id;
            $shopdetails->save();

            $subject = 'EASY SHOP verification link';
            $message = 'Dear Customer, Congratulations 
                        You have successfully Registered Easy Shop
                        Click below click to activate your account for wonderfull shopping
                        Login Url : http://easyshop.espylabs.com/public/shop_email_verification/'.encrypt($email).'';
            $headers = 'From: yourmail@domain.com' . "\r\n" .
                'Reply-To: yourmail@domain.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            
           
            mail($email, $subject, $message, $headers);
        }
       
        $message="Verificaion link send to your registered mail id";
        $message.="Regitser Success";
        return view('alert_shoppage',compact('id','message'));

    }
}