@extends('layout.mainlayout') @section('content')

<div class="content-wrapper">

	<!-- Content Header (Page header) -->

	<section class="content-header">

		<div class="container-fluid">

			<div class="row mb-2">

				<div class="col-sm-6"></div>

				<div class="col-sm-6">

					<ol class="breadcrumb float-sm-right">

						<li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a>

						</li>

						<li class="breadcrumb-item active">Shops</li>

					</ol>

				</div>

				

			</div>

		</div>

		<!-- /.container-fluid -->

	</section>@if(session('success'))

	<h3 style="margin-left: 19px;color: green;">{{session('success')}}</h3>

	@endif

	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<div class="row">

				<div class="col-12">

					<!-- /.card -->

					<div class="card">

						<div class="card-header">

							<h3 class="card-title">Shop</h3>

							<p align="right">

								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Add Shops</button>

								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

								<form method="POST" action="{{url('shopinsert')}}" enctype="multipart/form-data" name="shop_form" onSubmit="return shop_form_vald();">

@csrf

 <div class="modal-dialog modal-xl" role="document" style="width:100%;">

<div class="modal-content">

<div class="modal-header">

<h4 class="modal-title" id="exampleModalLabel">Add Shops</h4>

<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>

</button>

</div>

<div class="modal-body row">

<input type="hidden" name="cate" class="form-control" id="shopid">



  <div class="form-group col-sm-3">

   <label class="exampleModalLabel">Shop Name</label>

   <input type="text"  name="shopname" class="form-control" placeholder="Enter Shop Name" >

   </div>

   <div class="form-group col-sm-3">

   <label class="exampleModalLabel">Phone Number</label>

   <input type="tel"  name="shopphone" class="form-control" placeholder="Enter Phone Number" >

   </div>

   <div class="form-group col-sm-3">

   <label class="exampleModalLabel">Email-id</label>

   <input type="email"  name="shopemail" class="form-control" placeholder="Enter Email id" >

   </div>
   
   <div class="form-group col-sm-3">

   <label class="exampleModalLabel">Place</label>

   <input type="text"  name="shopplace" class="form-control" placeholder="Enter Place" >

   </div>

   <div class="form-group col-sm-3">

   <label class="exampleModalLabel">Shop Lattitude</label>

   <input type="text"  name="shoplat" class="form-control" placeholder="Shop Lattitude" >

   </div>

   <div class="form-group col-sm-3">

   <label class="exampleModalLabel">Shop Longitude</label>

   <input type="text"  name="shoplong" class="form-control" placeholder="Shop Longitude" >

   </div>

   <div class="form-group col-sm-3">

   <label class="exampleModalLabel">Shop Address</label>

   <textarea  name="shopaddress" class="form-control" placeholder="Enter Address" ></textarea>

   </div>

   

   <div class="form-group col-sm-3">

   <label class="exampleModalLabel">Opening Time</label>

   <input type="time"  name="shoptime" class="form-control" required>

   </div>


   

   <div class="form-group col-sm-9">

   <label class="exampleModalLabel">Image</label>

   <input type="file"  name="image" class="form-control" accept="image/*"     >

   </div>

   
   <div class="form-group col-sm-3">

   <label class="exampleModalLabel">Closing Time</label>

   <input type="time"  name="closingtime" class="form-control" required >

   </div>
   <div class="form-group col-sm-3">

   <label class="exampleModalLabel">Password</label>

   <input type="password" class="form-control" name="shop_password" id="shop_password" placeholder="Password" required="">

   </div>
   <div class="form-group col-sm-3">

	<label class="exampleModalLabel">Confirm Password</label>
   	<input type="password" class="form-control" name="shop_cpassword" id="shop_cpassword" placeholder="Confirm Password" required="">
   </div>
   <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>







</div>

<div class="modal-footer">


<button type="submit" name="submit" class="btn btn-primary">Add</button>

</div>

</div>

</div>

</form>

	</div>

						</div>

						<!-- /.card-header -->

						<div class="card-body">

						

							<table id="example2" class="table table-bordered table-striped">

								<thead>

									<tr>

										<th>id</th>

										<th>Shop Name</th>

                                        <th>Phone Number</th>

                                        <th>Place</th>

                                        

                                        <th>Image</th>

										<th></th>

										

										<th>Action</th>

									</tr>

								</thead>

								<tbody>@php

								 $i=1;

								  @endphp 

                                  @foreach($shops as $key)

									<tr>

										<td>{{$i}}</td>

										<td> {{$key->shop_name}}</td>

                                        <td> {{$key->shop_phonenum}}</td>

                                        <td> {{$key->shop_place}}</td>

                                        <td><img src="{{ asset('/admin/images/'.$key->shop_image) }}" width="150"></td>

										<td><a href="{{url('updatestatus/'.$key->id)}}"><button type="button" class="btn btn-sm btn-success">@if($key->status==0) Disapprove @else Approve @endif</button></a></td>

										

										<td> <i class="fa fa-edit edit_shop" aria-hidden="true"  data-id="{{$key->id}}"></i>

										

													

         	

                                        </td>

										

									</tr>@php $i++; @endphp @endforeach</tbody>

								<tfoot>

									<tr>

										<th>id</th>

										<th>Shop Name</th>

                                        <th>Phone Number</th>

                                        <th>Place</th>

                                        

                                        <th>Image</th>

										<th></th>

										

										<th>Action</th>

								

									</tr>

								</tfoot>

							</table>





							<div class="modal fade" id="subcategorymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

							<form method="POST" action="{{url('categoryinsert')}}" enctype="multipart/form-data">@csrf

										<div class="modal-dialog modal-xl" role="document" style="width:80%;">

											<div class="modal-content">

												<div class="modal-header">

													<h5 class="modal-title" id="exampleModalLabel"> Add Sub Category</h5>

													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>

													</button>

												</div>

												

                                                <div class="modal-body row">

												<div class="form-group col-sm-3">

													<label class="exampleModalLabel">Parent Category</label>

													<select  class="form-control selectmaincateadd">

													    <option value="0">Main Category</option>

														

													</select>

												</div>

												

												<div class="form-group col-sm-3">

													<label class="exampleModalLabel">Category</label>

													<select name="parent" class="form-control" id="subcatlistadd">

													    <option value="0">Category</option>

														

													</select>

												</div>



												<div class="form-group col-sm-3">

													<label class="exampleModalLabel">Sub Category</label>

												<input type="text" name="catname" class="form-control">

												</div>





                                                

													<div class="form-group col-sm-3">

														<label class="exampleModalLabel">Image</label>

														<input type="file" name="image"  class="form-control" accept="image/*"    >

													</div>



													<div class="col-sm-12">

<table class="table table-bordered">

<thead>

<th><center>Id</center></th>



<th><center>Subactegory</center></th>

<th><center>Image</center></th>

<th><center>Action</center></th>

</thead>

<tbody id="subcategorylistedit">

</tbody>

</table>

</div>

												</div>

												<div class="modal-footer">

													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

													<button type="submit" name="submit" class="btn btn-primary">Add</button>

												</div>

											</div>

										</div>

									</form>

							</div>

                  </div>









				  <div class="modal" id="editshop_modal" tabindex="-1" role="dialog">

                        <div class="modal-dialog" role="document">

                           <div class="modal-content">

                              <div class="modal-header">

                                 <h5 class="modal-title">Edit Shop</h5>

                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                 <span aria-hidden="true">&times;</span>

                                 </button>

                              </div>

                              <form method="POST" action="{{url('edit_shop')}}" enctype="multipart/form-data" name="shop_form_edit" onSubmit="return shop_form_vald_edit();">

                                 @csrf

                                 <div class="modal-body">

                                   

                                       <input type="hidden" name="id" id="id_edit">

									   <div class="form-group col-sm-12">  

   <label class="exampleModalLabel">Shop Name</label>

   <input type="text" id="shopname" name="shopname" class="form-control"  >

   </div>

   <div class="form-group col-sm-12">

   <label class="exampleModalLabel">Phone Number</label>

   <input type="tel" id="phno" name="shopphone" class="form-control"  >

   </div>

   <div class="form-group col-sm-12">

   <label class="exampleModalLabel">Email-id</label>

   <input type="email" id="mail" name="shopemail" class="form-control" >

   </div>

   <div class="form-group col-sm-12">

   <label class="exampleModalLabel">Place</label>

   <input type="text" id="place" name="shopplace" class="form-control" >

   </div>

   <div class="form-group col-sm-12">

   <label class="exampleModalLabel">Shop Lattitude</label>

   <input type="text" id="lat" name="shoplat" class="form-control" >

   </div>

   <div class="form-group col-sm-12">

   <label class="exampleModalLabel">Shop Longitude</label>

   <input type="text" id="long" name="shoplong" class="form-control" >

   </div>

   <div class="form-group col-sm-12">

   <label class="exampleModalLabel">Shop Address</label>

   <textarea id="address" name="shopaddress" class="form-control"  ></textarea>

   </div>

   

   <div class="form-group col-sm-12">

   <label class="exampleModalLabel">Opening Time</label>

   <input type="time" id="openingtime" name="shoptime" class="form-control" >

   </div>

   
   <div class="form-group col-sm-12">

   <label class="exampleModalLabel">Closing Time</label>

   <input type="time" id="closingtime" name="closingtime" class="form-control" >

   </div>

   <div class="form-group col-sm-12">

   <label class="exampleModalLabel">Image</label>

   <input type="file" id="img" name="image" class="form-control" accept="image/*" >

   </div>

   





									

                                 </div>

								 <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary">Save changes</button>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                 </div>

                              </form>

                           </div>

                        </div>

                     </div>

					</div>







					<div class="modal" id="deleteShopStatus" tabindex="-1" role="dialog">

                        <div class="modal-dialog catprodel" role="document">

                           <div class="modal-content">

                              <div class="modal-header">

                                 <h5 class="modal-title">Do you want to Delete ?</h5>

                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                 <span aria-hidden="true">&times;</span>

                                 </button>

                              </div>

							  <form method="POST" action="{{url('deleteShopStatus')}}" enctype="multipart/form-data">
							  @csrf

							 		 <div class="modal-body">
												
										 <div class="form-group col-sm-6">

										 	<input type="hidden" name="shopdelid" id="shopdelid">

												
													 <button  type="submit"  class="btn btn-danger">Delete</button>

       									

													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

												</div>

												

									 

									

									

                                 </div>

								 </form>

                                 

                            

                           </div>

                        </div>

                     </div>

					





							<div class="modal" id="viewbanner_modal" tabindex="-1" role="dialog">

								<div class="modal-dialog" role="document">

									<div class="modal-content">

										<div class="modal-header">

											<h5 class="modal-title">View Banner</h5>

											<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>

											</button>

										</div>

										

											<div class="modal-body row">

											<div class="form-group col-sm-6">

													<label class="exampleModalLabel">Banner Type</label>

													<select name="type1" class="form-control" id="bannertype1">

													    <option value="0">Select Type</option>

														<option value="1">Customer</option>

														<option value="2">Shop</option>

														<option value="3">Package</option>

														<option value="4">Store</option>

													</select>

												</div>

												<div class="form-group col-sm-6">

													<input type="hidden" name="id" id="bannerid">

													<label class="exampleModalLabel">Image</label>

													<input type="file" name="bannerimage" accept="image/*" id="bannerimage1"    >

													<img src="" alt="" width="50" accept="image/*" id="bannerimage1"/>

												</div>

											</div>

											<div class="modal-footer">

	

												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

											</div>

										

									</div>

								</div>

							</div>

						</div>

						<!-- /.card-body -->

					</div>

					<!-- /.card -->

				</div>

				<!-- /.col -->

			</div>

			<!-- /.row -->

		</div>

		<!-- /.container-fluid -->

	</section>

	<!-- /.content -->

</div>@endsection