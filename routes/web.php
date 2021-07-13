<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect(route('userlogin'));
});


// Route::get('/login', 'LoginController@authenticate')->name('login');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/errorpage', 'WebController@errorpage')->name('errorpage');
//Route::get('/home2', 'CustomerController@index')->name('home2');

//Route::get('/home2','CustomerController/index', function () {
    //
//})->middleware(checkDashboard::class);

Route::get('/home2', [
    'middleware' => 'auth',
    'uses' => 'CustomerController@index'
])->name('home2');

// Route::get('shoplist/{id}', [
	// 'middleware' => 'auth',
    // 'uses' => 'WebController@shoplist'
// ])->name('shoplist');

//admin panel Route=========================================
Route::get('/category', 'HomeController@category')->name('category');

Route::get('/shopreg', 'HomeController@shopreg')->name('shopreg');
Route::get('/banners', 'HomeController@banners')->name('banners');

Route::get('/variant_type', 'HomeController@variant_type')->name('variant_type');
Route::post('/variant_type_insert', 'HomeController@variant_type_insert')->name('variant_type_insert');
Route::post('/variantfetch', 'HomeController@variantfetch')->name('variantfetch');
Route::post('/variant_type_edit', 'HomeController@variant_type_edit')->name('variant_type_edit');
Route::post('/addproductvariant', 'HomeController@addproductvariant')->name('addproductvariant');
Route::get('/DeleteVariantType/{id}', 'HomeController@DeleteVariantType')->name('DeleteVariantType');


Route::get('/variants', 'HomeController@variants')->name('variants');
Route::post('/variants_insert', 'HomeController@variants_insert')->name('variants_insert');
Route::post('/varifetch', 'HomeController@varifetch')->name('varifetch');
Route::post('/variant_edit', 'HomeController@variant_edit')->name('variant_edit');
Route::get('/DeleteVariants/{id}', 'HomeController@DeleteVariants')->name('DeleteVariants');






Route::get('/deleteProdVarStatus/{id}', 'HomeController@deleteProdVarStatus')->name('deleteProdVarStatus');

Route::post('/productvariantfetch', 'HomeController@productvariantfetch')->name('productvariantfetch');
Route::post('/producvarientstockfetch', 'HomeController@producvarientstockfetch')->name('producvarientstockfetch');
Route::post('/updatestockvarient', 'HomeController@updatestockvarient')->name('updatestockvarient');
Route::post('/categoryinsert', 'HomeController@categoryinsert')->name('categoryinsert');

Route::post('/shopinsert', 'HomeController@shopinsert')->name('shopinsert');
Route::post('/subcatfetch', 'HomeController@subcatfetch')->name('subcatfetch');
Route::post('/bannerinsert', 'HomeController@bannerinsert')->name('bannerinsert');
Route::get('/catoffers', 'HomeController@catoffers')->name('catoffers');
Route::get('/banners', 'HomeController@banners')->name('banners');
Route::post('/catofferinsert', 'HomeController@catofferinsert')->name('catofferinsert');
Route::get('/catproducts', 'HomeController@catproducts')->name('catproducts');
Route::post('/catproductfetching', 'HomeController@catproductfetching')->name('catproductfetching');
Route::post('/catproductinsert', 'HomeController@catproductinsert')->name('catproductinsert');
Route::post('/itemfetching', 'HomeController@itemfetch')->name('itemfetching');
Route::post('/cusitemfetching', 'HomeController@cusitemfetching')->name('cusitemfetching');
Route::post('/custdetailsfetching', 'HomeController@custdetailsfetch')->name('custdetailsfetching');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Website Panel Route ===================================================
Route::get('/index', 'WebController@index')->name('index');

Route::get('/userlogin', 'WebController@userlogin')->name('userlogin');
Route::get('/itemfetch', 'WebController@itemfetch')->name('itemfetch');
Route::get('/email_verification/{id}', 'WebController@email_verification')->name('email_verification');


Route::get('/custdetailsfetch', 'WebController@custdetailsfetch')->name('custdetailsfetch');

Route::get('/alert_page', 'WebController@alert_page')->name('alert_page');


Route::get('/subcatlist/{id}', 'WebController@subcatlist')->name('subcatlist');

Route::get('/productlist/{id}', 'WebController@productlist')->name('productlist');

Route::get('/shoplist/{id}', 'WebController@shoplist')->name('shoplist');

Route::get('/shoplisting/{id}/{catid}', 'WebController@shoplisting')->name('shoplisting');

Route::get('/product_details/{id}/{proid}/{catid}/{colorid}', 'WebController@product_details')->name('product_details');

Route::post('/cusregister', 'WebController@cusregister')->name('cusregister');

Route::post('/productvarientfetching', 'WebController@productvarientfetching')->name('productvarientfetching');

Route::post('/getproductimages', 'WebController@getproductimages')->name('getproductimages');

Route::post('/productdetailfetching', 'WebController@productdetailfetching')->name('productdetailfetching');

Route::post('/orderinsert', 'WebController@orderinsert')->name('orderinsert');

Route::post('/insertreview', 'WebController@insertreview')->name('insertreview');

Route::post('/checkauthentication', 'WebController@checkauthentication')->name('checkauthentication');

Route::post('/shopproductdetailsfetch', 'WebController@shopproductdetailsfetch')->name('shopproductdetailsfetch');

Route::post('/shop_productimagesfetch', 'WebController@shop_productimagesfetch')->name('shop_productimagesfetch');

Route::post('/addtocart', 'WebController@addtocart')->name('addtocart');

Route::get('/addtocartlist', 'WebController@addtocartlist')->name('addtocartlist');

Route::post('/addtocartnext', 'WebController@addtocartnext')->name('addtocartnext');

Route::post('/addtocartpay', 'WebController@addtocartpay')->name('addtocartpay');

Route::get('/myaccount', 'WebController@myaccount')->name('myaccount');

Route::post('/checkout', 'WebController@checkout')->name('checkout');

Route::post('/insertdeladd', 'WebController@insertdeladd')->name('insertdeladd');



//Route for customer website========================================
Route::get('/shoplistuser/{id}', 'CustomerController@shoplistcustomer')->name('shoplistuser');

Route::post('/sub_catgfetching', [App\Http\Controllers\HomeController::class, 'sub_catgfetching'])->name('sub_catgfetching');
Route::post('/sub_catginsert', [App\Http\Controllers\HomeController::class, 'sub_catginsert'])->name('sub_catginsert');

Route::post('/editbanners', [App\Http\Controllers\HomeController::class, 'editbanners'])->name('editbanners');
Route::post('/bannerfetch', [App\Http\Controllers\HomeController::class, 'bannerfetch'])->name('bannerfetch');


Route::get('/shopproducts', 'HomeController@shopproducts')->name('shopproducts');

Route::get('/shopproducts1', 'HomeController@shopproducts1')->name('shopproducts1');
Route::post('/shopproductinsert', [App\Http\Controllers\HomeController::class, 'shopproductinsert'])->name('shopproductinsert');

Route::post('/catproductinsert1', [App\Http\Controllers\HomeController::class, 'catproductinsert1'])->name('catproductinsert1');

Route::post('/shopproductinsert1', [App\Http\Controllers\HomeController::class, 'shopproductinsert1'])->name('shopproductinsert1');

Route::post('/productimageinsert', [App\Http\Controllers\HomeController::class, 'productimageinsert'])->name('productimageinsert');
Route::post('/productimagefetch', [App\Http\Controllers\HomeController::class, 'productimagefetch'])->name('productimagefetch');
Route::post('/editshopproducts', [App\Http\Controllers\HomeController::class, 'editshopproducts'])->name('editshopproducts');
Route::post('/editshopproducts1', [App\Http\Controllers\HomeController::class, 'editshopproducts1'])->name('editshopproducts1');
Route::post('/shopproductfetch', [App\Http\Controllers\HomeController::class, 'shopproductfetch'])->name('shopproductfetch');




Route::post('/addproductfeatures', [App\Http\Controllers\HomeController::class, 'addproductfeatures'])->name('addproductfeatures');
Route::post('/productfeaturesfetch', [App\Http\Controllers\HomeController::class, 'productfeaturesfetch'])->name('productfeaturesfetch');
Route::post('/productreviewfetch', [App\Http\Controllers\HomeController::class, 'productreviewfetch'])->name('productreviewfetch');
Route::post('/productfeaturesfetch1', [App\Http\Controllers\HomeController::class, 'productfeaturesfetch1'])->name('productfeaturesfetch1');
Route::post('/addproductfeatures1', [App\Http\Controllers\HomeController::class, 'addproductfeatures1'])->name('addproductfeatures1');


Route::get('/shoplistbanner', 'HomeController@shoplistbanner')->name('shoplistbanner');
Route::post('/bannerimageinsert', [App\Http\Controllers\HomeController::class, 'bannerimageinsert'])->name('bannerimageinsert');

Route::get('/shopbanner', 'HomeController@shopbanner')->name('shopbanner');
Route::post('/shopbannerinsert', [App\Http\Controllers\HomeController::class, 'shopbannerinsert'])->name('shopbannerinsert');

Route::post('/shopbanneredit', [App\Http\Controllers\HomeController::class, 'shopbanneredit'])->name('shopbanneredit');


Route::post('/banneredit', [App\Http\Controllers\HomeController::class, 'banneredit'])->name('banneredit');
Route::post('/shopbannerfetch', [App\Http\Controllers\HomeController::class, 'shopbannerfetch'])->name('shopbannerfetch');

Route::post('/shoplistbanneredit', [App\Http\Controllers\HomeController::class, 'shoplistbanneredit'])->name('shoplistbanneredit');
Route::post('/shoplistbannerfetch', [App\Http\Controllers\HomeController::class, 'shoplistbannerfetch'])->name('shoplistbannerfetch');


Route::post('/edit_shop', [App\Http\Controllers\HomeController::class, 'edit_shop'])->name('edit_shop');
Route::post('/shoplistfetch', [App\Http\Controllers\HomeController::class, 'shoplistfetch'])->name('shoplistfetch');


Route::post('/catproductedit', [App\Http\Controllers\HomeController::class, 'catproductedit'])->name('catproductedit');
Route::post('/catproductfetch', [App\Http\Controllers\HomeController::class, 'catproductfetch'])->name('catproductfetch');


Route::post('/edit_category', [App\Http\Controllers\HomeController::class, 'edit_category'])->name('edit_category');
Route::post('/categoryfetch', [App\Http\Controllers\HomeController::class, 'categoryfetch'])->name('categoryfetch');
// ____________anu_______28-5-2021_______
Route::get('/assignvariants', 'HomeController@assignvariants')->name('assignvariants');
Route::post('/assignvariinsert', 'HomeController@assignvariinsert')->name('assignvariinsert');
Route::post('/assignvarifetch', [App\Http\Controllers\HomeController::class, 'assignvarifetch'])->name('assignvarifetch');


//___________end anu_____________________

// Route::post('status_filter', 'HomeController@status_filter');

Route::get('/orders', 'HomeController@orders')->name('orders');


Route::get('/orders1', 'HomeController@orders1')->name('orders1');
Route::get('deleteBannerStatus/{id}','HomeController@deleteBannerStatus')->name('deleteBannerStatus'); 
Route::post('deleteCategoryStatus','HomeController@deleteCategoryStatus')->name('deleteCategoryStatus'); 
Route::get('getdeleteCategoryStatus/{id}','HomeController@getdeleteCategoryStatus')->name('getdeleteCategoryStatus'); 
Route::get('deleteCatOfferStatus/{id}','HomeController@deleteCatOfferStatus')->name('deleteCatOfferStatus');
Route::post('deleteCatProdStatus','HomeController@deleteCatProdStatus')->name('deleteCatProdStatus');
Route::post('deleteShopStatus','HomeController@deleteShopStatus')->name('deleteShopStatus');
Route::post('deleteShoplistBanner','HomeController@deleteShoplistBanner')->name('deleteShoplistBanner');
Route::get('deleteShopBanner/{id}','HomeController@deleteShopBanner')->name('deleteShopBanner');
Route::post('deleteShopProducts','HomeController@deleteShopProducts')->name('deleteShopProducts');
Route::get('ChangeProductsStatus/{id}','HomeController@ChangeProductsStatus')->name('ChangeProductsStatus');
Route::get('deleteProdFeatStatus/{id}','HomeController@deleteProdFeatStatus')->name('deleteProdFeatStatus');
Route::get('deleteProdFeatStatus1/{id}','HomeController@deleteProdFeatStatus1')->name('deleteProdFeatStatus1');
Route::get('deleteProdImageStatus/{id}','HomeController@deleteProdImageStatus')->name('deleteProdImageStatus');
Route::get('deleteassignvariants/{id}','HomeController@deleteassignvariants')->name('deleteassignvariants');


Route::get('updatestatus/{id}','HomeController@updatestatus')->name('updatestatus'); 
//shop

Route::get('shopregitser','WebController@shopregitser')->name('shopregitser');
Route::post('shopadd','WebController@shopadd')->name('shopadd');
Route::get('/shop_email_verification/{id}', 'WebController@shop_email_verification')->name('shop_email_verification');


