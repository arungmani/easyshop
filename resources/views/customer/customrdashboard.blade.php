<!doctype html>

@extends('layout.weblayout')

@section('content')

<!-- Main Wrapper Start -->
<div class="main-wrapper">
    <!-- header-area start -->
    <div class="header-area">
        <!-- header-top start -->
        <div class="header-top bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 order-2 order-lg-1">
                        <div class="top-left-wrap">
                            <ul class="phone-email-wrap">
                                <li><i class="fa fa-phone"></i> (08)123 456 7890</li>
                                <li><i class="fa fa-envelope-open-o"></i> yourmail@domain.com</li>
                            </ul>
                            <ul class="link-top">
                                <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" title="Rss"><i class="fa fa-rss"></i></a></li>
                                <li><a href="#" title="Google"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 order-1 order-lg-2">
                        <div class="top-selector-wrapper">
                            <ul class="single-top-selector">
                                <!-- Currency Start -->
                                <li class="currency list-inline-item">
                                    <div class="btn-group">
                                        <button class="dropdown-toggle"> USD $ <i class="fa fa-angle-down"></i></button>
                                        <div class="dropdown-menu">
                                            <ul>
                                               <li><a href="#">Euro €</a></li>
                                               <li><a href="#" class="current">USD $</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <!-- Currency End -->
                                <!-- Language Start -->
                                <li class="language list-inline-item">
                                    <div class="btn-group">
                                        <button class="dropdown-toggle"><img src="{{asset('web/assets/images/icon/la-1.jpg')}}" alt="">  English <i class="fa fa-angle-down"></i></button>
                                        <div class="dropdown-menu">
                                            <ul>
                                               <li><a href="#"><img src="{{asset('web/assets/images/icon/la-1.jpg')}}" alt=""> English</a></li>
                                                <li><a href="#"><img src="{{asset('web/assets/images/icon/la-2.jpg')}}" alt=""> Français</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <!-- Language End -->
                                <!-- Sanguage Start -->
                               <li class="setting-top list-inline-item">
                                    <div class="btn-group">
                                        <button class="dropdown-toggle">Welcome {{$name}} <i class="fa fa-user-circle-o"></i> <i class="fa fa-angle-down"></i></button>
                                        <div class="dropdown-menu">
                                            <ul>
                                                <li><a href="my-account.html">My account</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="{{url('logout')}}">Sign Out</a></li>
                                            
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <!-- Sanguage End -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header-top end -->
        <!-- Header-bottom start -->
        <div class="header-bottom-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-4">
                        <!-- logo start -->
                        <div class="logo">
                            <a href="index.html"><img src="{{asset('web/assets/images/logo/1.svg')}}" alt=""></a>
                        </div>
                        <!-- logo end -->
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <!-- main-menu-area start -->
                        <div class="main-menu-area">
                            <nav class="main-navigation">
                                <ul>
                                    <li  class="active"><a href="{{url('index')}}">Home</a></li>
                                    <li><a href="{{url('shoplist')}}">Shop</a></li>
                                    <li><a href="about.html">About us</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- main-menu-area start -->
                    </div>
                    <div class="col-lg-3 col-8">
                        <div class="header-bottom-right">
                            <div class="block-search">
                                <div class="trigger-search"><i class="fa fa-search"></i> <span>Search</span></div>
                                <div class="search-box main-search-active">
                                    <form action="#" class="search-box-inner">
                                        <input type="text" placeholder="Search our catalog">
                                        <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="shoping-cart">
                                <div class="btn-group">
                                    <!-- Mini Cart Button start -->
                                    <button class="dropdown-toggle"><i class="fa fa-shopping-cart"></i> Cart (2)</button>
                                    <!-- Mini Cart button end -->
                                    
                                    <!-- Mini Cart wrap start -->
                                    <div class="dropdown-menu mini-cart-wrap">
                                        <div class="shopping-cart-content">
                                            <ul class="mini-cart-content">
                                                <!-- Mini-Cart-item start -->
                                                <li class="mini-cart-item">
                                                    <div class="mini-cart-product-img">
                                                        <a href="#"><img src="{{asset('web/assets/images/cart/1.jpg')}}" alt=""></a>
                                                        <span class="product-quantity">1x</span>
                                                    </div>
                                                    <div class="mini-cart-product-desc">
                                                        <h3><a href="#">Printed Summer Dress</a></h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$55.21</span>
                                                        </div>
                                                        <div class="size">
                                                            Size: S
                                                        </div>
                                                    </div>
                                                    <div class="remove-from-cart">
                                                        <a href="#" title="Remove"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </li>
                                                <!-- Mini-Cart-item end -->
                                                
                                                <!-- Mini-Cart-item start -->
                                                <li class="mini-cart-item">
                                                    <div class="mini-cart-product-img">
                                                        <a href="#"><img src="{{asset('web/assets/images/cart/3.jpg')}}" alt=""></a>
                                                        <span class="product-quantity">1x</span>
                                                    </div>
                                                    <div class="mini-cart-product-desc">
                                                        <h3><a href="#">Faded Sleeves T-shirt</a></h3>
                                                        <div class="price-box">
                                                            <span class="new-price">$72.21</span>
                                                        </div>
                                                        <div class="size">
                                                            Size: M
                                                        </div>
                                                    </div>
                                                    <div class="remove-from-cart">
                                                        <a href="#" title="Remove"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </li>
                                                <!-- Mini-Cart-item end -->
                                                
                                                <li>
                                                    <!-- shopping-cart-total start -->
                                                    <div class="shopping-cart-total">
                                                        <h4>Sub-Total : <span>$127.42</span></h4>
                                                        <h4>Total : <span>$127.42</span></h4>
                                                    </div>
                                                    <!-- shopping-cart-total end -->
                                                </li>
                                                
                                                <li>   
                                                    <!-- shopping-cart-btn start -->
                                                    <div class="shopping-cart-btn">
                                                        <a href="checkout.html">Checkout</a>
                                                    </div>
                                                    <!-- shopping-cart-btn end -->
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Mini Cart wrap End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- mobile-menu start -->
                        <div class="mobile-menu d-block d-lg-none"></div>
                        <!-- mobile-menu end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header-bottom end -->
    </div>
    <!-- Header-area end -->
	
	<div class="ad-area">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                @foreach($banner as $banner)
    <img src="{{ asset('/admin/images/'.$banner->banner_image) }}" alt=""/>
    @endforeach
				</div>
			</div>
		</div>
	</div>
    
    <!-- category-container-slider Start -->
    <div class="category-container-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- category-main-container start -->
                    <div class="category-main-container">                       

                        <!-- category-three-area start -->
                        <div class="category-three-area pt--20">
                            <div class="row">
                                <div class="col">
                                    <div class="section-titele-four">
                                        <div class="section-titele-four-inner">
                                            <h2>&nbsp;</h2>
                                            <div class="tabs-categorys-list-two">
                                                <ul class="nav" role="tablist">
                                                   <li class="active"><a class="active" href="#brandnew" role="tab" data-toggle="tab">Brand New</a></li>
                                                   <li><a href="#used"  role="tab" data-toggle="tab">Used </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- category-wrapper-four start -->
                            <div class="category-wrapper-four">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="brandnew">
                                        <div class="row">
                <div class="col-lg-12">
                    <!-- blog-wrapper start -->
                    <div class="blog-wrapper category-wrapper">
                        
                        <!-- blog-wrap start -->
                        <div class="row blog-wrap-col-3">

                        @foreach($brandnew as $catItem)
                            <div class="col-lg-4 col-md-6">
                                <!-- single-category-area start -->
                                <div class="single-blog-area single-category-area  mb--40">
                                    <div class="blog-image category-image">
                                        <a href="/public/shoplistuser/{{ $catItem->id }}"><img src="{{ asset('/admin/images/'.$catItem->image) }}" alt=""></a>
                                    </div>
                                    <div class="blog-contend category-contend">
                                        <h3><a href="{{url('shoplist')}}">{{$catItem->categoryname}}</a></h3>
                                    </div>
                                </div>
                                <!-- single-category-area end -->
                            </div>
                           
                           @endforeach 
                            
                        </div>
                        <!-- category-wrap end -->
                        
                    </div>
                    <!-- blog-wrapper end -->
                </div>
            </div>
                                    </div>
                                    <div class="tab-pane" id="used">
                                        <div class="row">
                <div class="col-lg-12">
                    <!-- blog-wrapper start -->
                    <div class="blog-wrapper category-wrapper">
                        
                        <!-- blog-wrap start -->
                        <div class="row blog-wrap-col-3">
                        @foreach($used as $usedCat)

                            <div class="col-lg-4 col-md-6">
                                <!-- single-blog-area start -->
                                <div class="single-blog-area single-category-area  mb--40">
                                    <div class="blog-image category-image">
                                        <a href="blog-details.html"><img src="{{ asset('/admin/images/'.$usedCat->image) }}" alt=""></a>
                                    </div>
                                    <div class="blog-contend category-contend">
                                        <h3><a href="#">{{$usedCat->categoryname}}</a></h3>
                                    </div>
                                </div>
                                <!-- single-blog-area end -->
                            </div>
                          
                         @endforeach
                         
                           
                           
                           
                          
                        </div>
                        <!-- blog-wrap end -->
                        
                       
                    </div>
                    <!-- blog-wrapper end -->
                </div>
            </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- product-wrapper-four end -->
                        </div>
                        <!-- product-three-area end -->
                        
                        
                       
                    </div>
                    <!-- category-main-container end -->
                </div>
                
            </div>
        </div>
    </div>
    <!-- category-container-slider Start -->
    
   
    
    <!-- Footer Aare Start -->
    
    <!-- Footer Aare End -->
    
    
    

    <!-- Modal Algemeen Uitgelicht start -->
    <div class="modal fade modal-wrapper" id="exampleModalCenter" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-inner-area row">
                        <div class="col-lg-5 col-md-6 col-sm-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    <div class="lg-image">
                                        <img src="{{asset('web/assets/images/product/1.jpg')}}" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="{{asset('web/assets/images/product/2.jpg')}}" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="{{asset('web/assets/images/product/3.jpg')}}" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="{{asset('web/assets/images/product/5.jpg')}}" alt="product image">
                                    </div>
                                </div>
                                <div class="product-details-thumbs slider-thumbs-1">										
                                    <div class="sm-image"><img src="{{asset('web/assets/images/product/1.jpg')}}" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="{{asset('web/assets/images/product/2.jpg')}}" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="{{asset('web/assets/images/product/3.jpg')}}" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="{{asset('web/assets/images/product/4.jpg')}}" alt="product image thumb"></div>
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6 col-sm-6">
                            <div class="product-details-view-content">
                                <div class="product-info">
                                    <h2>Healthy Melt</h2>
                                    <div class="price-box">
                                        <span class="old-price">$70.00</span>
                                        <span class="new-price">$76.00</span>
                                        <span class="discount discount-percentage">Save 5%</span>
                                    </div>
                                    <p>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.</p>
                                    <div class="product-variants">
                                        <div class="produt-variants-size">
                                            <label>Size</label>
                                            <select class="form-control-select" >
                                                <option value="1" title="S" selected="selected">S</option>
                                                <option value="2" title="M">M</option>
                                                <option value="3" title="L">L</option>
                                            </select>
                                        </div>
                                        <div class="produt-variants-color">
                                            <label>Color</label>
                                            <ul class="color-list">
                                                <li><a href="#" class="orange-color active"></a></li>
                                                <li><a href="#" class="paste-color"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="single-add-to-cart">
                                        <form action="#" class="cart-quantity">
                                            <div class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                            <button class="add-to-cart" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <!-- Modal Algemeen Uitgelicht end -->
    
</div>
<!-- Main Wrapper End -->
@endsection
<!-- JS
============================================ -->

