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
        <style>
        .prductSort a.btn.active {
    background: #000;
    color: #fff;
}
        </style>
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
                                    <!-- <button class="dropdown-toggle">-->
									<button class=""><i class="fa fa-shopping-cart"></i> Cart (0)</button>
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
    
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
						<li class="breadcrumb-item"><a href="index.html">brand New</a></li>
                        <li class="breadcrumb-item active">Electronics</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
	
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
    
    
    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-1 order-lg-1">
                    @foreach($offers as $offers )
					<div class="sidebar-adarea">
				    <img src="{{ asset('/admin/images/'.$offers->image) }}" alt=""/> 
					</div>
                    @endforeach
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box">
                        <div class="sidebar-title">
                            <h2>Filter By</h2>
                        </div>
                        <!-- btn-clear-all start -->
                        <button class="btn-clear-all">Clear all</button>
                        <!-- btn-clear-all end -->
                        
                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Emirates</h5>
                            <div class="categori-checkbox">
                                <form action="#">
                                    <ul>
                                        <li><input type="checkbox" name="product-categori" checked="checked"><a href="#">All</a></li>
                                        <li><input type="checkbox" name="product-categori"><a href="#">Abudhabi (4)</a></li>
                                        <li><input type="checkbox" name="product-categori"><a href="#">Dubai (4)</a></li>
										<li><input type="checkbox" name="product-categori"><a href="#">Sharjah (8)</a></li>
                                    </ul>
                                </form>
                            </div>
                         </div>
                        <!-- filter-sub-area end -->
                    </div>
                    <!--sidebar-categores-box end  -->

                    <!-- shop-banner start -->
                    <div class="shop-banner">
                        <div class="single-banner">
                            <a href="#"><img src="assets/images/adbanner/271_539.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- shop-banner end -->
                </div>
                <div class="col-lg-9 order-2 order-lg-2">	
				<div class="row mt-10">					
				<div class="col-lg-12">					
				<div class="prductSort">	
				
				<a href="#" class="btn display active" id="tab_display_1" data-id="1" tabindex="0"><span>Display by Product</span></a> 
				<a href="#" class="btn display" id="tab_display_2" data-id="2" tabindex="0"><span>Display by Shop</span></a>												</div>											</div>										</div>
                    <!-- shop-top-bar start -->
                    <div class="shop-top-bar mt-95">
                        <div class="shop-bar-inner">												
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <li><a data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                    <li class="active"><a class="active" data-toggle="tab"  href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>
                            <div class="toolbar-amount">
                                <span>Showing 1 to 9 of 15</span>
                            </div>
                        </div>
                        <!-- product-select-box start -->
                        <div class="product-select-box">
                            <div class="product-short">
                                <p>Sort By:</p>
                                <select class="nice-select">
                                    <option value="trending">Relevance</option>
                                    <option value="sales">Name (A - Z)</option>
                                    <option value="sales">Name (Z - A)</option>
                                    <option value="rating">Price (Low &gt; High)</option>
                                    <option value="date">Rating (Lowest)</option>
                                    <option value="price-asc">Model (A - Z)</option>
                                    <option value="price-asc">Model (Z - A)</option>
                                </select>
                            </div>
                        </div>
                        <!-- product-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->
                    
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper" id="display_byproduct">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane">
                                <div class="shop-product-area">
                                    <div class="row">

                                    @foreach($product as $productsitem)
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="{{ asset('/admin/images/'.$productsitem->image) }}" alt=""></a>
                                                    @if($productsitem->new_status==1)<span class="label-product label-new">new</span>@endif
                                                    <span class="label-product label-sale">-{{$productsitem->discount}}%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">{{$productsitem->product_name}}</a></h3>
                                                    <div class="price-box">
                                                        <span class="new-price">${{$productsitem->offer_price}}</span>
                                                        <span class="old-price">${{$productsitem->price}}</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                    @endforeach
                                     
                                 
                                    </div>
                                </div>
                            </div>
                            <div id="list-view" class="tab-pane active">
                                <div class="row">
                                    <div class="col">
                                    @foreach($product as $productsitem)
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="product-details.html"><img src="{{ asset('/admin/images/'.$productsitem->image) }}" alt=""></a>
                                                        @if($productsitem->new_status==1) <span class="label-product label-new">new</span> @endif
                                                        <span class="label-product label-sale">-{{$productsitem->discount}}%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="product-details.html">{{$productsitem->product_name}}</a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                            @php 
                                                            $rating=$productsitem->rating;
                                                            $bal=5-$rating;
                                                            for($i=1;$i<=$rating;$i++){
                                                            @endphp
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                              
                                                                @php
                                                            }

                                                            for($i=1;$i<=$bal;$i++){
                                                            @endphp
                                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                              
                                                                @php
                                                            }
                                                                @endphp
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">${{$productsitem->offer_price}}</span>
                                                            <span class="old-price">${{$productsitem->price}}</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <p>{{$productsitem->description}}</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                      
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area start -->
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <p>Showing 1-12 of 13 item(s)</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box">
                                            <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                            </li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>
                                              <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area end -->
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
					
					
					<!----------second div--------------->
					
					<div class="shop-products-wrapper" id="display_byshop" style="display:none;">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane">
                                <div class="shop-product-area">
                                    <div class="row">
                                      
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="{{asset('web/assets/images/product/4_n.jpg')}}" alt=""></a>
                                                    <span class="label-product label-new">new</span>
                                                    <span class="label-product label-sale">-7%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html"> Summer Dress</a></h3>
                                                    <div class="price-box">
                                                        <span class="new-price">$51.27</span>
                                                        <span class="old-price">$54.49</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="{{asset('web/assets/images/product/7.jpg')}}" alt=""></a>
                                                    <span class="label-product label-new">new</span>
                                                    <span class="label-product label-sale">-7%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">Mushroom Burger</a></h3>
                                                    <div class="price-box">
                                                        <span class="new-price">$51.27</span>
                                                        <span class="old-price">$54.49</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="{{asset('web/assets/images/product/1_n.jpg')}}" alt=""></a>
                                                    <span class="label-product label-new">new</span>
                                                    <span class="label-product label-sale">-4%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">Printed Summer Dress</a></h3>
                                                    <div class="price-box">
                                                        <span class="new-price">$81.27</span>
                                                        <span class="old-price">$80.49</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="{{asset('web/assets/images/product/8_n.jpg')}}" alt=""></a>
                                                    <span class="label-product label-new">new</span>
                                                    <span class="label-product label-sale">-7%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">Dress Printed Summer</a></h3>
                                                    <div class="price-box">
                                                        <span class="new-price">$51.27</span>
                                                        <span class="old-price">$54.49</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="{{asset('web/assets/images/product/9.jpg')}}" alt=""></a>
                                                    <span class="label-product label-new">new</span>
                                                    <span class="label-product label-sale">-7%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">Printed Summer Dress</a></h3>
                                                    <div class="price-box">
                                                        <span class="new-price">$51.27</span>
                                                        <span class="old-price">$54.49</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="{{asset('web/assets/images/product/10.jpg')}}" alt=""></a>
                                                    <span class="label-product label-new">new</span>
                                                    <span class="label-product label-sale">-4%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">Printed Summer</a></h3>
                                                    <div class="price-box">
                                                        <span class="new-price">$81.27</span>
                                                        <span class="old-price">$80.49</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="{{asset('web/assets/images/product/3_n.jpg')}}" alt=""></a>
                                                    <span class="label-product label-new">new</span>
                                                    <span class="label-product label-sale">-7%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">Hot Printed Summer</a></h3>
                                                    <div class="price-box">
                                                        <span class="new-price">$51.27</span>
                                                        <span class="old-price">$54.49</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="{{asset('web/assets/images/product/4_n.jpg')}}" alt=""></a>
                                                    <span class="label-product label-new">new</span>
                                                    <span class="label-product label-sale">-7%</span>
                                                    <div class="quick_view">
                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="product-details.html">Laptop</a></h3>
                                                    <div class="price-box">
                                                        <span class="new-price">$51.27</span>
                                                        <span class="old-price">$54.49</span>
                                                    </div>
                                                    <div class="product-action">
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="list-view" class="tab-pane active">
                                <div class="row">
                                    <div class="col">
                                       
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="product-details.html"><img src="{{asset('web/assets/images/product/4_n.jpg')}}" alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="product-details.html">Electro System </a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$51.27</span>
                                                            <span class="old-price">$54.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
										 <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="product-details.html"><img src="{{asset('web/assets/images/product/5_n.jpg')}}" alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="product-details.html">Laptop</a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$55.27</span>
                                                            <span class="old-price">$58.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="product-details.html"><img src="{{asset('web/assets/images/product/8_n.jpg')}}" alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="product-details.html">Television</a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$41.27</span>
                                                            <span class="old-price">$54.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="product-details.html"><img src="{{asset('web/assets/images/product/6_n.jpg')}}" alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="product-details.html">Micro Oven</a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$41.27</span>
                                                            <span class="old-price">$54.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="product-details.html"><img src="{{asset('web/assets/images/product/2_n.jpg')}}" alt=""></a>
                                                        <span class="label-product label-new">new</span>
                                                        <span class="label-product label-sale">-7%</span>
                                                        <div class="quick_view">
                                                            <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                            <div class="col-lg-8 col-md-7">
                                                <div class="product_desc">
                                                    <!-- single-product-wrap start -->
                                                    <div class="product-content-list">
                                                        <h3><a href="product-details.html">Computer System</a></h3>
                                                        <div class="star_content">
                                                            <ul class="d-flex">
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="price-box">
                                                            <span class="new-price">$31.27</span>
                                                            <span class="old-price">$44.49</span>
                                                        </div>
                                                        <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area start -->
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <p>Showing 1-12 of 13 item(s)</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul class="pagination-box">
                                            <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                            </li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li>
                                              <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- paginatoin-area end -->
                        </div>
                    </div>
					
					<!---------------end second div---------------------->
					
					
					
					
					
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    
    
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
                                        <img src="{{asset('web/assets/images/product/1_n.jpg')}}" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="{{asset('web/assets/images/product/2_njpg')}}" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="{{asset('web/assets/images/product/3_n.jpg')}}" alt="product image">
                                    </div>
                                    <div class="lg-image">
                                        <img src="{{asset('web/assets/images/product/5_n.jpg')}}" alt="product image">
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


