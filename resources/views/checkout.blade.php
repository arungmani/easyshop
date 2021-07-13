@extends('layout.weblayout') 

@section('content')



<div class="breadcrumb-area bg-grey">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <ul class="breadcrumb-list">

                        <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>

                        <li class="breadcrumb-item active">Checkout Page</li>

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

                <div class="col">

                    <div class="coupon-area">

                        <!-- coupon-accordion start -->

                        <!-- <div class="coupon-accordion">

                            <h3>Returning customer? <span class="coupon" id="showlogin">Click here to login</span></h3>

                            <div class="coupon-content" id="checkout-login">

                                <div class="coupon-info">

                                    <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>

                                    <form action="#"> 

                                        <p class="coupon-input form-row-first">

                                            <label>Username or email <span class="required">*</span></label>

                                            <input type="text" name="email">

                                        </p>

                                        <p class="coupon-input form-row-last">

                                            <label>password <span class="required">*</span></label>

                                            <input type="password" name="password">

                                        </p>

                                       <div class="clear"></div>

                                        <p>

                                            <button type="submit" class="button-login btn" name="login" value="Login">Login</button>

                                            <label class="remember"><input type="checkbox" value="1"><span>Remember</span></label>

                                        </p>

                                        <p class="lost-password">

                                            <a href="#">Lost your password?</a>

                                        </p>

                                    </form>

                                </div>

                            </div>

                        </div> -->

                        <!-- coupon-accordion end -->

                        <!-- coupon-accordion start -->

                        <div class="coupon-accordion">

                            <h3>Have a coupon? <span class="coupon" id="showcoupon">Click here to enter your code</span></h3>

                            <div class="coupon-content" id="checkout-coupon">

                                <div class="coupon-info">

                                    <form action="#"> 

                                        <p class="checkout-coupon">

                                            <input type="text" placeholder="Coupon code">

                                            <button type="submit" class="btn button-apply-coupon" name="apply_coupon" value="Apply coupon">Apply coupon</button>

                                        </p>

                                    </form>

                                </div>

                            </div>

                        </div>

                        <!-- coupon-accordion end -->

                    </div>

                </div>

            </div>

          @php

        $sh_del=DB::table('tbl_shipping_details')

        ->where('customer_id',$user)

        ->first();

          @endphp

            <!-- checkout-details-wrapper start -->

            <div class="checkout-details-wrapper">

                <div class="row">

                    <div class="col-lg-6 col-md-6">

                        <!-- billing-details-wrap start -->

                        <div class="billing-details-wrap">

                            <form action="#">

                                <h3 class="shoping-checkboxt-title">Shipping Details</h3>

                                <div class="row">

                                    <div class="col-lg-12">

                                        <p class="single-form-row">

                                            <label id="shnamerequired">Name<span class="required" >*</span></label>

                                            <input type="text" name="First name" id="shname" @if($sh_del!=null) value="{{$sh_del->name}}" @else  @endif>

                                        </p>

                                    </div>

                                   

                                  

                                    <div class="col-lg-12">

                                        <div class="single-form-row">

                                            <label>Country <span class="required">*</span></label>

                                            <div class="nice-select wide">

                                                <select id="shcountry">

                                                @foreach($countries as $countries)

                                                    <option value="{{$countries->id}}" >{{$countries->contryname}}</option>

                                                    @endforeach

                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-12">

                                        <p class="single-form-row">

                                            <label>Street address <span class="required">*</span></label>

                                            <input type="text"  id="shadd" @if($sh_del!=null) value="{{$sh_del->street_address}}" @else placeholder="House number and street name" @endif  name="address">

                                        </p>

                                    </div>

                                    <div class="col-lg-12">

                                        <p class="single-form-row">

                                            <input type="text" id="shapart" @if($sh_del!=null) value="{{$sh_del->apartment}}" @else placeholder="Apartment, suite, unit etc. (optional)"  @endif name="address">

                                        </p>

                                    </div>

                                    <div class="col-lg-12">

                                        <p class="single-form-row">

                                            <label>Town / City <span class="required">*</span></label>

                                            <input type="text" id="shcity" @if($sh_del!=null) value="{{$sh_del->city}}" @else  @endif name="address">

                                        </p>

                                    </div>

                                    <div class="col-lg-12">

                                        <p class="single-form-row">

                                            <label>State / County <span class="required">*</span></label>

                                            <input type="text" id="shstate"  @if($sh_del!=null) value="{{$sh_del->state}}" @else  @endif name="address">

                                        </p>

                                    </div>

                                    <div class="col-lg-12">

                                        <p class="single-form-row">

                                            <label>Postcode / ZIP <span class="required">*</span></label>

                                            <input type="text" id="shpincode" @if($sh_del!=null) value="{{$sh_del->pincode}}" @else  @endif name="address">

                                        </p>

                                    </div>

                                    <div class="col-lg-12">

                                        <p class="single-form-row">

                                            <label>Phone <span class="required">*</span></label>

                                            <input type="text" id="shphone" @if($sh_del!=null) value="{{$sh_del->phone_number}}" @else  @endif name="address" >

                                        </p>

                                    </div>

                                    

                                   

                                    <!-- <div class="col-lg-12">

                                        <div class="checkout-box-wrap">

                                           <label id="chekout-box-2"><input type="checkbox"> Ship to a different address?</label>

                                           <div class="ship-box-info">

                                                <div class="row">

                                                    <div class="col-lg-6">

                                                        <p class="single-form-row">

                                                            <label>First name <span class="required">*</span></label>

                                                            <input type="text" name="First name">

                                                        </p>

                                                    </div>

                                                    <div class="col-lg-6">

                                                        <p class="single-form-row">

                                                            <label>Username or email <span class="required">*</span></label>

                                                            <input type="text" name="Last name ">

                                                        </p>

                                                    </div>

                                                    <div class="col-lg-12">

                                                        <p class="single-form-row">

                                                            <label>Company name</label>

                                                            <input type="text" name="email">

                                                        </p>

                                                    </div>

                                                    <div class="col-lg-12">

                                                        <div class="single-form-row">

                                                            <label>Country <span class="required">*</span></label>

                                                            <div class="nice-select wide">

                                                                <select>

                                                                    <option>Select Country...</option>

                                                                    <option>Albania</option>

                                                                    <option>Angola</option>

                                                                    <option>Argentina</option>

                                                                    <option>Austria</option>

                                                                    <option>Azerbaijan</option>

                                                                    <option>Bangladesh</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-12">

                                                        <p class="single-form-row">

                                                            <label>Street address <span class="required">*</span></label>

                                                            <input type="text" placeholder="House number and street name" name="address">

                                                        </p>

                                                    </div>

                                                    <div class="col-lg-12">

                                                        <p class="single-form-row">

                                                            <input type="text" placeholder="Apartment, suite, unit etc. (optional)" name="address">

                                                        </p>

                                                    </div>

                                                    <div class="col-lg-12">

                                                        <p class="single-form-row">

                                                            <label>Town / City <span class="required">*</span></label>

                                                            <input type="text" name="address">

                                                        </p>

                                                    </div>

                                                    <div class="col-lg-12">

                                                        <p class="single-form-row">

                                                            <label>State / County</label>

                                                            <input type="text" name="address">

                                                        </p>

                                                    </div>

                                                    <div class="col-lg-12">

                                                        <p class="single-form-row">

                                                            <label>Postcode / ZIP <span class="required">*</span></label>

                                                            <input type="text" name="address">

                                                        </p>

                                                    </div>   

                                                </div>

                                           </div>

                                        </div>

                                    </div> -->

                                    <!-- <div class="col-lg-12">

                                        <p class="single-form-row m-0">

                                            <label>Order notes</label>

                                            <textarea placeholder="Notes about your order, e.g. special notes for delivery." class="checkout-mess" rows="2" cols="5"></textarea>

                                        </p>

                                    </div> -->

                                </div>

                            </form>

                        </div>

                        <!-- billing-details-wrap end -->

                    </div>

                    <div class="col-lg-6 col-md-6">

                        <!-- your-order-wrapper start -->

                        <div class="your-order-wrapper">

                            <h3 class="shoping-checkboxt-title">Your Order</h3>

                            <!-- your-order-wrap start-->

                            <div class="your-order-wrap">

                                <!-- your-order-table start -->

                                <div class="your-order-table table-responsive">

                                    <table>

                                        <thead>

                                            <tr>

                                                <th class="product-name">Product</th>

                                                <th class="product-total">Total</th>

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

                                            <tr class="cart_item">

                                                <td class="product-name"><input type="hidden" class="ProductID" name="productid" value="{{$producttrans['productid']}}">

                                                <input type="hidden" class="product_qty" name="productqty" value="{{$producttrans['pqty']}}">
                                               
                                                    {{$prodelid->product_name}} <strong class="product-quantity"> × {{$producttrans['pqty']}}</strong>

                                                </td>

                                                <td class="product-total">

                                                    <span class="amount">{{$prodelid->offer_price}} AED</span>

                                                </td>

                                            </tr>

                                          @endforeach

                                        </tbody>

                                        <tfoot>

                                            <tr class="cart-subtotal">

                                                <th>Cart Subtotal</th>

                                                <td><span class="amount">{{$total}} AED</span></td>

                                            </tr>

                                            <tr class="shipping">

                                                <th>Shipping</th>

                                                <td>

                                                    <ul>

                                                    <li>

                                                            

                                                            <label>Free Shipping:</label>

                                                        </li>

                                                       

                                                        <li></li>

                                                    </ul>

                                                </td>

                                            </tr>

                                            <tr class="order-total">

                                                <th>Order Total</th>

                                                <td><strong><span class="amount">{{$total}} AED</span></strong>

                                                </td>

                                            </tr>								

                                        </tfoot>

                                    </table>

                                </div>

                                <!-- your-order-table end -->

                                

                                <!-- your-order-wrap end -->

                                <div class="payment-method">

                                    <div class="payment-accordion">

                                        <!-- ACCORDION START -->

                                        <h3>Direct Bank Transfer</h3>

                                        <div class="payment-content">

                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>

                                        </div>

                                        <!-- ACCORDION END -->	

                                        <!-- ACCORDION START -->

                                        <h3>Cheque Payment</h3>

                                        <div class="payment-content">

                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>

                                        </div>

                                        <h3>COD</h3>

                                        <div class="payment-content">

                                           <input type="radio" name="paymentmethod" value="1" id="paymethod"> Cash On Delivery

                                        </div>

                                        <!-- ACCORDION END -->	

                                        <!-- ACCORDION START -->

                                        <h3>PayPal </h3>

                                        <div class="payment-content">

                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>

                                        </div>

                                        <!-- ACCORDION END -->									

                                    </div>

                                    <div class="order-button-payment">

                                        <input type="submit" value="Place order" class="place-order" />

                                    </div>

                                </div>

                                <!-- your-order-wrapper start -->

                                

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- checkout-details-wrapper end -->

        </div>

    </div>



@endsection