@extends('layout.weblayout')



@section('content')

@include('layout.webpartials.navbar')

<div class="breadcrumb-area bg-grey">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <ul class="breadcrumb-list">

                        <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>

                        <li class="breadcrumb-item "><a href="{{url('subcatlist/'.$category->id)}}">{{$category->categoryname}}</a></li>

                        <li class="breadcrumb-item active">{{$subcat->categoryname}}</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!-- breadcrumb-area end -->

    

    

    <!-- content-wraper start -->

    <div class="content-wraper">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <!-- shop-top-bar start -->

                    <div class="shop-top-bar">

                        <div class="shop-bar-inner">

                            <div class="product-view-mode">

                                <!-- shop-item-filter-list start -->

                                <ul class="nav shop-item-filter-list" role="tablist">

                                    <li class="active"><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>

                                    <li><a data-toggle="tab"  href="#list-view"><i class="fa fa-th-list"></i></a></li>

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

                    <style>

                        .product-image img{

                            height:250px;

                        }

                        </style>

                    <!-- shop-products-wrapper start -->

                    <div class="shop-products-wrapper">

                        <div class="tab-content">

                            <div id="grid-view" class="tab-pane active">

                                <div class="shop-product-area">

                                    <div class="row">



                                    @foreach($product as $product)

                                        <div class="col-lg-4 col-md-4 col-sm-6 mt-30">

                                            <!-- single-product-wrap start -->

                                            <div class="single-product-wrap">

                                                <div class="product-image">

                                                    <a href="{{url('/shoplisting/'.$product->id.'/'.$product->subsub_cat_id) }}"><img src="{{ asset('/admin/images/'.$product->image) }}" width="600" alt=""></a>

                                                    <span class="label-product label-new">@if($product->new_status==1) new @endif</span>
                                                    <span class="label-product label-new">{{$product->price}} AED</span>
                                                    <!-- @php
                                                    $dis=round((($product->price)-($product->offer_price))/(($product->price)*100));
                                                  
                                                    @endphp
                                                    <span class="label-product label-sale">-
                                                    @php
                                                    echo $dis;  
                                                    @endphp %</span> -->
                                                    <div class="quick_view">

                                                        <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>

                                                    </div>

                                                </div>

                                                <div class="product-content">

                                                    <h3><a href="{{url('/shoplisting/'.$product->id) }}">{{$product->product_name}}</a></h3>

                                                    <!--<div class="price-box">

                                                        <span class="new-price">$51.27</span>

                                                        <span class="old-price">$54.49</span>

                                                    </div>-->

                                                    <!--<div class="product-action">

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

                                                    </div>-->

                                                </div>

                                            </div>

                                            <!-- single-product-wrap end -->

                                        </div>

                                      @endforeach  





                                    </div>

                                </div>

                            </div>













                            <div id="list-view" class="tab-pane">

                                <div class="row">

                                    <div class="col">

                                    @foreach($product1 as $product1)

                                        <div class="row product-layout-list">

                                            <div class="col-lg-4 col-md-5">

                                                <!-- single-product-wrap start -->

                                                <div class="single-product-wrap">

                                                    <div class="product-image">

                                                        <a href="{{url('/shoplisting/'.$product1->id) }}"><img src="{{ asset('/admin/images/'.$product1->image) }}" alt=""></a>

                                                        <span class="label-product label-new">@if($product1->new_status==1) new @endif</span>

                                                        <span class="label-product label-sale">-{{$product1->discount}}</span>

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

                                                        <h3><a href="{{url('/shoplisting/'.$product1->id) }}">{{$product1->product_name}}</a></h3>

                                                       <!-- <div class="star_content">

                                                            <ul class="d-flex">

                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>

                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>

                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>

                                                                <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>

                                                                <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>

                                                            </ul>

                                                        </div>-->

                                                       <!-- <div class="price-box">

                                                            <span class="new-price">$55.27</span>

                                                            <span class="old-price">$58.49</span>

                                                        </div>-->

                                                      <!--  <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>-->

                                                        <p>{{$product1->description}}</p>

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

                </div>

            </div>

        </div>

    </div>

@endsection