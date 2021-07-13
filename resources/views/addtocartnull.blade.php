@extends('layout.weblayout') 

@section('content')

@include('layout.webpartials.navbar')





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

                         

                        </div>

                   

                </div>

            </div>

        </div>

    </div>

  

@endsection