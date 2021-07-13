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

						<li class="breadcrumb-item active">Shop Banner</li>

					</ol>

				</div>

			</div>

		</div>

        <style>

        @media (min-width: 576px){

.modal-dialog {

    max-width: 1000px;

    margin: 1.75rem auto;

}

.shopbandel {

    max-width: 400px;

    margin: 1.75rem auto;

}

}

        </style>

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

							<h3 class="card-title">Shop Banner</h3>

							<p align="right">

								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Add New</button>

								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

									<form method="POST" action="{{url('shopbannerinsert')}}" enctype="multipart/form-data" name="shop_ban_form" onSubmit="return shop_ban_vald();">@csrf

										<div class="modal-dialog" role="document" style="width:80%;">

											<div class="modal-content">

												<div class="modal-header">

													<h5 class="modal-title" id="exampleModalLabel">Add New</h5>

													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>

													</button>

												</div>

                                                <div class="modal-body row">

                                             



                                                <div class="form-group col-sm-6">

													<label class="exampleModalLabel">Shop Name</label>

													<select name="shopname" class="form-control" id="shopname">

													    <option>select shop</option>

														@foreach($sh as $key1)

                                                        <option value="{{$key1->id}}">{{$key1->shop_name}}</option>

                                                        @endforeach

													</select>

												</div>

												

                                                

													<div class="form-group col-sm-6">

														<label class="exampleModalLabel">Image</label>

														<input type="file" name="image"  class="form-control" accept="image/*" >

													</div>



                                                  

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

							<table id="example1" class="table table-bordered table-striped">

								<thead>

									<tr>

										<th>id</th>

                                      <th>Shop Name</th>

										

                                        <th>Banner Image</th>

                                       

                                       

										<th>Action</th>

									</tr>

								</thead>

								<tbody id="shopban">@php $i=1; @endphp @foreach($ban as $key)

									<tr>

										<td>{{$i}}</td>

                                      

                                      <td>{{$key->shop_name}}</th>

										<td><img src="{{ asset('/admin/images/'.$key->banner_image) }}" width="150"></td>

                                      

                                   

                                        <td> <i class="fa fa-edit editshopbanners" aria-hidden="true" data-toggle="modal" data-id="{{$key->id}}"></i>

									

                                      </td>

									</tr>@php $i++; @endphp @endforeach</tbody>

								<tfoot>

									<tr>

                                   

                                    <th>Sl No</th>

                                       

                                    <th>Shop Name</th>

                                        <th>Banner Image</th>

                                        <th>Action</th>

									</tr>

								</tfoot>

							</table>



        



                            

                            

							<div class="modal" id="editshopbanner_modal" tabindex="-1" role="dialog">

                        <div class="modal-dialog" role="document">

                           <div class="modal-content">

                              <div class="modal-header">

                                 <h5 class="modal-title">Edit Shop Banner</h5>

                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                 <span aria-hidden="true">&times;</span>

                                 </button>

                              </div>

							  <form method="POST" action="{{url('shopbanneredit')}}" enctype="multipart/form-data" name="shop_ban_edit" onSubmit="return shop_ban_edit_vald();">

                                 @csrf

                                 <div class="modal-body">

                                   

                                       <input type="hidden" name="id" id="shopban_edit">

									   <div class="form-group col-sm-6">

													<label class="exampleModalLabel">Shop Name</label>

													<select name="shopname" class="form-control" id="shopnameedit" disabled>

													    <option>select shop</option>

														@foreach($sh as $key1)

                                                        <option value="{{$key1->id}}">{{$key1->shop_name}}</option>

                                                        @endforeach

													</select>

												</div>

												

									   <div class="form-group col-sm-6">                                           

										  <input type="file" name="image" accept="image/*">                                           

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