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

								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Add variants type</button>

								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

									<form method="POST" action="{{url('assignvariinsert')}}" name="categ_form" enctype="multipart/form-data" onSubmit="return validate_form ( );">
									@csrf

										<div class="modal-dialog modal-xl" role="document" style="width:100%;">

											<div class="modal-content">

												<div class="modal-header">

													<h4 class="modal-title" id="exampleModalLabel">Add variants type</h4>

													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>

													</button>

												</div>

												<div class="modal-body row">

													<input type="hidden" name="cate" class="form-control" id="categoryid">

													<div class="form-group col-sm-6">



<label class="exampleModalLabel">Parent Category</label>



<select name="parent" class="form-control category" id="category" required>



	<option>select category</option>



	@foreach($cat as $key1)



	<option value="{{$key1->id}}">{{$key1->categoryname}}</option>



	@endforeach



</select>



</div>



<div class="form-group col-sm-6" id="subcategorydiv">



<label class="exampleModalLabel">Sub Category</label>



<select name="subcat" class="form-control subcategory"
	id="subcategory" required>







</select>



</div>



<div class="form-group col-sm-6" id="sub-subcategorydiv">



<label class="exampleModalLabel">Sub-sub Category</label>



<select name="catname" class="form-control" id="subsubcategory" required>







</select>



</div>
													
															<div class="form-group col-sm-6">
														    <label class="exampleModalLabel">variant type</label>

                                                           <select name="veriantype[]" id="varie_type" class="form-control" multiple>
                                                            <option value="select">select Variant Type</option>
                                                            @foreach($vari_type as $var_t)
                                                            <option value="{{$var_t->id}}">{{$var_t->varient_type}}</option>
                                                            @endforeach
                                                            </select>

                                                                                                            
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

								

							

						

							

							</div>

							

							<table id="example1" class="table table-bordered table-striped">

								<thead>

									<tr>

										<th>id</th>

										<th>Category</th>

										

										<th></th>
										

									</tr>

								</thead>

								<tbody id="categorydroptable">

									@php $i=1; @endphp @foreach($category as $key)

									<tr>

										<td>{{$i}}</td>

										<td>{{$key->categoryname}}</td>
										


										
										<td align="center">

											<button type="button" class="btn btn-info viewvarianttype" data-id="{{$key->cat_id}}">view variant type</button>

										</td>

										

									</tr>@php $i++; @endphp @endforeach</tbody>

								<tfoot>

									<tr>

										<th>id</th>

										<td>Category</td>

										

										<th></th>

									

									</tr>

								</tfoot>

							</table>
							<!------------------------------------------------------------------------------------------------------------------------------------->
							<div class="modal" id="viewvariant" tabindex="-1" role="dialog">

					

							<div class="modal-dialog" role="document">

								<div class="modal-content">

									<div class="modal-header">

										<h5 class="modal-title">variyant</h5>

										<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>

										</button>

									</div>
									
									<table class="table table-bordered">

														<thead>

															<th>

																<center>Id</center>

															</th>

															<th>

																<center>Veriant Type</center>

															</th>

														

															<th>

																<center>Action</center>

															</th>

														</thead>

														<tbody id="varienttypemodal">

														

														

														</tbody>

													</table>
							<!--------------------------------------------------------------------------------------------------------------------------------------->

						

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