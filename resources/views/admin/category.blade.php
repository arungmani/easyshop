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

						<li class="breadcrumb-item active">Category</li>

					</ol>

				</div>

			</div>

		</div>

		<!-- /.container-fluid -->

	</section>
	@if(session('success'))

	<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    
      
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
   
  });
    </script>

	@endif

	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<div class="row">

				<div class="col-12">

					<!-- /.card -->

					<div class="card">

						<div class="card-header">

							<h3 class="card-title swalDefaultSuccess">Category</h3>

							<p align="right">

								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Add Category</button>

								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

									<form method="POST" action="{{url('categoryinsert')}}" name="categ_form" enctype="multipart/form-data" onSubmit="return validate_form ( );">
									@csrf

										<div class="modal-dialog modal-xl" role="document" style="width:100%;">

											<div class="modal-content">

												<div class="modal-header">

													<h4 class="modal-title" id="exampleModalLabel">Add Categories</h4>

													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>

													</button>

												</div>

												<div class="modal-body row">

													<input type="hidden" name="cate" class="form-control" id="categoryid">

													
													<div class="form-group col-sm-6">
														<label class="exampleModalLabel">Category</label>

														<input type="text" name="catname" class="form-control" placeholder="Enter Category">
														</div>
															<div class="form-group col-sm-6">
														<label class="exampleModalLabel">Parent Category</label>

<select name="parent" class="form-control" required>

	<option value="0">Main Category</option>@foreach($catg as $key1)

	<option value="{{$key1->id}}">{{$key1->categoryname}}</option>@endforeach</select>

												
</div>
													<div class="form-group col-sm-8">

														<label class="exampleModalLabel">Image</label>

									<input type="file" name="image" class="form-control" accept="image/*">

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

						<!-- /.card-header -->

						<div class="card-body">

							<div class="form-group col-sm-3">

								<label class="exampleModalLabel">Category</label>

								<select name="type1" class="form-control" id="bannertype">

									<option value="0">Select</option>@foreach($catg as $key)

									<option value="{{$key->id}}">{{$key->categoryname}}</option>@endforeach</select>

							

						

							

							</div>

							

							<table  class="table table-bordered table-striped">

								<thead>

									<tr>

										<th>id</th>

										<th>Category</th>

										<th>Image</th>

										<th></th>

										<th>Action</th>

									</tr>

								</thead>

								<tbody id="categorydroptable">

									@php $i=1; @endphp @foreach($cat as $key)

									<tr>

										<td>{{$i}}</td>

										<td>{{$key->categoryname}}</td>

										<td>

											<img src="{{ asset('/admin/images/'.$key->image) }}" width="150" height="90">

										</td>

										<td align="center">

											<button type="button" class="btn btn-info addsubcategories" data-id="{{$key->id}}">+ Sub Categories</button>

										</td>

										<td>	

			<i class="fa fa-edit edit_category" aria-hidden="true" data-toggle="modal" data-id="{{$key->id}}"></i>

			<i class="fa fa-trash delete_category" aria-hidden="true" data-target="#deleteCategoryStatus" data-toggle="modal" data-id="{{$key->id}}"></i>

	  

										</td>

									</tr>@php $i++; @endphp @endforeach</tbody>

								<tfoot>

									<tr>

										<th>id</th>

										<td>Category</td>

										<th>Image</th>

										<th></th>

										<th>Action</th>

									</tr>

								</tfoot>

							</table>

							<div class="modal fade" id="subcategorymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

								<form method="POST" action="{{url('categoryinsert')}}" enctype="multipart/form-data" name="subcatg_vald" onSubmit="return validate_form1( );">@csrf

									<div class="modal-dialog modal-xl" role="document" style="width:80%;">

										<div class="modal-content">

											<div class="modal-header">

												<h5 class="modal-title" id="exampleModalLabel"> Add Sub Category</h5>

												<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>

												</button>

											</div>

											<input type="hidden" name="parent" id="sucatinsertid">

											 <div class="modal-body row">

											

												<div class="form-group col-sm-3">

													<label class="exampleModalLabel">Sub Category</label>

													<input type="text" name="catname" class="form-control">

												</div>

												<div class="form-group col-sm-9">

													<label class="exampleModalLabel">Image</label>
													<div class="form-group col-sm-12">
													<input type="file" name="image" class="form-control" accept="image/*">
</div>
												</div>

												<div class="col-sm-12">

													<table class="table table-bordered">

														<thead>

															<th>

																<center>Id</center>

															</th>

															<th>

																<center>Subactegory</center>

															</th>

															<th>

																<center>Image</center>

															</th>

															<th>

																<center>Action</center>

															</th>

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

						<div class="modal" id="editcategory_modal" tabindex="-1" role="dialog">

					

							<div class="modal-dialog" role="document">

								<div class="modal-content">

									<div class="modal-header">

										<h5 class="modal-title">Edit Category</h5>

										<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>

										</button>

									</div>

									<form method="POST" action="{{url('edit_category')}}" enctype="multipart/form-data" name="editcatg" onSubmit="return validate_form2 ( );">@csrf

									@csrf

										<div class="modal-body row">

										<input type="hidden" name="cate" class="form-control" id="categoryid1">

													<div class="form-group col-sm-12">

														<label class="exampleModalLabel">Category</label>

														<input type="text" name="catname" id="catname" class="form-control" placeholder="Enter the Category">

													</div>

													<div class="form-group col-sm-12">

														<label class="exampleModalLabel">Image</label>

														<input type="file" class="form-control" id="image" name="image" accept="image/*">

													

													</div>

													<div class="form-group col-sm-12">

														<label class="exampleModalLabel">Parent Category</label>

														<select name="parent" class="form-control" id="parentcat">

															<option value="0">Main Category</option>@foreach($catg as $key1)

															<option value="{{$key1->id}}">{{$key1->categoryname}}</option>@endforeach</select>

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

						

						<div class="modal" id="deleteCategoryStatus" tabindex="-1" role="dialog">

                        <div class="modal-dialog catdel" role="document">

                           <div class="modal-content">

                              <div class="modal-header">

                                 <h5 class="modal-title">Do you want to Delete ?</h5>

                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                 <span aria-hidden="true">&times;</span>

                                 </button>

                              </div>

							  <form method="POST" action="{{url('deleteCategoryStatus')}}" enctype="multipart/form-data">@csrf

								@csrf
							 

                                 <div class="modal-body">

                                   <input type="hidden" class="form-control" name="category_id" id="category_delid">

                                      

									   <div class="form-group col-sm-6">

												



												

									  <button type="submit"  class="btn btn-danger">Delete</button>

     										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

								</div>

												

									 

									

									

                                 </div>

								 </form>

                                 

                            

                           </div>

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