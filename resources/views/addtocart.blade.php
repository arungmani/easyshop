@extends('layout.weblayout') 



@section('content')




<style>

#table_itm{

    margin-top: 78px;

}

.cartmainhead{

    margin-bottom:10px;

}

</style>

    

    

    <div class="breadcrumb-area bg-grey">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <ul class="breadcrumb-list">

                        <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>

                        <li class="breadcrumb-item active">Cart</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!-- breadcrumb-area end -->

    

    <form method="post" id="form" action="{{ route('checkout') }}" enctype="multipart/form-data">

                                @csrf

    <!-- content-wraper start -->

    <div class="content-wraper">

        <div class="container cartmainhead">

            <div class="row">

                <div class="col-12">

                  

                        <div class="table-content table-responsive">

                            <table class="table table-hover" id="table_itm">

                                <thead>

                                    <tr>

                                        <th class="plantmore-product-thumbnail">Images</th>

                                        <th class="cart-product-name">Product</th>

                                        <th class="plantmore-product-price">Unit Price</th>

                                        <th class="plantmore-product-quantity">Quantity</th>

                                        <th class="plantmore-product-subtotal">Total</th>

                                        <th class="plantmore-product-remove">Remove</th>

                                    </tr>

                                </thead>

                                <tbody>

                                @foreach($producttrans as $producttrans)

                                @php

                                $prodelid=DB::table('shop_products')

                                ->leftJoin('products', 'shop_products.product_id', '=', 'products.id')

                                ->where('shop_products.id',$producttrans['productid'])

                                ->select('shop_products.*','products.product_name','products.image')

                                ->first();

                                 @endphp

                                    <tr id="row_{{$producttrans['productid']}}">

                                        <td class="plantmore-product-thumbnail"><a href="#"><img src="{{ asset('/admin/images/'.$prodelid->single_image) }}" width="100" alt=""></a></td>

                                        <td class="plantmore-product-name"><input type="hidden" name="product[]" value="{{$producttrans['productid']}}"><a href="{{url('/product_details/'.$producttrans['shop']. '/' .$producttrans['proid'].'/'.$producttrans['catid'].'/'.$producttrans['colorid']) }}">{{$prodelid->product_name}}</a></td>

                                        <td class="plantmore-product-price"><input type="hidden" id="pprice" value="{{$prodelid->offer_price}}"><span class="amount">{{$prodelid->offer_price}} AED</span></td>

                                        <td class="plantmore-product-quantity">

                                        <input value="{{$producttrans['pqty']}}" id="pqty_{{$producttrans['productid']}}" name="qty[]" data-price="{{$prodelid->offer_price}}" data-productid="{{$producttrans['productid']}}" class="plusminus" min="1" max="1000" type="number" >
                                        
                                        <input type="hidden" id="moq_{{$producttrans['productid']}}" name="moq[]" value="{{$producttrans['moq']}}">
     

                                        </td>

                                        

                                        <td class="product-subtotal"><input type="hidden" class="expenses" id="subtol_{{$producttrans['productid']}}" value="{{$producttrans['pqty'] * $prodelid->offer_price}}"><span class="amount" id="subtotal_price_{{$producttrans['productid']}}">{{$producttrans['pqty'] * $prodelid->offer_price}} AED</span></td>

                                        <td class="plantmore-product-remove"><a href="#"><i class="fa fa-close removecart"  data-id="{{$producttrans['productid']}}"></i></a></td>

                                    </tr>

                                 @endforeach 

                                   

                                </tbody>

                            </table>

                        </div>

                        <div class="row">

                            <!-- <div class="col-md-8">

                                <div class="coupon-all">

                                   

                                   <div class="coupon2">

                                        <input class="submit btn" name="update_cart" value="Update cart" type="submit">

                                        <a href="shop.html" class="btn continue-btn">Continue Shopping</a>

                                    </div>

                                   

                                    <div class="coupon">

                                        <h3>Coupon</h3>

                                        <p>Enter your coupon code if you have one.</p>

                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">

                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">

                                    </div>

                                </div>

                            </div> -->

                            <div class="col-md-4 ml-auto">

                                <div class="cart-page-total">

                                    <h2>Cart totals</h2>

                                    <ul>

                                        <li>Subtotal <input type="hidden" name="grandtotal" id="subfinaltotal" value="{{$producttrans['pqty'] * $prodelid->offer_price}}"><span id="finalsubtotal">{{$producttrans['pqty'] * $prodelid->offer_price}} AED</span></li>

                                        <li>Total <span id="grandfinaltol">{{$producttrans['pqty'] * $prodelid->offer_price}} AED</span></li>

                                    </ul>

                                   

                                    <button type="submit" class="proceed-checkout-btn">Proceed to checkout</button>

                                </div>

                            </div>

                        </div>

                   

                </div>

            </div>

        </div>

    </div>

    </form>

@endsection