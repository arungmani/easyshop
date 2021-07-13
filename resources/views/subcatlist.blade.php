<!doctype html>@extends('layout.weblayout') @section('content')
@include('layout.webpartials.navbar')

<div class="breadcrumb-area bg-grey">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <ul class="breadcrumb-list">

                        <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>

                        <li class="breadcrumb-item active">{{$category->categoryname}}</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

	<!-- Header-area end -->





	<!-- category-container-slider Start -->

	<div class="category-container-area">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <!-- category-main-container start -->

                    <div class="category-main-container">                       



                        <!-- category-three-area start -->

                        <div class="category-three-area pt--20">

                            

                            <!-- category-wrapper-four start -->

                            <div class="category-wrapper-four">

   

							<style>

								.blog-image img{

									height:200px;

								}
								.btn{
									background: #000;
   									 color: #ffff;
								}

								

								</style>			

<div class="row">
											<div class="col-lg-12">
												<div class="prductSort">	<a href="#" class="btn active display" id="display_product" tabindex="0" data-id="1"><span>Display by Product</span></a>  <a href="#" id="display_shop" class="btn display" tabindex="0" data-id="2"><span>Display by Shop</span></a>
												</div>
											</div>
										</div>		

                    <div class="row">

                <div class="col-lg-12">

                    <!-- blog-wrapper start -->

                    <div class="blog-wrapper category-wrapper">

                        

                        <!-- blog-wrap start -->

                        <div class="row blog-wrap-col-3">

                        @foreach($subcat as $subcat)

                            <div class="col-lg-4 col-md-6">

                           

                                <!-- single-category-area start -->

                                <div class="single-blog-area single-category-area  mb--40">

                                    <div class="blog-image category-image">

                                    <a href="{{url('/productlist/'.$subcat->id) }}"><img src="{{ asset('/admin/images/'.$subcat->image) }}" class="rounded" width="600" height="400" alt=""></a>

                                    </div>

                                    <div class="blog-contend category-contend">

                                        <h3><a href="{{url('/productlist/'.$subcat->id) }}">{{$subcat->categoryname}}</a></h3>

                                    </div>

                                </div>

                                <!-- single-category-area end -->

                            </div>

                            

                            @endforeach

                          

                        </div>

                        <!-- category-wrap end -->

                        

                    </div>

                    <!-- blog-wrapper end -->

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