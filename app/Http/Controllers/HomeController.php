<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categorys;
use App\Category_variants;

use App\User;
use Redirect;
use DB;

use Auth;
use Hash;
use App\Banners;

use App\Category_offers;

use App\Products;

use App\Shop;
use App\Shop_products;
use App\Product_images;

use App\Product_features;

use App\Shop_list_banners;

use App\Shop_banners;
use App\FilterModel;

use App\Tbl_order_masters;
use App\Tbl_order_trans;
use App\Shop_product_features;

use App\Variant_type;

use App\Product_variant;

use App\Product_variants;


use App\Shop_varient_types;

use App\Shop_varients;

class HomeController extends Controller
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
      // $user=\Auth::user();
      //   //dd($user);
      //   $loginid=$user->id;
      //   dd($loginid);
        return view('dashboard');
    }
    public function category(){
        $category=Categorys::all();
        $cat=DB::table('categorys')
        ->where('deleted_status','=',0)
        ->where(function($query){
            $query->where('parentcategory','=',1)
            ->orwhere('parentcategory','=',2);
        })
        ->get();
        $catg=DB::table('categorys')
        ->where('parentcategory',0)
        ->get();
        return view('admin/category',compact('category','cat','catg'));
    }
    public function categoryinsert(Request $request){
        $category=new Categorys;

		if($files=$request->file('image')){  
			$name=$files->getClientOriginalName();  
            $files->move('admin/images/',$name);  
        }
			
			$category->image=$name; 
			$category->categoryname=$request->catname;
			$category->parentcategory=$request->parent;
			$category->save();
			return redirect('category')->with('message', 'Added Successfully');
		
		
    }


    public function edit_category(Request $request){
        $id=$request->cate;
       // echo $id;exit;
        $cat_fet=Categorys::find($id);
        //dd($id);
        if($files=$request->file('image')){  
			$name=$files->getClientOriginalName();  
            $files->move('admin/images/',$name);  
            $cat_fet->image=$name;
        }
       
        
        $cat_fet->categoryname=$request->catname;
        $cat_fet->parentcategory=$request->parent;
        $cat_fet->save();
		return redirect('category')->with('message', 'Updated Successfully');
}

public function categoryfetch(Request $request){
	$id=$request->id;
	$cat_fet=Categorys::find($id);
	print_r(json_encode($cat_fet));
	
}

        //_______anu_____28-5-2021___________
        public function assignvariants(){
          $category=DB::table('category_variants')
          ->leftJoin('categorys', 'category_variants.cat_id', '=', 'categorys.id')
         // ->leftjoin('Shop_varient_types','category_variants.varient_type','=','Shop_varient_types.id')
          ->select('category_variants.*','categorys.categoryname')
          ->groupBy('category_variants.cat_id')->get();
       //   echo "<pre>";print_r($category);exit;
          $cat=DB::table('categorys')
          ->where('parentcategory',0)
          ->get();

          $vari_type=Shop_varient_types::where('deleted_status',0)->get();

          
          return view('admin/assignvariants',compact('category','cat','vari_type'));
      }

      public function assignvariinsert(Request $request){
        $length=count($request->veriantype);
        $type=$request->veriantype;
        for($i=0;$i<$length;$i++){
          $assignveri=new Category_variants;
      
          $assignveri->cat_id=$request->catname;
          $assignveri->variant_type_id=$type[$i];
          $assignveri->save();
        }
     
			return redirect('assignvariants')->with('message', 'Added Successfully');
		
		
    }
    public function assignvarifetch(Request $request){
      $id=$request->id;
      $assignveri=DB::table('category_variants')
      ->leftJoin('shop_varient_types', 'category_variants.variant_type_id', '=', 'shop_varient_types.id')
      ->where('category_variants.deleted_status',0)
      ->where('category_variants.cat_id',$id)
      ->select('category_variants.*','shop_varient_types.varient_type')
      ->get();
      print_r(json_encode($assignveri));
      
    }
  
   
        //_____________end_anu_______________


    public function banners(){
        $category=DB::table('categorys')
        ->where('parentcategory',0)
        ->get();
        $banner=DB::table('banners')
        ->leftJoin('categorys', 'banners.category', '=', 'categorys.id')
        ->select('banners.*','categorys.categoryname')
        ->where('banners.deleted_status','=','0')
        ->get();

        return view('admin/banners',compact('category','banner'));
    }
    public function subcatfetch(Request $request){
            $id=$request->id;
           
            $subcat=DB::table('categorys')
            ->where('parentcategory',$id)
            ->where('deleted_status',0)
            ->get();
            // $subcat = array();	
            // $i=0;
            // foreach($subcat1 as $subcat1){
            //   $subcat[$i]=DB::table('categorys')
            //   ->where('parentcategory',$subcat1->id)
            //   ->where('deleted_status',0)
            //   ->get();
            //  $i++;
            // }

            print_r(json_encode($subcat));
            
    }

    // public function maincategoryfetch(Request $request){
	// 	$id=$request->id;
	// 	$sub_cat=DB::table('Categorys')
	// 	->where('parent_category',$id)
	// 	->get();
		
	// 	print_r(json_encode($sub_cat));
	// }



    public function bannerinsert(Request $request){
        $banner=new Banners;

		if($files=$request->file('image')){  
			$name=$files->getClientOriginalName();  
            $files->move('admin/images/',$name);  
        }
        if($request->subsubcatname==0){
            $banner->banner_image=$name; 
			$banner->category=$request->catname;

        }else{
            $banner->banner_image=$name; 
			$banner->category=$request->subsubcatname;
        }
			
		 $banner->save();
		 return redirect('banners');
    }

    public function banneredit(Request $request){
		$id=$request->id;
        $ban=Banners::find($id);
        if($files=$request->file('bannerimage')){  
			      $name=$files->getClientOriginalName();  
            $files->move('admin/images/',$name);  
            $ban->banner_image=$name;
        }
	
		$ban->save();
		return redirect('banners')->with('message', 'Updated Successfully');
}

public function bannerfetch(Request $request){
	$id=$request->id;
	$ban=Banners::find($id);
	print_r(json_encode($ban));
}



    public function catoffers(){
        $cat=DB::table('categorys')
        ->where('parentcategory',0)
        ->get();
         $offers=DB::table('category_offers')
         ->leftJoin('categorys', 'category_offers.category', '=', 'categorys.id')
         ->select('category_offers.*','categorys.categoryname')
         ->where('category_offers.deleted_status','=','0')
         ->get();
        return view('admin/catoffers',compact('cat','offers'));
    }
    public function catofferinsert(Request $request){
        $offers=new Category_offers;

		if($files=$request->file('image')){  
			$name=$files->getClientOriginalName();  
            $files->move('admin/images/',$name);  
        }
			
			$offers->image=$name; 
            $offers->category=$request->subcat;
            $offers->catname=$request->catname;
		    $offers->save();
			return redirect('catoffers');
    }
    public function catproducts(){
      $user=\Auth::user();
        //dd($user);
        $loginid=$user->id;
         //dd($loginid);
        $cat=DB::table('categorys')
        ->where('parentcategory',0)
        ->get();
        $products=DB::table('products')
        ->leftJoin('categorys', 'products.category_id', '=', 'categorys.id')
        ->select('products.*','categorys.categoryname')
        ->where('products.deleted_status','=','0')

        ->get();
        return view('admin/catproducts',compact('cat','products'));
    }

    public function catproductinsert(Request $request){
        $product=new Products;

		if($files=$request->file('image')){  
			$name=$files->getClientOriginalName(); 
            $files->move('admin/images/',$name);  
        }
			
            $product->image=$name; 
            $product->main_category_id=$request->parent;
            $product->category_id=$request->subcat;
            $product->subsub_cat_id=$request->subsubcat;
            $product->product_name=$request->productname;
            $product->number_of_pieces=$request->noquantity;
            $product->price=$request->price;
            if(empty($request->offprice)){
              $product->offer_price=$request->price;
              
            }else{
              $product->offer_price=$request->offprice;
            }
            $product->description=$request->desc;
            $product->discount=$request->discount;
            $product->new_status=$request->newstatus;
            $product->save();
            
			return redirect('catproducts')->with('message', 'Added Successfully');
    }

    public function catproductinsert1(Request $request){
        $product=new Products;
        

          if($files=$request->file('image')){  
            $name=$files->getClientOriginalName(); 
                  $files->move('admin/images/',$name);  
              }
			
            $product->image=$name; 
            $product->main_category_id=$request->parent;
            $product->category_id=$request->subcat;
            $product->subsub_cat_id=$request->subsubcat;
            $product->product_name=$request->productname;
            $product->number_of_pieces=$request->noquantity;
            $product->price=$request->price;
            if(empty($request->offerprice)){
              $product->offer_price=$request->price;
            }else{
              $product->offer_price=$request->offerprice;
            }
          
            $product->description=$request->desc;
            $product->discount=$request->discount;
            $product->new_status=$request->newstatus;

          
            
            // $product->save();
              if($product->save()){
              $us=Auth::user();
              $s_id=$us->id;
              $sho_p=DB::table('shops')
 
              ->where('shops.shop_login_id',$s_id)
              ->first();
              $shpp=new Shop_products;
              $shpp->product_id=$product->id;
              $shpp->shop_id=$sho_p->id;
              $shpp->price=$request->price;
             // $shpp->offer_price=$request->offerprice;
              if(empty($request->offprice)){
                $shpp->offer_price=$request->price;
                
              }else{
                $shpp->offer_price=$request->offerprice;
              }
              $shpp->stock=$request->curstock;
              $shpp->moq=$request->moq;
              $shpp->discount=$request->discount;
              $shpp->price=$request->price;
              $shpp->color=$request->color;
              $shpp->size=$request->size;
              $shpp->storage=$request->storage;
              $shpp->RAM=$request->ram;
              $shpp->inch	=$request->inch;
              $shpp->weight=$request->weight;
              $shpp->display=$request->display;
              $shpp->lens	=$request->lens;
              $shpp->type	=$request->type;
              $shpp->material	=$request->material;
              $shpp->speed	=$request->speed;
              $shpp->beamwidth	=$request->beamwidth;
              $shpp->Headshape	=$request->headshape;
              $shpp->Cover=$request->Cover;
              $shpp->Madeof	=$request->Madeof;
              $shpp->Inclusions	=$request->Inclusions;
              $shpp->capacity	=$request->capacity;
              $shpp->Language	=$request->Language;
              $shpp->Binding=$request->Binding;
              $shpp->Publisher=$request->Publisher;
              $shpp->Genre=$request->Genre;
              $shpp->ISBN=$request->ISBN;
              $shpp->Pages=$request->Pages;
              $shpp->quantity=$request->quantity;
              $shpp->shade=$request->shade;
              $shpp->single_image=$name;
              $shpp->save();
            }
			return redirect('shopproducts1')->with('message', 'Added Successfully');
    } 
	// public function sub_categoriesinsert(Request $request){
	// 	$sub_cat=new Categorys;
		
	// 	if($files=$request->file('image')){  
	// 		$name=$files->getClientOriginalName();  
	// 		$files->move('img/',$name);  
			
	// 		$sub_cat->image=$name; 
	// 		$sub_cat->categoryname=$request->sub_catg;
	// 	    $sub_cat->parentcategory=$request->cate;
		  
		    
	// 	    $sub_cat->save();
    //         return view('admin/category');
    //     }
		 
	// }


    public function shopreg(){
        $shops=DB::table('shops')->where('deleted_status',0)->orderBy('id', 'DESC')->get();
       // dd($shops);
        return view('admin/shop',compact('shops'));
    }
    public function shopinsert(Request $request){
$emailcheck=DB::table('users')->where('email',$request->shopemail)->first();
if(empty($emailcheck)){
  $user=new User;
  $user->name=$request->shopname;
  $user->email=$request->shopemail;
  $user->password=Hash::make($request->shop_password);
  $user->role=5;
  if($user->save()){
      $shops=new Shop;
    


  if($files=$request->file('image')){  
    $name=$files->getClientOriginalName();  
          $files->move('admin/images/',$name);  
      }
      // $user=\Auth::user();
      // dd($user);
      // $loginid=$user->id;
       //dd($loginid);
    $shops->shop_login_id=$user->id;
    $shops->shop_image=$name; 
    $shops->shop_name=$request->shopname;
          $shops->shop_phonenum=$request->shopphone;
          $shops->shop_email=$request->shopemail;
          $shops->shop_place=$request->shopplace;
          $shops->shop_lattitude=$request->shoplat;
          $shops->shop_longitude=$request->shoplong;
          $shops->shop_address=$request->shopaddress;
          $shops->shop_open_time=$request->shoptime;
          $shops->shop_closing_time=$request->closingtime;
    $shops->save();
    return redirect('shopreg')->with('message', 'Added Successfully');
}
    
		
		
    }
    else{
      return redirect('shopreg')->with('message', 'Email address already existed.');
    }
  }
    public function updatestatus($id){
      $crc = Shop::find($id);
      if($crc->status=="0")
      {
       $status="1";
       Shop::where('id',$crc->id)
       ->update([
         'status' =>$status, 
         
       ]);

       return redirect('shopreg')->with('message', 'DisApproved Successfully');
     }
     else
     {
       $status="0";

       Shop::where('id',$crc->id)
       ->update([
         'status' =>$status, 
         
       ]);

       return redirect('shopreg')->with('message', 'Approved Successfully');
     }
    
     
     
    }

         public function edit_shop(Request $request)
         {
        $id=$request->id;
        //dd($id);
        $shop=Shop::find($id);
        if($files=$request->file('image')){  
            $name=$files->getClientOriginalName();  
            $files->move('admin/images/',$name); 
            $shop->shop_image=$name; 
        }
        $shop->shop_name=$request->shopname;
        $shop->shop_phonenum=$request->shopphone;
        $shop->shop_email=$request->shopemail;
        $shop->shop_place=$request->shopplace;
        $shop->shop_lattitude=$request->shoplat;
        $shop->shop_longitude=$request->shoplong;
        $shop->shop_address=$request->shopaddress;
        $shop->shop_open_time=$request->shoptime;
        $shop->shop_closing_time=$request->closingtime;
        
        $shop->save();
        return redirect('shopreg')->with('message', 'Updated Successfully');
    }
    public function shoplistfetch(Request $request){
    $id=$request->id;
    $shop=Shop::find($id);
    print_r(json_encode($shop));
    
    }
    


    public function shopproducts(){
        $sh=Shop::where('deleted_status','=','0')->get();
        $prod=Products::where('deleted_status','=','0')->get();
        $prod_img=Product_images::get();  
        $vari=Variant_type::
        where('deleted_status',0)
        ->get();
        $products=DB::table('shop_products')

 ->leftJoin('shops', 'shop_products.shop_id', '=', 'shops.id')
 ->leftjoin ('products','shop_products.product_id','=', 'products.id')
 ->select('shop_products.*','shops.shop_name','products.product_name')
 
 ->where('shop_products.deleted_status','=','0')

  ->get();

        
       // dd($shops);
        return view('admin/shopproducts',compact('sh','products','prod','prod_img','vari'));
    }


    public function shopproducts1(){
      $login_id=Auth::user()->id;
      // dd($login_id);
      $cat=DB::table('categorys')
      ->where('parentcategory',0)
      ->get();
      $sh=Shop::where('deleted_status','=','0')
      ->where('shop_login_id',$login_id)
      ->get();
      $vari=Variant_type::
      where('deleted_status',0)
      ->get();
      $prod=Products::where('deleted_status','=','0')->get();
      $prod_img=Product_images::get();  
      $products=DB::table('shop_products')

      ->leftJoin('shops', 'shop_products.shop_id', '=', 'shops.id')
      ->leftjoin ('products','shop_products.product_id','=', 'products.id')
      ->select('shop_products.*','shops.shop_name','shops.id as shopid','products.product_name','shop_products.stock')

      // ->where('shop_products.deleted_status','=','0')

      // ->where('products.number_of_pieces','!=','0')
      ->where('shops.shop_login_id',$login_id)

      ->get();
      $colors=DB::table('shop_varients')->where('varient_type_id',"1")->get();
      $size=DB::table('shop_varients')->where('varient_type_id',"2")->get();
      $storage=DB::table('shop_varients')->where('varient_type_id',"3")->get();
      $ram=DB::table('shop_varients')->where('varient_type_id',"4")->get();
      $inch=DB::table('shop_varients')->where('varient_type_id',"5")->get();
      $weight=DB::table('shop_varients')->where('varient_type_id',"6")->get();
      $display =DB::table('shop_varients')->where('varient_type_id',"7")->get();
      $lens =DB::table('shop_varients')->where('varient_type_id',"8")->get();
      $type =DB::table('shop_varients')->where('varient_type_id',"9")->get();
      $material =DB::table('shop_varients')->where('varient_type_id',"10")->get();
      $speed =DB::table('shop_varients')->where('varient_type_id',"11")->get();
      $beamwidth=DB::table('shop_varients')->where('varient_type_id',"12")->get();
      $headshape=DB::table('shop_varients')->where('varient_type_id',"13")->get();
      $Cover=DB::table('shop_varients')->where('varient_type_id',"14")->get();
      $Madeof=DB::table('shop_varients')->where('varient_type_id',"15")->get();
      $Inclusions=DB::table('shop_varients')->where('varient_type_id',"16")->get();
      $capacity=DB::table('shop_varients')->where('varient_type_id',"17")->get();
      $Language=DB::table('shop_varients')->where('varient_type_id',"18")->get();
      $Binding=DB::table('shop_varients')->where('varient_type_id',"19")->get();
      $Publisher=DB::table('shop_varients')->where('varient_type_id',"20")->get();
      $Genre=DB::table('shop_varients')->where('varient_type_id',"21")->get();
      $ISBN=DB::table('shop_varients')->where('varient_type_id',"22")->get();
      $Pages=DB::table('shop_varients')->where('varient_type_id',"23")->get();
      $quantity=DB::table('shop_varients')->where('varient_type_id',"24")->get();
      $shade=DB::table('shop_varients')->where('varient_type_id',"25")->get();
      

      return view('admin/shopproducts1',compact('sh','products','prod','prod_img','cat','vari','colors','size','storage','ram','inch','weight','display','lens','type','material','speed','beamwidth',
      'headshape','Cover','Madeof','Inclusions','capacity','Language','Binding','Publisher','Genre','ISBN','Pages','quantity','shade'));
  }






    public function shopproductinsert(Request $request){
      $notification = array(
        'message' => 'Added successfully!',
        'alert-type' => 'success'
    );
    $shoprocheck=DB::table('shop_products')
    ->where('product_id',$request->productname)
    ->where('shop_id',$request->shopname)
    ->value('id');
    if($shoprocheck==null){
      $sh=new Shop_products;
        
      $sh->product_id=$request->productname;
      $sh->shop_id=$request->shopname;
      $sh->price=$request->price;
     // $sh->offer_price=$request->offprice;
      if(empty($request->offprice)){
        $sh->offer_price=$request->price;
        
      }else{
        $sh->offer_price=$request->offprice;
      }
      // $sh->stock=$request->curstock;
      // $sh->discount=$request->dscnt;
      

      
     
      $sh->save();
      return redirect('shopproducts')->with($notification);
    }else{
      echo "shop product already exist";exit;
    }
      
       
        
}
public function shopproductinsert1(Request $request){
  $notification = array(
    'message' => 'Added successfully!',
    'alert-type' => 'success'
);
$shoprocheck=DB::table('shop_products')
->where('product_id',$request->productname)
->where('shop_id',$request->shopname)
->value('id');
if($shoprocheck==null){
$us=Auth::user();
$s_id=$us->id;
  $shp=DB::table('shops')
 
  ->where('shops.shop_login_id',$s_id)
  ->first();
  // dd($shp);
  $sh=new Shop_products;
  
if($files=$request->file('image')){  
  $name=$files->getClientOriginalName(); 
        $files->move('admin/images/',$name);  
        $sh->single_image=$name;
    }
  $sh->shop_id=$shp->id;
  $sh->product_id=$request->productname;
  
  $sh->price=$request->price;
  $sh->color=$request->color;
  $sh->size=$request->size;
  $sh->storage=$request->storage;
  $sh->RAM=$request->ram;
  $sh->inch	=$request->inch;
  $sh->weight=$request->weight;
  $sh->display=$request->display;
  $sh->lens	=$request->lens;
  $sh->type	=$request->type;
  $sh->material	=$request->material;
  $sh->speed	=$request->speed;
  $sh->beamwidth	=$request->beamwidth;
  $sh->Headshape	=$request->headshape;
  $sh->Cover=$request->Cover;
  $sh->Madeof	=$request->Madeof;
  $sh->Inclusions	=$request->Inclusions;
  $sh->capacity	=$request->capacity;
  $sh->Language	=$request->Language;
  $sh->Binding=$request->Binding;
  $sh->Publisher=$request->Publisher;
  $sh->Genre=$request->Genre;
  $sh->ISBN=$request->ISBN;
  $sh->Pages=$request->Pages;
  $sh->quantity=$request->quantity;
  $sh->shade=$request->shade;

  if(empty($request->offprice)){
    $sh->offer_price=$request->price;
    
  }else{
    $sh->offer_price=$request->offprice;
  }
  
  $sh->stock=$request->curstock;
  $sh->moq=$request->moq;
  // $sh->discount=$request->dscnt;
  

  
 
  $sh->save();
  return redirect('shopproducts1')->with($notification);
}else{
  echo "shop product already exist";exit;
}
  


    
    
}
public function productimageinsert(Request $request){
    $prod_img=new Product_images;
    //$product = Shop_products::find($id);
   
    if($files=$request->file('image')){  
        $name=$files->getClientOriginalName();  
        $files->move('admin/images/',$name); 
        $prod_img->product_images=$name; 
    }
        
       
   $prod_img->shop_product_id=$request->productname;
    
         
    $prod_img->save();
    // session()->flash('success', 'Product Image Added Successfully!!');
    
 return Redirect::back()->with('message', 'Added Successfully');

    
}
public function productimagefetch(Request $request){
$id=$request->id;
$productimg=DB::table('product_images')
->where('shop_product_id',$id)
->where(function($query){
  $query->where('deleted_status','=',0);
  
})
->get();
print_r(json_encode($productimg));
}

public function editshopproducts(Request $request){
    $id=$request->id;
    $pr=Shop_products::find($id);
    //dd($id);
    $pr->shop_id=$request->shopname;
    $pr->product_id=$request->productname;
    $pr->price=$request->price;
    $pr->offer_price=$request->offerprice;
    $pr->discount=$request->discount;
    // $pr->stock=$request->curstock;
    $pr->save();
    return redirect('shopproducts')->with('message', 'Updated Successfully');
}

public function editshopproducts1(Request $request){
  $id=$request->id;
  $pr=Shop_products::find($id);
  //dd($id);
  
  $pr->product_id=$request->productname;
  $pr->price=$request->price;
  $pr->offer_price=$request->offerprice;
  $pr->stock=$request->curstock;
  $pr->moq=$request->moq;
  $pr->discount=$request->discount;


  $pr->color=$request->color;
  $pr->size=$request->size;
  $pr->storage=$request->storage;
  $pr->RAM=$request->ram;
  $pr->inch	=$request->inch;
  $pr->weight=$request->weight;
  $pr->display=$request->display;
  $pr->lens	=$request->lens;
  $pr->type	=$request->type;
  $pr->material	=$request->material;
  $pr->speed	=$request->speed;
  $pr->beamwidth	=$request->beamwidth;
  $pr->Headshape	=$request->headshape;
  $pr->Cover=$request->Cover;
  $pr->Madeof	=$request->Madeof;
  $pr->Inclusions	=$request->Inclusions;
  $pr->capacity	=$request->capacity;
  $pr->Language	=$request->Language;
  $pr->Binding=$request->Binding;
  $pr->Publisher=$request->Publisher;
  $pr->Genre=$request->Genre;
  $pr->ISBN=$request->ISBN;
  $pr->Pages=$request->Pages;
  $pr->quantity=$request->quantity;
  $pr->shade=$request->shade;

  $pr->save();
  return redirect('shopproducts1')->with('message', 'Updated Successfully');
}
public function shopproductfetch(Request $request){
$id=$request->id;
$pr=Shop_products::find($id);

print_r(json_encode($pr));

}




public function addproductfeatures(Request $request){
    $feat=new Product_features;
    //$product = Shop_products::find($id);
    $feat->product_id=$request->featname;
    $feat->features=$request->features;
     $feat->save();
    return Redirect::back()->with('message', 'Added Successfully');
}



public function addproductfeatures1(Request $request){
  $feat1=new Shop_product_features;
  //$product = Shop_products::find($id);
  $feat1->shop_id= $request->shopname;

  $feat1->product_id=$request->featname;
  $feat1->features=$request->features;
   $feat1->save();
  return Redirect::back()->with('message', 'Added Successfully');
}



public function productfeaturesfetch(Request $request){
$id=$request->id;
$feat=DB::table('product_features')
->where('product_id',$id)
->where(function($query){
    $query->where('deleted_status','=',0);
    
})
->get();
print_r(json_encode($feat));
}



public function productfeaturesfetch1(Request $request){
  $id=$request->id;
  $feat1=DB::table('shop_product_features')
  ->where('product_id',$id)
  ->where(function($query){
    $query->where('deleted_status','=',0);
    
})
  ->get();
  print_r(json_encode($feat1));
  }

public function productreviewfetch(Request $request){
  $id=$request->id;
  $rev=DB::table('reviews')
  ->where('shop_product_id',$id)
  // ->where(function($query){
  //     $query->where('deleted_status','=',0);
      
  // })
  ->get();
  print_r(json_encode($rev));
  }
  
public function shoplistbanner(){
      $ban=shop_list_banners::active()->get();
      return view('admin/shop_list_banner',compact('ban'));
  }
  public function bannerimageinsert(Request $request){
          $ban=new Shop_list_banners;
      
          if($files=$request->file('image')){  
            $name=$files->getClientOriginalName();  
            $files->move('admin/images/',$name); 
            $ban->banner_image=$name; 
        }
            
         
          $ban->save();
          return redirect('shoplistbanner');
      
          
  }

  public function shoplistbanneredit(Request $request){
    $id=$request->id;
    //dd($id)
    $sh_ban=Shop_list_banners::find($id);
    if($files=$request->file('image')){  
        $name=$files->getClientOriginalName();  
        $files->move('admin/images/',$name); 
        $sh_ban->banner_image=$name; 
    }
    //$sh_ban->banner_image=$request->image;
    
    $sh_ban->save();
    return redirect('shoplistbanner')->with('message', 'Updated Successfully');
}
public function shoplistbannerfetch(Request $request){
$id=$request->id;
$sh_ban=shop_list_banners::find($id);
print_r(json_encode($sh_ban));

}





  

public function shopbanner(){
    $sh=Shop::active()->get();
   // $ban=shop_banners::all();
    $ban=DB::table('shop_banners')

    ->leftJoin('shops', 'shop_banners.shop_id', '=', 'shops.id')
    
   ->select('shop_banners.*','shops.shop_name')
   ->where('shop_banners.deleted_status','=','0')
     ->get();
      return view('admin/shop_banner',compact('ban','sh'));
  }
  public function shopbannerinsert(Request $request){
    $shopcheck=DB::table('shop_banners')
    ->where('shop_id',$request->shopname)
    ->value('id');
    if($shopcheck==null){

         $ban=new Shop_banners;
         if($files=$request->file('image')){  
         $name=$files->getClientOriginalName();  
         $files->move('admin/images/',$name); 
         $ban->banner_image=$name; 
    }
       $ban->shop_id=$request->shopname;

     
       $ban->save();
       return redirect('shopbanner')->with('message', 'Added Successfully');

    }else{
        echo "Shop banner already exist.please use edit";exit;
    }
        
      
          
  }
  

  public function shopbanneredit(Request $request){
    $id=$request->id;
    $shop_ban=Shop_banners::find($id);
    if($files=$request->file('image')){  
        $name=$files->getClientOriginalName();  
        $files->move('admin/images/',$name); 
        $shop_ban->banner_image=$name; 
    }
    // $shop_ban->shop_id=$request->shopname;
    
    $shop_ban->save();
    return redirect('shopbanner')->with('message', 'Updated Successfully');
}
public function shopbannerfetch(Request $request){
$id=$request->id;
$shop_ban=shop_banners::find($id);
print_r(json_encode($shop_ban));

}




public function catproductedit(Request $request){
    $id=$request->catproductname;
    
    $cat_pro=Products::find($id);
    if($files=$request->file('image')){  
        $name=$files->getClientOriginalName();  
        $files->move('admin/images/',$name);
        $cat_pro->image=$name;   
    }
        
       
        $cat_pro->main_category_id=$request->parent;
        $cat_pro->category_id=$request->subcat;
        $cat_pro->subsub_cat_id=$request->subsubcat;
        $cat_pro->product_name=$request->productname;
        $cat_pro->number_of_pieces=$request->noquantity;
        $cat_pro->price=$request->price;
        $cat_pro->offer_price=$request->offerprice;
        $cat_pro->description=$request->desc;
        $cat_pro->discount=$request->discount;
        $cat_pro->new_status=$request->newstatus;
        $cat_pro->save();
    return redirect('catproducts')->with('message', 'Updated Successfully');
}

public function catproductfetch(Request $request)
{
$id=$request->id;
$cat_pro=Products::find($id);


print_r(json_encode($cat_pro));

}
public function catproductfetching(Request $request){
  $id=$request->id;
  $cat_pro=Products::find($id); 
  $cat=DB::table('categorys')
  ->where('parentcategory',0)
  ->where('deleted_status',0)
  ->get();
 
  $sub_cat=DB::table('categorys')
  ->where('parentcategory',$cat_pro->main_category_id)
  ->where('deleted_status',0)
  ->get();

  $sub_subcat=DB::table('categorys')
  ->where('parentcategory',$cat_pro->category_id)
  ->where('deleted_status',0)
  ->get();

  return view('admin/category_product_edit',compact('cat_pro','cat','sub_cat','sub_subcat'));
}
public function deleteBannerStatus($id){
    $ban = Banners::find($id);
    if($ban->deleted_status=="1")
    {
     $status="0";
   }
   else
   {
     $status="1";
   }
   Banners::where('id',$ban->id)
   ->update([
     'deleted_status' =>$status, 
     
   ]);
   
   return redirect('banners');
 }
 
 

 
public function deleteCategoryStatus(Request $request){
    $id=$request->category_id;
    $cat = Categorys::find($id);
    if($cat->deleted_status=="1")
    {
     $status="0";
   }
   else
   {
     $status="1";
   }
   Categorys::where('id',$cat->id)
   ->update([
     'deleted_status' =>$status, 
     
   ]);
   
   return redirect('category')->with('message', 'Deleted Successfully');
 }
 public function getdeleteCategoryStatus($id){
  $cat = Categorys::find($id);
  if($cat->deleted_status=="1")
  {
   $status="0";
 }
 else
 {
   $status="1";
 }
 Categorys::where('id',$cat->id)
 ->update([
   'deleted_status' =>$status, 
   
 ]);
 
 return redirect('category')->with('deletesuccess', 'Deleted Successfully');
 }
 public function deleteassignvariants($id){
  $cat = Category_variants::find($id);
  if($cat->deleted_status=="1")
  {
   $status="0";
 }
 else
 {
   $status="1";
 }
 Category_variants::where('id',$cat->id)
 ->update([
   'deleted_status' =>$status, 
   
 ]);
 
 return redirect('assignvariants')->with('deletesuccess', 'Deleted Successfully');
 }
 
 
public function deleteCatOfferStatus($id){
    $cat_offer = Category_offers::find($id);
    if($cat_offer->deleted_status=="1")
    {
     $status="0";
   }
   else
   {
     $status="1";
   }
   Category_offers::where('id',$cat_offer->id)
   ->update([
     'deleted_status' =>$status, 
     
   ]);
   
   return redirect('catoffers');
 }

 
public function deleteCatProdStatus(Request $request){
  $id=$request->catproid;
    $cat_produ = Products::find($id);
    if($cat_produ->deleted_status=="1")
    {
     $status="0";
   }
   else
   {
     $status="1";
   }
   Products::where('id',$cat_produ->id)
   ->update([
     'deleted_status' =>$status, 
     
   ]);
   
 
   return redirect('catproducts')->with('message', 'Deleted Successfully');
 }
 
 
 
public function deleteShopStatus(Request $request){
    $id=$request->shopdelid;
    $shop_reg = Shop::find($id);
    if($shop_reg->deleted_status=="1")
    {
     $status="0";
   }
   else
   {
     $status="1";
   }
   Shop::where('id',$shop_reg->id)
   ->update([
     'deleted_status' =>$status, 
     
   ]);
   
   return redirect('shopreg')->with('message', 'Deleted Successfully');
 }
 
 
public function deleteShoplistBanner(Request $request){
    $id=$request->delshobid;
    $shop_listban = Shop_list_banners::find($id);
    if($shop_listban->deleted_status=="1")
    {
     $status="0";
   }
   else
   {
     $status="1";
   }
   Shop_list_banners::where('id',$shop_listban->id)
   ->update([
     'deleted_status' =>$status, 
     
   ]);
   
   return redirect('shoplistbanner');
 }
 
 
public function deleteShopBanner($id){
    $shop_bann = Shop_banners::find($id);
    if($shop_bann->deleted_status=="1")
    {
     $status="0";
   }
   else
   {
     $status="1";
   }
   Shop_banners::where('id',$shop_bann->id)
   ->update([
     'deleted_status' =>$status, 
     
   ]);
   
   return redirect('shopbanner')->with('message', 'Deleted Successfully');
 }
 
 
public function deleteShopProducts(Request $request){
  $id=$request->shopproduct;
    $shop_produc = Shop_products::find($id);
  
    if($shop_produc->deleted_status=="1")
    {
     $status="0";
   }
   else
   {
     $status="1";
   }
   Shop_products::where('id',$shop_produc->id)
   ->update([
     'deleted_status' =>$status, 
     
   ]);
   
   return Redirect::back()->with('message', 'Successfull!!');
 }
 
public function deleteProdFeatStatus($id){
    $prod_featu = Product_features::find($id);
    if($prod_featu->deleted_status=="1")
    {
     $status="0";
   }
   else
   {
     $status="1";
   }
   Product_features::where('id',$prod_featu->id)
   ->update([
     'deleted_status' =>$status, 
     
   ]);
   
   return Redirect::back()->with('message', 'Deleted Successfully');
 }
 
 
public function deleteProdVarStatus($id){
  $prod_var = Product_variant::find($id);
  if($prod_var->deleted_status=="1")
  {
   $status="0";
 }
 else
 {
   $status="1";
 }
 Product_variant::where('id',$prod_var->id)
 ->update([
   'deleted_status' =>$status, 
   
 ]);
 
 return Redirect::back()->with('message', 'Deleted Successfully');
}
public function deleteProdFeatStatus1($id){
  $prod_feature = Shop_product_features::find($id);
  if($prod_feature->deleted_status=="1")
  {
   $status="0";
 }
 else
 {
   $status="1";
 }
 Shop_product_features::where('id',$prod_feature->id)
 ->update([
   'deleted_status' =>$status, 
   
 ]);
 
 return Redirect::back()->with('message', 'Deleted Successfully');
}
// public function ChangeProductsStatus($id){
//   $pro_st = Shop_products::find($id);

//   // dd($pro_st);
//   if($pro_st->number_of_pieces>="1")
//   {
//    $status="1";
//  }
//  else
//  {
//    $status="0";
//  }
//  Products::where('id',$pro_st->id)
//  ->update([
//    'number_of_pieces' =>$status, 
   
//  ]);
 
//  return Redirect::back()->with('message', 'Status Changed Successfully');
// }


public function deleteProdImageStatus($id){
  
  $prod_im = Product_images::find($id);
  if($prod_im->deleted_status=="1")
  {
   $status="0";
 }
 else
 {
   $status="1";
 }
 Product_images::where('id',$prod_im->id)
 ->update([
   'deleted_status' =>$status, 
   
 ]);
 
 
 return Redirect::back()->with('message', 'Deleted Successfully');
}
public function orders(){
  $login_id=\Auth::user()->id;

  $ord=DB::table('tbl_order_masters')  
 
   ->leftJoin('customers', 'customers.id', '=', 'tbl_order_masters.customer_id')
  
   ->select('tbl_order_masters.*','customers.first_name','customers.address','customers.phonenumber')
   
   ->latest()->get();
   
  return view('admin/orders',compact('ord'));
}	
public function orders1(){
  $login_id=Auth::user()->id;

  $ord=DB::table('tbl_order_masters')  
 
   ->leftJoin('customers', 'customers.id', '=', 'tbl_order_masters.customer_id')
  
   ->select('tbl_order_masters.*','customers.first_name','customers.address','customers.phonenumber')
   
   ->latest()->get();
   
  return view('admin/orders1',compact('ord'));
}	
public function itemfetch(Request $request){
  $id=$request->id;
 
  $it=DB::table('tbl_order_trans')  
  ->leftJoin('shop_products', 'tbl_order_trans.product_id', '=', 'shop_products.id')
  ->leftJoin('products', 'shop_products.product_id', '=', 'products.id')
  
  ->where('order_master',$id)
 
  ->get();
  print_r(json_encode($it));
  }

  public function cusitemfetching(Request $request){
    $id=$request->id;
   
    $it=DB::table('tbl_order_trans')  
    ->leftJoin('shop_products', 'tbl_order_trans.product_id', '=', 'shop_products.id')
    ->leftJoin('products', 'shop_products.product_id', '=', 'products.id')
    
    ->where('order_master',$id)
   ->select('tbl_order_trans.*','shop_products.offer_price','products.product_name')
    ->get();
    print_r(json_encode($it));
    }

 
  public function custdetailsfetch(Request $request){
    $id=$request->cusid;
   
    $cust=DB::table('tbl_shipping_details')  
  
    ->where('tbl_shipping_details.customer_id',$id)
    
    ->first();
    print_r(json_encode($cust));
    }
 
    public function variant_type(){
      $vari=Shop_varient_types::where('deleted_status',0)->get();
     
     
    
      return view('admin/variant_type',compact('vari'));
  }
  public function variant_type_insert(Request $request){
    $vari=new Shop_varient_types;

  $vari->varient_type=$request->variant;
  
  $vari->save();
  return redirect('variant_type')->with('message', 'Added Successfully');


}


public function variantfetch(Request $request){
	$id=$request->id;
	$varia=Shop_varient_types::find($id);
	print_r(json_encode($varia));
	
}
public function variant_type_edit(Request $request){
  $id=$request->id;
      $varia=Shop_varient_types::find($id);
      $varia->varient_type=$request->variant;

  $varia->save();
  return redirect('variant_type')->with('message', 'Updated Successfully');
}

public function DeleteVariantType($id){
  
  $del_var = Shop_varient_types::find($id);
  if($del_var->deleted_status=="1")
  {
   $status="0";
 }
 else
 {
   $status="1";
 }
 Shop_varient_types::where('id',$del_var->id)
 ->update([
   'deleted_status' =>$status, 
   
 ]);
 
 
 return Redirect::back()->with('message', 'Deleted Successfully');
}
public function variants(){

  $vari_type=Shop_varient_types::where('deleted_status',0)->get();
  $vari=DB::table('shop_varients')
  ->leftjoin('shop_varient_types','shop_varients.varient_type_id','=','shop_varient_types.id')
  ->select('shop_varients.*','shop_varient_types.varient_type')
  ->where('shop_varients.deleted_status',0)->get();
 
 

  return view('admin/variants',compact('vari','vari_type'));
}

public function variants_insert(Request $request){
  $vari=new Shop_varients;

$vari->varient_type_id=$request->varient_type;

$vari->varient=$request->variant;
$vari->save();
return redirect('variants')->with('message', 'Added Successfully');


}

public function varifetch(Request $request){
	$id=$request->id;
	$varia=Shop_varients::find($id);
	print_r(json_encode($varia));
	
}
public function variant_edit(Request $request){
  $id=$request->id;
      $varia=Shop_varients::find($id);
     
$varia->varient_type_id=$request->varient_type;

$varia->varient=$request->variant;
  $varia->save();
  return redirect('variants')->with('message', 'Updated Successfully');
}

public function DeleteVariants($id){
  
  $del_var = Shop_varients::find($id);
  if($del_var->deleted_status=="1")
  {
   $status="0";
 }
 else
 {
   $status="1";
 }
 Shop_varients::where('id',$del_var->id)
 ->update([
   'deleted_status' =>$status, 
   
 ]);
 
 
 return Redirect::back()->with('message', 'Deleted Successfully');
}
public function productvariantfetch(Request $request){
  $id=$request->id;
  $varn=DB::table('product_variants')
  ->leftjoin('variant_types','product_variants.variant_type','=','variant_types.id')
  ->select('product_variants.*','variant_types.variant_type')
  ->where('product_variants.shop_product_id',$id)
  ->where('product_variants.deleted_status',0)
  ->get();
  print_r(json_encode($varn));
  }
  public function updatestockvarient(Request $request){
$id=$request->productvarientid;
$stock=Product_variants::find($id);
$stock->var_stock=$request->stock;
$stock->save();
return Redirect::back();
  }
public function producvarientstockfetch(Request $request){
  $id=$request->id;
  $varn=DB::table('product_variants')
 
  ->where('product_variants.id',$id)
  ->first(); 
  print_r(json_encode($varn));
}
  public function addproductvariant(Request $request){
    $varn=new Product_variant;
    //$product = Shop_products::find($id);
    $varn->shop_product_id=$request->varid;
    $varn->variant_type=$request->vartype;
    $varn->variant_name=$request->varname;
    $varn->var_stock=$request->stockvariantt;
     $varn->save();
    return Redirect::back()->with('message', 'Added Successfully');
}

}
