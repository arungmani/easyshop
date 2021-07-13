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

						<li class="breadcrumb-item active">Variant Type</li>

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

							<h3 class="card-title">Variants</h3>

							<p align="right">

								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Add Variant</button>

								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

									<form method="POST" action="{{url('variants_insert')}}" enctype="multipart/form-data">@csrf

										<div class="modal-dialog" role="document" style="width:80%;">

											<div class="modal-content">

												<div class="modal-header">

													<h5 class="modal-title" id="exampleModalLabel">Add Variants</h5>

													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>

													</button>

												</div>

                                                <div class="modal-body row">
                                                <div class="form-group col-sm-12">

<label class="exampleModalLabel">Variant Type</label>

<select name="varient_type" id="varient_type" class="form-control">
<option value="select">Variant Type</option>
@foreach($vari_type as $var_t)
<option value="{{$var_t->id}}">{{$var_t->varient_type}}</option>
@endforeach
</select>
</div>
												<div class="form-group col-sm-12">

													<label class="exampleModalLabel">Variant</label>

													
                                                    <input type="text" name="variant"  class="form-control" required>

												

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

										<th>Variant Type</th>

                                        <th>Variant</th>
										<th>Action</th>

									</tr>

								</thead>

								<tbody>@php $i=1; @endphp @foreach($vari as $key)

									<tr>

										<td>{{$i}}</td>

										<td>
										{{$key->varient_type}}
</td><td>
										{{$key->varient}}

										</td>

                                     	<td> <i class="fa fa-edit edit_vari" aria-hidden="true" data-toggle="modal" data-id="{{$key->id}}">
										 </i>
										 
										 <a href="{{url('DeleteVariants')}}/{{ $key->id }}" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="fa fa-trash delvar"></i></a>
													
									

		  </td>

									</tr>@php $i++; @endphp @endforeach</tbody>

								<tfoot>

									<tr>

                                         <th>id</th>

										<th>Variant Type</th>

                                        <th>Variant</th>
										<th>Action</th>

									</tr>

								</tfoot>

							</table>

							<div class="modal" id="editvari_modal" tabindex="-1" role="dialog">

								<div class="modal-dialog" role="document">

									<div class="modal-content">

										<div class="modal-header">

											<h5 class="modal-title">Edit Variant Type</h5>

											<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>

											</button>

										</div>

										<form method="POST" action="{{url('variant_edit')}}" enctype="multipart/form-data">@csrf

											<div class="modal-body row">
                                            <input type="hidden" name="id" id="variid">
                                            <div class="form-group col-sm-12">

<label class="exampleModalLabel">Variant Type</label>

<select name="varient_type" id="varie_type" class="form-control">
<option value="select">Variant Type</option>
@foreach($vari_type as $var_t)
<option value="{{$var_t->id}}">{{$var_t->varient_type}}</option>
@endforeach
</select>
</div>
												<div class="form-group col-sm-12">

													

													<label class="exampleModalLabel">Variant Type</label>

													
                                                    <input type="text" name="variant" id="varian"  class="form-control" required>

												

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

													<input type="file" name="bannerimage" accept="image/*" id="bannerimage1" required>

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