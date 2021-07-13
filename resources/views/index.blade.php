<!doctype html>@extends('layout.weblayout')
 @section('content')
 @include('layout.webpartials.navbar')
<!-- Main Wrapper Start -->
<!-- Header-area end -->
	<div class="ad-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">@foreach($banner as $banner)
					<img src="{{ asset('/admin/images/'.$banner->banner_image) }}" alt="" />@endforeach</div>
			</div>
		</div>
	</div>
	<!-- category-container-slider Start -->
	<div class="category-container-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- category-main-container start -->
					<div class="category-main-container">
						<!-- category-three-area start -->
						<div class="category-three-area pt--20">
							<div class="row">
								<div class="col">
									<div class="section-titele-four">
										<div class="section-titele-four-inner">
											<h2>&nbsp;</h2>
											<div class="tabs-categorys-list-two">
												<ul class="nav" role="tablist">
													<li class="nav-item active"><a class="active" href="#brandnew" role="tab" data-toggle="tab">Brand New</a>
													</li>
													<li class="nav-item"><a href="#used" role="tab" data-toggle="tab">Used </a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<style>
								.blog-image img{
									height:200px;
								}

								</style>
							<!-- category-wrapper-four start -->
							<div class="category-wrapper-four">
								<div class="tab-content">
									<div class="tab-pane active" id="brandnew">
										
										<div class="row">
											<div class="col-lg-12">
												<!-- blog-wrapper start -->
												<div class="blog-wrapper category-wrapper">
													<!-- blog-wrap start -->
													<div class="row blog-wrap-col-3">@foreach($brandnew as $catItem)
														<div class="col-lg-4 col-md-6">
															<!-- single-category-area start -->
															<div class="single-blog-area single-category-area  mb--40">
																<div class="blog-image category-image"> <a href="{{url('/subcatlist/'.$catItem->id) }}">
																<img src="{{ asset('/admin/images/'.$catItem->image) }}" class="rounded" width="600" height="400"  alt=""></a>
																</div>
                                                                <form method="POST" action="{{url('categoryinsert')}}" enctype="multipart/form-data">@csrf
																<div class="blog-contend category-contend">
																	<h3><a href="{{url('/subcatlist/'.$catItem->id) }}">{{$catItem->categoryname}}</a></h3>
																</div>
															</div>
															<!-- single-category-area end -->
														</div>@endforeach</div>
													<!-- category-wrap end -->
												</div>
												<!-- blog-wrapper end -->
											</div>
										</div>
									</div>
									<div class="tab-pane" id="used">
										<div class="row">
											<div class="col-lg-12">
												<div class="prductSort">	<a href="#" class="btn active" tabindex="0"><span>Display by Product</span></a>  <a href="#" class="btn" tabindex="0"><span>Display by Shop</span></a>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<!-- blog-wrapper start -->
												<div class="blog-wrapper category-wrapper">
													<!-- blog-wrap start -->
													<div class="row blog-wrap-col-3">@foreach($used as $usedCat)
														<div class="col-lg-4 col-md-6">
															<!-- single-blog-area start -->
															<div class="single-blog-area single-category-area  mb--40">
																<div class="blog-image category-image"> <a href="{{url('/subcatlist/'.$usedCat->id) }}"><img src="{{ asset('/admin/images/'.$usedCat->image) }}" alt=""></a>
																</div>
																<div class="blog-contend category-contend">
																	<h3><a href="{{url('/subcatlist/'.$usedCat->id) }}">{{$usedCat->categoryname}}</a></h3>
																</div>
															</div>
															<!-- single-blog-area end -->
														</div>@endforeach</div>
													<!-- blog-wrap end -->
												</div>
												<!-- blog-wrapper end -->
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- product-wrapper-four end -->
						</div>
						<!-- product-three-area end -->
					</div>
					<!-- category-main-container end -->
				</div>
			</div>
		</div>
	</div>
	<!-- category-container-slider Start -->
	<!-- Footer Aare Start -->
	<!-- Footer Aare End -->
	<!-- Modal Algemeen Uitgelicht start -->
	<div class="modal fade modal-wrapper" id="exampleModalCenter">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
					</button>
					<div class="modal-inner-area row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<!-- Product Details Left -->
							<div class="product-details-left">
								<div class="product-details-images slider-navigation-1">
									<div class="lg-image">
										<img src="{{asset('web/assets/images/product/1.jpg')}}" alt="product image">
									</div>
									<div class="lg-image">
										<img src="{{asset('web/assets/images/product/2.jpg')}}" alt="product image">
									</div>
									<div class="lg-image">
										<img src="{{asset('web/assets/images/product/3.jpg')}}" alt="product image">
									</div>
									<div class="lg-image">
										<img src="{{asset('web/assets/images/product/5.jpg')}}" alt="product image">
									</div>
								</div>
								<div class="product-details-thumbs slider-thumbs-1">
									<div class="sm-image">
										<img src="{{asset('web/assets/images/product/1.jpg')}}" alt="product image thumb">
									</div>
									<div class="sm-image">
										<img src="{{asset('web/assets/images/product/2.jpg')}}" alt="product image thumb">
									</div>
									<div class="sm-image">
										<img src="{{asset('web/assets/images/product/3.jpg')}}" alt="product image thumb">
									</div>
									<div class="sm-image">
										<img src="{{asset('web/assets/images/product/4.jpg')}}" alt="product image thumb">
									</div>
								</div>
							</div>
							<!--// Product Details Left -->
						</div>
						<div class="col-lg-7 col-md-6 col-sm-6">
							<div class="product-details-view-content">
								<div class="product-info">
									<h2>Healthy Melt</h2>
									<div class="price-box"> <span class="old-price">$70.00</span>
										<span class="new-price">$76.00</span>
										<span class="discount discount-percentage">Save 5%</span>
									</div>
									<p>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.</p>
									<div class="product-variants">
										<div class="produt-variants-size">
											<label>Size</label>
											<select class="form-control-select">
												<option value="1" title="S" selected="selected">S</option>
												<option value="2" title="M">M</option>
												<option value="3" title="L">L</option>
											</select>
										</div>
										<div class="produt-variants-color">
											<label>Color</label>
											<ul class="color-list">
												<li>
													<a href="#" class="orange-color active"></a>
												</li>
												<li>
													<a href="#" class="paste-color"></a>
												</li>
											</ul>
										</div>
									</div>
									<div class="single-add-to-cart">
										<form action="#" class="cart-quantity">
											<div class="quantity">
												<label>Quantity</label>
												<div class="cart-plus-minus">
													<input class="cart-plus-minus-box" value="1" type="text">
													<div class="dec qtybutton"><i class="fa fa-angle-down"></i>
													</div>
													<div class="inc qtybutton"><i class="fa fa-angle-up"></i>
													</div>
												</div>
											</div>
											<button class="add-to-cart" type="submit">Add to cart</button>
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
	<!-- Modal Algemeen Uitgelicht end -->
</div>
<!-- Main Wrapper End -->@endsection
<!-- JS
============================================ -->