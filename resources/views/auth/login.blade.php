<!doctype html>@extends('layout.weblayout') @section('content')

@include('layout.webpartials.navbar')


<style>
  .required:after {
    content:" *";
    color: red;
  }
</style>



    <!-- Header-area end -->
    
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
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
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> login </h4>
                            </a>
                            <a data-toggle="tab" href="#lg2">
                                <h4> register </h4>
                                <!-- <a href="#" data-toggle="tooltip" title="Hooray!">Hover over me</a><br> -->
                            </a>
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                                            <div class="login-input-box">
											<input type="hidden" name="status" value="1">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your username">
                                                @if(session()->has('message'))
                                               <p style="color:red;"> {{ session()->get('message') }}</p>
                                               @endif
                                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                               
                               
                               
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                    <form method="POST" action="{{ route('cusregister') }}" name="myForm" onsubmit="return validateForm()">
                        @csrf
                                            <div class="login-input-box">
											<div class="row">
											<div class="col-sm-6">
											<label class="required">First Name:</label>
											<input type="text" id="firsnameinput" class="form-control" name="user_name"  >
											</div>
											<div class="col-sm-6">
											<label class="required">Last Name:</label>
											<input type="text"  class="form-control"  id="lastnameinput" name="lastname"  >
											</div>
											<div class="col-sm-12">
											<label class="required">Email:</label>
											<input name="user_email"  class="form-control" id="useremailinput" type="email" >
											</div>
											<div class="col-sm-12">
											<label class="required">DOB:</label>
											<input type="date" name="dob" id="userdob" class="form-control" >
											</div>
											<div class="col-sm-12">
											<label class="required">Address:</label>
											<textarea class="form-control" id="useraddress" name="address" class="form-control" ></textarea>
											</div>
											<div class="col-sm-12">
											<label class="required">phone Number:</label>
											<input type="text"  class="form-control" id="userphonenumber" name="phnumber"  maxlength="10">
											</div>
												<div class="col-sm-12">
											<label class="required">Password :</label>
											  <input type="password" name="old-password"  id="old-passinput" class="form-control" >
                                                
											</div>
												<div class="col-sm-12">
											<label class="required">Confirm Password :</label>
											 <input type="password" name="user_password" id="cnpassword" class="form-control" >
											</div>
											</div>
											
                                                <input name="role" value="4" type="hidden">
                                            </div>
                                            <div class="button-box">
                                                <button class="register-btn btn" name="submit" type="submit"><span>Register</span></button>
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