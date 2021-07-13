 <!-- breadcrumb-area start -->
 @extends('layout.weblayout') @section('content')

 @include('layout.webpartials.navbar')
 <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Email Verification</li>
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
                <div class="col-lg-8 ml-auto mr-auto text-center">
                    <div class="search-error-wrapper">
                       
                        <p class="home-link" style="color:red;">{{$message}}</p>
                        <form action="#" class="error-form">
                            <div class="error-form-input">
                                <input type="text" placeholder="Search..." class="error-input-text">
                                <button type="submit" class="error-s-button"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                        <a href="{{url('userlogin')}}" class="home-bacck-button">Back to Login</a>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection