<div class="header-bottom-area header-sticky">

<div class="container">

    <div class="row">

        <div class="col-lg-2 col-4">

            <!-- logo start -->

            <div class="logo">

                <a href="{{ url('index') }}">

                    <img src="{{asset('web/assets/images/logo/1.svg')}}" alt="">

                </a>

            </div>

            <!-- logo end -->

        </div>

        <div class="col-lg-7 d-none d-lg-block">

            <!-- main-menu-area start -->

            <div class="main-menu-area">

                <nav class="main-navigation">

                    <ul>

                        <li class="active"><a href="{{url('index')}}">Home</a>

                        </li>

                        <li><a href="{{url('shopregitser')}}">Shop Sign up</a>

                        </li>

                        <li><a href="#">About us</a>

                        </li>

                        <li><a href="#">Contact</a>

                        </li>

                    </ul>

                </nav>

            </div>

            <!-- main-menu-area start -->

        </div>

        <div class="col-lg-3 col-8">

            <div class="header-bottom-right">

                <div class="block-search">

                    <div class="trigger-search"><i class="fa fa-search"></i>  <span>Search</span>

                    </div>

                    <div class="search-box main-search-active">

                        <form action="#" class="search-box-inner">

                            <input type="text" placeholder="Search our catalog">

                            <button class="search-btn" type="submit"><i class="fa fa-search"></i>

                            </button>

                        </form>

                    </div>

                </div>

                <div class="shoping-cart">

                    <div class="btn-group">

                        <!-- Mini Cart Button start -->

                        <button class="dropdown-toggle cartview"><i class="fa fa-shopping-cart"></i> Cart (<span id="cartTotal">0</span>)</button>

                        <!-- Mini Cart button end -->

                        <!-- Mini Cart wrap start -->

                        <div class="dropdown-menu mini-cart-wrap">

                            <div class="shopping-cart-content">

                            <form method="POST" action="{{url('addtocartnext')}}" enctype="multipart/form-data">@csrf

                                <ul class="mini-cart-content">

                                    <!-- Mini-Cart-item start -->

                                    <li id="cart-items">

                                    

                                

                                    </li>

                                    <!-- Mini-Cart-item end -->

                                    <li>

                                        <!-- shopping-cart-total start -->

                                        <div class="shopping-cart-total">

                                            

                                            <h4  > Grand Total : <span id="grand-total">₹0</span></h4>

                                            <input type="hidden" name="gtotal" id="amounttol">

                                            

                                        </div>

                                        <!-- shopping-cart-total end -->

                                    </li>

                                    <li>

                                        <!-- shopping-cart-btn start -->

                                        <div class="shopping-cart-btn"> <button type="submit" class="btn btn-sm btn-danger" style="color:red;">Checkout</button>

                                        

                                        </div>

                                        <!-- shopping-cart-btn end -->

                                    </li>

                                </ul>

                                </form>

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


<div class="modal" tabindex="-1" role="dialog" id="itemviewmodal">
<div class="modal-dialog" role="document" >
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Order ID=<span id="orderid"></span></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                            <th>Item Name</th>
                                            <th>Price </th>
                                            <th>Qty</th>
                                                          
                                        </tr>
                                    </thead>
                                    <tbody id="customerorderlist">
                                
                                    </tbody>
                                    </table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary">Save changes</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="moqnotificationmodal">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">MOQ Notification</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<p id="moqnotif"></p>
</div>
<div class="modal-footer">
<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="stocknotificationmodal">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Stock Notification</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<p id="stocknotif"></p>
</div>
<div class="modal-footer">
<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="cartsuccess">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Added Successfully</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<p id="">Product added to cart</p>
</div>
<div class="modal-footer">
<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="cartalreadyadded">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Item already added in to  cart</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<p id="">Item already added in to  cart</p>
</div>
<div class="modal-footer">
<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>