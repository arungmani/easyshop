 <!-- breadcrumb-area start -->
 @extends('layout.weblayout') @section('content')

 @include('layout.webpartials.navbar')
 <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Error 404</li>
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
                       
                        <p class="home-link" style="color:red;">There was an error understanding the request</p>
                       
                        <a href="{{url('userlogin')}}" class="home-bacck-button">Okey</a>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection