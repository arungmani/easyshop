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
						<li class="breadcrumb-item active">Banners</li>
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
							<h3 class="card-title">Banners</h3>
							<p align="right">
							<!--	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Add Banner</button>-->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<form method="POST" action="{{url('bannerinsert')}}" enctype="multipart/form-data">@csrf
										<div class="modal-dialog" role="document" style="width:80%;">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Add Banners</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
													</button>
												</div>
                                                <div class="modal-body row">
												<div class="form-group col-sm-12">
													<label class="exampleModalLabel">Parent Category</label>
													<select name="parent" class="form-control category" id="category" disabled>
													    <option value="0">Main Category</option>
														@foreach($category as $key1)
                                                        <option value="{{$key1->id}}">{{$key1->categoryname}}</option>
                                                        @endforeach
													</select>
												
												</div>
                                                <div class="form-group col-sm-12" style="display:none;" id="subcategorydiv">
													<label class="exampleModalLabel">Sub Category</label>
													<select name="catname" class="form-control subcategory" id="subcategory">
													   
													</select>
												</div>

												<div class="form-group col-sm-12" style="display:none;" id="subsubcatyesno">
													<input type="checkbox" id="checkradio" >Add subsub category banner
												</div>

												<div class="form-group col-sm-12" style="display:none;" id="subsubcategorydiv">
													<label class="exampleModalLabel">Sub sub Category</label>
													<select name="subsubcatname" class="form-control" id="subsubcategory">
													   
													</select>
												</div>

													<div class="form-group col-sm-12">
														<label class="exampleModalLabel">Image (1400 x 358)</label>
														<input type="file" name="image"  class="form-control" accept="image/*" required>
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
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>id</th>
										<th>Category</th>
                                        <th>Banner</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>@php $i=1; @endphp @foreach($banner as $key)
									<tr>
										<td>{{$i}}</td>
										<td>
										@if($key->category==0)

                                        Home Banner

                                        @else

                                        @php

                                        $parentid=$key->category;

                                        $categorysub=DB::table('categorys')
                                        
                                        ->where('categorys.id',$parentid)

                                        ->value('parentcategory');

                                        $maincat=DB::table('categorys')
                                        
                                        ->where('categorys.id',$categorysub)

                                        ->value('categoryname');

                                        

                                        @endphp

                                        {{$maincat}} >> {{$key->categoryname}}  

                                        

                                        @endif
										</td>
                                        <td><img src="{{ asset('/admin/images/'.$key->banner_image) }}" width="150"></td>
										<td> <i class="fa fa-edit edit_banner" aria-hidden="true" data-toggle="modal" data-id="{{$key->id}}"></i>
									
		  </td>
									</tr>@php $i++; @endphp @endforeach</tbody>
								<tfoot>
									<tr>
                                         <th>id</th>
										<th>Category</th>
                                        <th>Banner</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
							<div class="modal" id="editbanner_modal" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Edit Banner</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="POST" action="{{url('banneredit')}}" enctype="multipart/form-data">@csrf
											<div class="modal-body row">
											<div class="form-group col-sm-6">
													<label class="exampleModalLabel">Banner Type</label>
													<select name="type1" class="form-control" id="bannertype" disabled>
													<option value="0">Main Category</option>
														
													</select>
												</div>
												<div class="form-group col-sm-8">
													<input type="hidden" name="id" id="bannerid">
													<label class="exampleModalLabel">Image (1400 x 358)</label>
													<input type="file" name="bannerimage" accept="image/*" id="bannerimage">
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