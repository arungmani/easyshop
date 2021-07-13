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

                        <li class="breadcrumb-item active">Products</li>

                    </ol>

                </div>

            </div>

        </div>

        <style>
        @media (min-width: 576px) {

            .modal-dialog {

                max-width: 640px;

                margin: 1.75rem auto;

            }

            .catprodel {

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

                            <h3 class="card-title">Products</h3>

                            <p align="right">

                                <button type="button" name="catprod_vald" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#exampleModal">Add Products</button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <form method="POST" action="{{url('catproductinsert')}}" enctype="multipart/form-data" name="catprod_vald" onSubmit="return validate_form_catprod();">
                                    @csrf

                                    <div class="modal-dialog" role="document" style="width:80%;">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>

                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"> <span aria-hidden="true">&times;</span>

                                                </button>

                                            </div>

                                            <div class="modal-body row">

                                                <div class="form-group col-sm-6">

                                                    <label class="exampleModalLabel">Type category</label>

                                                    <select name="parent" class="form-control category" id="category" >

                                                        <option>select category</option>

                                                        @foreach($cat as $key1)

                                                        <option value="{{$key1->id}}">{{$key1->categoryname}}</option>

                                                        @endforeach

                                                    </select>

                                                </div>

                                                <div class="form-group col-sm-6" id="subcategorydiv">

                                                    <label class="exampleModalLabel">Category</label>

                                                    <select name="subcat" class="form-control subcategory"
                                                        id="subcategory">



                                                    </select>

                                                </div>

                                                <div class="form-group col-sm-6" id="sub-subcategorydiv">

                                                    <label class="exampleModalLabel">Sub Category</label>

                                                    <select name="subsubcat" class="form-control" id="subsubcategory">



                                                    </select>

                                                </div>



                                                <div class="form-group col-sm-6">

                                                    <label class="exampleModalLabel">Product Name</label>

                                                    <input type="text" name="productname" class="form-control"  >

                                                </div>



                                                <div class="form-group col-sm-12">

                                                    <label class="exampleModalLabel">Image</label>

                                                    <input type="file" name="image" class="form-control"
                                                        accept="image/*"  >

                                                </div>



                                                <!-- <div class="form-group col-sm-12">

														<label class="exampleModalLabel">Rating</label><br>

														<input type="radio" name="rating" value="1"  >1	&nbsp;

                                                        <input type="radio" name="rating" value="2"  >2	&nbsp;

                                                        <input type="radio" name="rating" value="3"  >3	&nbsp;

                                                        <input type="radio" name="rating" value="4"  >4	&nbsp;

                                                        <input type="radio" name="rating" value="5"  >5	&nbsp;

													</div> -->

                                                <div class="form-group col-sm-4">

                                                    <label class="exampleModalLabel">Discount</label>

                                                    <input type="text" name="discount" class="form-control"  >

                                                </div>

                                                <div class="form-group col-sm-4">

                                                    <label class="exampleModalLabel">Price</label>

                                                    <input type="text" name="price" class="form-control"  >

                                                </div>

                                                <div class="form-group col-sm-4">

                                                    <label class="exampleModalLabel">Offer Price</label>

                                                    <input type="text" name="offerprice" class="form-control"  >

                                                </div>
                                                <!-- <div class="form-group col-sm-3">

                                                <label class="exampleModalLabel">Number of Pieces</label>

                                                <input type="text" name="noquantity"  class="form-control"  required>

                                                </div> -->

                                                <div class="form-group col-sm-12">

                                                    <label class="exampleModalLabel">Description</label>

                                                    <textarea class="form-control" name="desc"></textarea>

                                                </div>

                                                <div class="form-group col-sm-3">

                                                    <input type="checkbox" value="1" name="newstatus"> New product

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

                                        <th>Category</th>

                                        <th>Product Name</th>

                                        <th>Product Image</th>

                                        <th>Product Price</th>

                                        <th>Product Offer price</th>

                                        <th></th>

                                        <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody id="catedit">@php $i=1; @endphp @foreach($products as $key)

                                    <tr>

                                        <td>{{$i}}</td>

                                        <td>

                                            @if($key->category_id==0)



                                            Home Products



                                            @else



                                            @php



                                            $parentid=$key->category_id;



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

                                        <td>{{$key->product_name}}</td>

                                        <td><img src="{{ asset('/admin/images/'.$key->image) }}" width="150"></td>



                                        <td>{{$key->price}}</td>

                                        <td>{{$key->offer_price}}</td>

                                        <td> <button type="button" data-target="#addproductfeatures" data-toggle="modal"
                                                class="btn btn-info addproductfeature" data-id="{{$key->id}}">

                                                +Features</button></td>

                                        <td>



                                            <i class="fa fa-edit catproductedit" aria-hidden="true" data-toggle="modal"
                                                data-id="{{$key->id}}"></i>

                                            <i class="fa fa-trash catproductdelete" data-target="#catproductdelete"
                                                aria-hidden="true" data-toggle="modal" data-id="{{$key->id}}"></i>







                                        </td>

                                    </tr>@php $i++; @endphp @endforeach
                                </tbody>

                                <tfoot>

                                    <tr>

                                        <th>id</th>

                                        <th>Category</th>

                                        <th>Product Name</th>

                                        <th>Product Image</th>

                                        <th>Product Price</th>

                                        <th>Product Offer price</th>

                                        <th></th>

                                        <th>Action</th>

                                    </tr>

                                </tfoot>

                            </table>



                            <div class="modal fade" id="addproductfeatures" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <form method="POST" action="{{url('addproductfeatures')}}"
                                    enctype="multipart/form-data" name="feature_form" onSubmit="return feature_form_vald();">@csrf

                                    <div class="modal-dialog" role="document" style="width:80%;">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <h5 class="modal-title" id="exampleModalLabel"> Add Product Features
                                                </h5>

                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"> <span aria-hidden="true">&times;</span>

                                                </button>

                                            </div>

                                            <div class="modal-body row">

                                                <input type="hidden" id="profeatid" name="featname">



                                                <div class="form-group col-sm-12">

                                                    <label class="exampleModalLabel image">Features</label>

                                                    <input type="text" name="features" class="form-control"  >







                                                </div>



                                                <div class="col-sm-12">

                                                    <table class="table table-bordered">

                                                        <thead>

                                                            <th>

                                                                <center>SL No</center>

                                                            </th>



                                                            <th>

                                                                <center>Features</center>

                                                            </th>

                                                            <th>

                                                                <center>Action</center>

                                                            </th>

                                                        </thead>

                                                        <tbody id="feature_list">

                                                        </tbody>

                                                    </table>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>

                                                <button type="submit" name="submit" class="btn btn-primary">Add</button>

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>





                            <div class="modal" id="catproductdelete" tabindex="-1" role="dialog">

                                `<div class="modal-dialog catprodel" role="document">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title">Do you want to Delete ?</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                <span aria-hidden="true">&times;</span>

                                            </button>

                                        </div>

                                        <div class="modal-body">

                                            <form method="POST" action="{{url('deleteCatProdStatus')}}"
                                                enctype="multipart/form-data" name="catprod_edit_vald" onSubmit="return validate_form_catprod_edit();">@csrf

                                                <input type="hidden" name="catproid" id="cateproductdelid">


                                                <button type="submit" class="btn btn-danger">Delete</button>



                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>

                                            </form>

                                        </div>


                                    </div>





                                </div>

                            </div>



                            <div class="modal" id="editcatproduct_modal" tabindex="-1" role="dialog">

                                <div class="modal-dialog" role="document">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title">Edit Category Products</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>

                                            </button>

                                        </div>

                                        <form method="POST" action="{{url('catproductedit')}}"
                                            enctype="multipart/form-data">@csrf

                                            <div class="modal-body row" id="editcategory_body">







                                            </div>



                                            <div class="modal-footer">

                                                <button type="submit" class="btn btn-primary">Save changes</button>

                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>

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

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>

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

                                                <input type="file" name="bannerimage" accept="image/*" id="bannerimage1"
                                                     >

                                                <img src="" alt="" width="50" accept="image/*" id="bannerimage1" />

                                            </div>

                                        </div>

                                        <div class="modal-footer">



                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>

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