@extends('layout.weblayout')
@section('content')

@include('layout.webpartials.navbar')
<!-- Main Wrapper Start -->
  <!-- Header-area end -->
  <style>
    .checked {
        color: orange;
        padding-left: 2px;
    }
    .unchecked {
        color: #ddd;
        padding-left: 2px;
    }
    .star-container {
      position: relative;
      display: inline-block;
      margin-top: 6px;
      margin-left: 2px;
    }
    .star-under {
      color: #ddd;
      vertical-align: top;
    }
    .star-over {
      color: orange;
      position: absolute;
      left: 0;
      top: 0;
      width: 50%;
      overflow: hidden;
    }
    .btn {
      background: #000;
   		color: #ffff;
    }
    .btn:hover{
      background: #dc3545;
      color: #ffffff;
    }
    .shoplistingdiv{
      margin-bottom:17px;
    }
    nav {
      margin-top: 10px;
    }
    .discounts{
      background-color: #dc3545;
      
      color:#fff;
    }
    .old-price1{
      text-decoration: line-through;
        font-size: 16px;
        margin-right: 8px;
    }
    .modaldetailview {
      z-index : 1041
    }
    .nstock{
            color:#ef0808;
            margin-right: 9px;
        }
  </style>

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
						            <li class="breadcrumb-item"><a href="{{url('subcatlist/'.$subcategory->id)}}">{{$subcategory->categoryname}}</a></li>
                        <li class="breadcrumb-item "><a href="{{url('productlist/'.$subsubcategory->id)}}">{{$subsubcategory->categoryname}}</a></li>
                        <li class="breadcrumb-item active">{{$product->product_name}}</li>
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
            <div class="col-lg-3 order-2 order-lg-1">
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
                  <h5 class="filter-sub-titel">Shops</h5>
                  <div class="categori-checkbox">
                    <form action="#">
                      <ul>
                        <li>
                          <input type="checkbox" name="product-categori" checked="checked"/><a href="#">All</a>
                        </li>
                        <li>
                          <input type="checkbox" name="product-categori" /><a href="#">Balaji Shop (4)</a>
                        </li>
                        <li>
                          <input type="checkbox" name="product-categori" /><a href="#">Lulu (4)</a>
                        </li>
                        <li>
                          <input type="checkbox" name="product-categori" /><a href="#">Oberon (8)</a>
                        </li>
                      </ul>
                    </form>
                  </div>
                </div>
                <!-- filter-sub-area end -->
              </div>
              <!--sidebar-categores-box end  -->
              @foreach($offers as $offers)
              <div class="sidebar-adarea">
                <img src="{{ asset('/admin/images/'.$offers->image) }}" alt=""/>
              </div>
              @endforeach
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
              <!-- shop-top-bar start -->
              <div class="shop-top-bar mt-95">
                <div class="shop-bar-inner">
                  <div class="product-view-mode">
                    <!-- shop-item-filter-list start -->
                    <ul class="nav shop-item-filter-list" role="tablist">
                      <li class="active">
                        <a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a>
                      </li>
                      <li>
                        <a data-toggle="tab" href="#list-view"><i class="fa fa-th-list"></i></a>
                      </li>
                    </ul>
                    <!-- shop-item-filter-list end -->
                  </div>
                  <div class="toolbar-amount">
                    <span>Sold By</span>
                  </div>
                </div            
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
              {!! $shoplist1->render() !!}

              <!-- shop-products-wrapper start -->
              <div class="shop-products-wrapper">
                <div class="tab-content">
                  <div id="grid-view" class="tab-pane">
                    <div class="shop-product-area">
                      <div class="row shoplistingdiv" >
						          @foreach($shoplist as $shoplistkey)
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt-30">
                          <!-- single-product-wrap start -->
                          <div class="single-shop-wrap single-product-wrap">
                            <div class="product-image">
                              <a href="{{url('/product_details/'.$shoplistkey->shop_id. '/' . $shoplistkey->product_id.'/'.$catid) }}">
                                <img src="{{ asset('/admin/images/'.$shoplistkey->shop_image) }}" alt=""/></a>
                                <!--  <span class="label-product label-new">new</span>
                                  <span class="label-product label-sale">-7%</span>
                                  <div class="quick_view">
                                    <a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter" ><i class="fa fa-search"></i></a>
                                  </div>-->
                            </div>
                           <div class="product-content">
                              <h3>
                                <a href="{{url('/product_details/'.$shoplistkey->shop_id. '/' . $shoplistkey->product_id.'/'.$catid) }}">{{$shoplistkey->shop_name}}</a>
                              </h3>
                              <!--<div class="price-box">
                                <span class="new-price">$51.27</span>
                                <span class="old-price">$54.49</span>
                              </div>
                              <div class="product-action">
                                <button class="add-to-cart" title="Add to cart">
                                  <i class="fa fa-plus"></i> Add to cart
                                </button>
                              </div>-->
                            </div>
                          </div>
                          <!-- single-product-wrap end -->
                        </div>
						            @endforeach
                      </div>
                      {!! $shoplist->render() !!}
                    </div>
                  </div>

                  <div id="list-view" class="tab-pane active">
                    <div class="row shoplistingdiv">
                      <div class="col">
					            @foreach($shoplist1 as $shoplistnew)
                        <div class="row product-layout-list">
                          <div class="col-lg-4 col-md-5">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                         
                              <div class="product-image">
                               @if($shoplistnew->shop_image!='')
                                <a href="{{url('/product_details/'.$shoplistnew->shop_id. '/' . $shoplistnew->id.'/'.$catid) }}">
                                  <img src="{{ asset('/admin/images/'.$shoplistnew->shop_image) }}" alt="" style="width:100%;height:100%;"/>
                                </a>
                                @else
                                  <a href="{{url('/product_details/'.$shoplistnew->shop_id. '/' . $shoplistnew->id.'/'.$catid) }}">
                                    <img src="{{ asset('/admin/images/dummy.png') }}" alt="" style="width:100%;height:100%;"/>
                                  </a>
                                @endif
                              </div>
                            </div>
                            <!-- single-product-wrap end -->
                          </div>

                          <div class="col-lg-8 col-md-7">
                            <div class="product_desc">
                              <!-- single-product-wrap start -->
                              <div class="product-content-list" id="productlisting_list">
                                <div class="ShopDetails">
                                    @php
                                        $n = $shoplistnew->rating;
                                        $whole = floor($n);      
                                        $fraction = $n - $whole; 
                                        $remaining = 5-$shoplistnew->rating;
                                    @endphp
                                    <h3>{{$shoplistnew->shop_name}}</h3>  
                                    @if($shoplistnew->rating > 0)
                                    <div style="display: flex;"> 
                                        {{number_format((float)$shoplistnew->rating, 1, '.', '')}}
                                        <ul class="product-rating d-flex">
                                            @for ($i = 1; $i <= $shoplistnew->rating; $i++)
                                                <li><span class="fa fa-star checked"></span></li>
                                            @endfor
                                            @if($fraction > .5) 
                                                <li><span class="fa fa-star checked"></span></li>
                                                @php $remaining = $remaining -1; @endphp
                                            @elseif($fraction <= .5 && $fraction>0) 
                                                <li>
                                                    <div class="star-container">
                                                      <span class="star star-under fa fa-star"></span>
                                                      <span class="star star-over fa fa-star"></span>
                                                    </div>
                                                </li>
                                                @php $remaining = $remaining -1; @endphp
                                            @endif
                                            @for($j=0;$j< $remaining; $j++)
                                                <li><span class="fa fa-star unchecked"></span></li>
                                            @endfor
                                        </ul>
                                        
                                        ({{$shoplistnew->count}})
                                    </div>
                                    @endif
                                    <div class="price-box">
                                      @if($shoplistnew->price==$shoplistnew->offer_price) 
                                      <span class="new-price1">{{$shoplistnew->offer_price}} AED</span>
                                      @else
                                      <span class="old-price1">{{$shoplistnew->price}} AED</span>
                                      <span class="new-price1">{{$shoplistnew->offer_price}} AED</span>
                                      @endif
                                      @php
                                        $dis=round(((($shoplistnew->price)-($shoplistnew->offer_price))/($shoplistnew->price))*100)              
                                      @endphp
                                      @if($shoplistnew->price!=$shoplistnew->offer_price) 
                                      <span class="discounts discount-percentage1">Save @php echo $dis;  @endphp  %</span>
                                      @endif
                                    </div>
                                    <small>{{$shoplistnew->shop_place}}</small>
                                    <small style="color:red;">@if($shoplistnew->stock<=0) NO STOCK </small>
                                    <small style="color:red;">@elseif($shoplistnew->stock<=5 && $shoplistnew->stock>=1) ONLY 5 COUNT LEFT @endif</small>
                                    <button class="btn product_details"  data-shop="{{$shoplistnew->shop_id}}" data-product="{{$shoplistnew->product_id}}" title="Add to cart">
                                      BUY HERE
                                    </button>
                                    <a href="{{url('/product_details/'.$shoplistnew->shop_id. '/' . $shoplistnew->product_id.'/'.$catid.'/'.$shoplistnew->color) }}">
                                      <button class="btn" title="Add to cart">
                                        VIEW MORE
                                      </button>
                                    </a>
                                </div>
                              </div>
                              <!-- single-product-wrap end -->
                            </div>
                          </div>
                        </div>
                      @endforeach
                      {!! $shoplist1->render() !!}
                      </div>
                    </div>
                  </div>

                  <!-- paginatoin-area start -->
                  <!-- <div class="paginatoin-area">
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <p>Showing 1-12 of 13 item(s)</p>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <ul class="pagination-box">
                          <li>
                            <a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                          </li>
                          <li class="active"><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li>
                            <a href="#" class="Next">
                              Next <i class="fa fa-chevron-right"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div> -->
                  <!-- paginatoin-area end -->
                </div>
              </div>
              <!-- shop-products-wrapper end -->
            </div>
          </div>
        </div>
    </div>
    <!-- content-wraper end -->

    <!-- Footer Aare Start -->

    <!-- Footer Aare End -->

    <!-- Modal Algemeen Uitgelicht end -->
    <div class="modal modaldetailview" tabindex="-1" role="dialog" id="modaldetailview">
      <div class="modal-dialog modal-lg" role="document" style="width:80%;max-width:unset;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Product Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body ">
              <div class="row single-product-area">
                  <div class="col-lg-6 col-md-6">
                      <div class="product-details-left">
                          <div class="lg-image">
                            <a href="#" class="img-poppu"></a>
                          </div>
                          <input type="hidden" id="shop_id" value="">
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <div class="product-details-view-content" id="product_description_id">
                          <div class="product-info">
                              <h2 id="product_name"></h2>
                              <div class="price-box">
                                  <span class="old-price"></span>
                                  <span class="new-price"></span>
                                  <span class="discount discount-percentage"></span>
                              </div>
                              <div id="out_of_stock" style="display:none;">
                                <h3>OUT OF STOCK</h3>
                              </div>
                              <p id="productdesc"></p>
                            
                              <div id="product-variants-container"></div>
                              <input type="hidden" value="popup" name="pagetype"  id="pagetype">
                              <input type="hidden" name="moqvalue"  id="moqvalue">
                              <input type="hidden" name="maxProductStock" id="maxProductStock">
                              <input type="hidden" name="shopproduct_id"  id="shopproduct_id">
                              <div class="single-add-to-cart">
                                  <form action="#" class="cart-quantity">
                                      <div class="quantity">
                                          <label>Quantity</label>
                                          <div class="cart-plus-minus">
                                              <input class="cart-plus-minus-box" value="1" id="amountvalue"  type="text">
                                          </div>
                                      </div>
                                      <button class="add-to-cart add-cart" type="submit">Add to cart</button>
                                      <p id="gotocart"></p>
                                  </form>
                              </div>
                              <div class="moqview"></div>
                              <div class="product-availability">
                                <div class="stock"></div>
                              </div>
                              <div class="product-social-sharing">
                                  <label>Share</label>
                                  <ul>
                                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                      <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div> 
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

<!-- Main Wrapper End -->

@endsection

<!-- JS

============================================ -->





