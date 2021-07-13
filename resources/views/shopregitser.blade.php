@extends('layout.weblayout') @section('content')
@include('layout.webpartials.navbar')
 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Login Register</li>
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
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <!-- login-register-tab-list start -->
                        <div class="login-register-tab-list nav">
                            <!-- <a class="active" data-toggle="tab" href="#lg1">
                                <h4> login </h4>
                            </a> -->
                            <a class="active" data-toggle="tab" href="#lg2">
                                <h4> register </h4>
                            </a>
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content">
                            <!-- <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="#" method="post">
                                            <div class="login-input-box">
                                                <input type="text" name="user-name" placeholder="User Name">
                                                <input type="password" name="user-password" placeholder="Password">
                                            </div>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox">
                                                    <label>Remember me</label>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <div class="button-box">
                                                    <button class="login-btn btn" type="submit"><span>Login</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <div id="lg2" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                    <p class="home-link" style="color:red;">{{$message}}</p>
                                        <form  method="post" action="{{url('shopadd')}}" enctype="multipart/form-data">
                                          @csrf
                                            <div class="login-input-box">
                                               <input type="text" name="shop_name" placeholder="Name" required>
                                                <input type="text" name="shop_uname" placeholder="User Name" required>
                                                <input name="shop_email" placeholder="Email" type="email" required>
                                                <input type="text" name="shop_phonenum" placeholder="phonenumber" maxlength="10" required>
                                                <input type="text" name="shop_place" placeholder="Place" required>
                                                <!-- <input type="text" name="shop_Latittude" placeholder="Latitude">
                                                <input type="text" name="shop_Longitude" placeholder="Longitude"> -->
                                                <textarea name="shop_address" class="form-control" placeholder="Address" rows="4" cols="8" required></textarea>
                                                <br><input type="password"  name="shop_password"  id="shop_password" placeholder="Password" required>
                                                <br><input type="password"  name="shop_cpassword"  id="shop_cpassword" placeholder="Confirm Password" required>
                                                <div class="registrationFormAlert" id="divCheckPasswordMatch">
                                                </div>
                                            </div>
                                            <div class="button-box">
                                                <button class="register-btn btn" type="submit"><span>Register</span></button>
                                            </div>
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
    <!-- content-wraper end -->
@endsection