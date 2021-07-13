<style>

.prductSort a.btn.active{

	background: #dc3545;

    color: #ffffff;

}

</style>

<div class="main-wrapper">

	<!-- header-area start -->

	<div class="header-area">

		<!-- header-top start -->

		<div class="header-top bg-grey">

			<div class="container">

				<div class="row">

					<div class="col-lg-8 order-2 order-lg-1">

						<div class="top-left-wrap">

							<ul class="phone-email-wrap">

								<li><i class="fa fa-phone swalDefaultSuccess"></i> (08)123 456 7890</li>

								<li class="testalert"><i class="fa fa-envelope-open-o"></i> yourmail@domain.com</li>

							</ul>

							<ul class="link-top">

								<li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a>

								</li>

								<li><a href="#" title="Rss"><i class="fa fa-rss"></i></a>

								</li>

								<li><a href="#" title="Google"><i class="fa fa-google-plus"></i></a>

								</li>

								<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>

								</li>

								<li><a href="#" title="Youtube"><i class="fa fa-youtube"></i></a>

								</li>

								<li><a href="#" title="Instagram"><i class="fa fa-instagram"></i></a>

								</li>

							</ul>

						</div>

					</div>

					<div class="col-lg-4 order-1 order-lg-2">

						<div class="top-selector-wrapper">

							<ul class="single-top-selector">

								<!-- Currency Start -->

								<!-- <li class="currency list-inline-item">

									<div class="btn-group">

										<button class="dropdown-toggle">USD $ <i class="fa fa-angle-down"></i>

										</button>

										<div class="dropdown-menu">

											<ul>

												<li><a href="#">Euro €</a>

												</li>

												<li><a href="#" class="current">USD $</a>

												</li>

											</ul>

										</div>

									</div>

								</li> -->

								<!-- Currency End -->

								<!-- Language Start -->
<!-- 
								<li class="language list-inline-item">

									<div class="btn-group">

										<button class="dropdown-toggle">

											<img src="{{asset('web/assets/images/icon/la-1.jpg')}}" alt="">English <i class="fa fa-angle-down"></i>

										</button>

										<div class="dropdown-menu">

											<ul>

												<li>

													<a href="#">

														<img src="{{asset('web/assets/images/icon/la-1.jpg')}}" alt="">English</a>

												</li>

												<li>

													<a href="#">

														<img src="{{asset('web/assets/images/icon/la-2.jpg')}}" alt="">Français</a>

												</li>

											</ul>

										</div>

									</div>

								</li> -->

								<!-- Language End -->

								<!-- Sanguage Start -->

								<li class="setting-top list-inline-item">

									<div class="btn-group">

										<button class="dropdown-toggle"><i class="fa fa-user-circle-o"></i>@if($id!=0) @php $user=DB::table('customers')->where('cus_loginid',$id)->value('first_name');  @endphp {{$user}} @endif  <i class="fa fa-angle-down"></i>

										</button>

										<div class="dropdown-menu">

										

											<ul>

											@if($id!=0)

												<li><a href="{{url('myaccount')}}">My account</a>

												</li>

												

												<li><a href="{{url('logout')}}">Sign Out</a>

												</li>

												@else

												

												<li><a href="{{url('userlogin')}}">Sign In</a>

												</li>

												@endif

											</ul>

										</div>

									</div>

								</li>

								<!-- Sanguage End -->

							</ul>

						</div>

					</div>

				</div>

			</div>

		</div>

		<!-- Header-top end -->

		<!-- Header-bottom start -->

	
   