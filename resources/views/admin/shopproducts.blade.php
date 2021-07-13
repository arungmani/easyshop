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

                        <li class="breadcrumb-item active">Shop Products</li>

                    </ol>

                </div>

            </div>

        </div>

        <style>
        @media (min-width: 576px) {

            .modal-dialog {

                max-width: 1000px;

                margin: 1.75rem auto;

            }

            .shopprodel {

                max-width: 400px;

                margin: 1.75rem auto;

            }

            .rwbtn {
    color: #fff;
   
    box-shadow: none;
    width: 85px;
}

        }
        </style>

        <!-- /.container-fluid -->

    </section>@if(session('success'))

    <h3 style="margin-left: 19px;color: green;font-size:18px;">{{session('success')}}</h3>

    @endif

    @if(Session::has('message'))

    <script>
    var type = "{{ Session::get('alert-type', 'info') }}";

    switch (type) {

        case 'info':

            toastr.info("{{ Session::get('message') }}");

            break;



        case 'warning':

            toastr.warning("{{ Session::get('message') }}");

            break;



        case 'success':

            toastr.success("{{ Session::get('message') }}");

            break;



        case 'error':

            toastr.error("{{ Session::get('message') }}");

            break;

    }
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

                            <h3 class="card-title">Shop Products</h3>

                            <p align="right">

                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#exampleModal">Add Products</button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <form method="POST" action="{{url('shopproductinsert')}}" enctype="multipart/form-data" name="shoprod_form" onSubmit="return shopprod_vald();">
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

                                                    <label class="exampleModalLabel">Shop Name</label>

                                                    <select name="shopname" class="form-control" id="shopname">

                                                        <option>select shop</option>

                                                        @foreach($sh as $key1)

                                                        <option value="{{$key1->id}}">{{$key1->shop_name}}</option>

                                                        @endforeach

                                                    </select>

                                                </div>



                                                <div class="form-group col-sm-6">

                                                    <label class="exampleModalLabel">Product Name</label>

                                                    <select name="productname" class="form-control" id="productname">

                                                        <option>select product</option>

                                                        @foreach($prod as $key1)

                                                        <option value="{{$key1->id}}">{{$key1->product_name}}</option>

                                                        @endforeach

                                                    </select>

                                                </div>



                                                <div class="form-group col-sm-6">

                                                    <label class="exampleModalLabel">Price</label>

                                                    <input type="text" name="price" class="form-control"   >

                                                </div>

                                                <div class="form-group col-sm-6">

                                                    <label class="exampleModalLabel">Offer Price</label>

                                                    <input type="text" name="offprice" class="form-control"   >

                                                </div>
                                               

                                                <!-- <div class="form-group col-sm-6">

                                                    <label class="exampleModalLabel">Discount</label>

                                                    <input type="text" name="dscnt" class="form-control"   >

                                                </div> -->

                                                <!-- <div class="form-group col-sm-6">

														<label class="exampleModalLabel">Image</label>

														<input type="file" name="image"  class="form-control" accept="image/*"   >

													</div> -->





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

                        </div>

                        <!-- /.card-header -->

                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">

                                <thead>

                                    <tr>

                                        <th>id</th>

                                        <th>Shop Name</th>

                                        <th>Product Name</th>

                                       

                                        <th>Actual Price</th>

                                        <th>Offer Price</th>

                                        <th>Commission</th>

                                        

                                        <th>Shipping Cost</th>

                                        <th></th>





                                        <th>Action</th>

                                    </tr>

                                </thead>

                                <tbody id="shopro">@php $i=1; @endphp @foreach($products as $key)

                                    <tr>

                                        <td>{{$i}}</td>

                                        <td>

                                            {{$key->shop_name}}

                                        </td>

                                        <td>{{$key->product_name}}</td>

                                       

                                        <td>{{$key->price}}</td>

                                        <td>{{$key->offer_price}}</td>

                                        <td></td>

                                        <td>Depends on your carrier</td>



                                        <td align="center">

                                            <button type="button" data-target="#addproductimages" data-toggle="modal"
                                                class="btn btn-info btn-sm rwbtn addproductimage" data-id="{{$key->id}}">

                                                + Images</button>
                                                <br><br>
                                            <button type="button" data-target="#addproductreviews" data-toggle="modal"
                                                class="btn btn-danger btn-sm rwbtn addproductreview" data-id="{{$key->id}}">

                                                Reviews</button>
<br><br>
                                                <!-- <button type="button" data-target="#addproduct_variant" data-toggle="modal"
                                                class="btn btn-warning btn-sm rwbtn addproductvariant" data-id="{{$key->id}}">

                                                + Variants</button> -->

                                        </td>

                                        <td> <i class="fa fa-edit edit_shopproduct" aria-hidden="true"
                                                data-toggle="modal" data-id="{{$key->id}}"></i>





                                            <i class="fa fa-trash deleteShopProducts" data-target="#deleteShopProducts"
                                                aria-hidden="true" data-toggle="modal" data-id="{{$key->id}}"></i>



                                        </td>

                                    </tr>@php $i++; @endphp @endforeach
                                </tbody>

                                <tfoot>

                                    <tr>



                                    <th>id</th>

<th>Shop Name</th>

<th>Product Name</th>



<th>Actual Price</th>

<th>Offer Price</th>

<th>Commission</th>



<th>Shipping Cost</th>

<th></th>





<th>Action</th>

                                    </tr>

                                </tfoot>

                            </table>







                            <div class="modal fade" id="addproductimages" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <form method="POST" action="{{url('productimageinsert')}}"
                                    enctype="multipart/form-data" name="prodimage_form" onSubmit="return addprod_image_vald();">@csrf

                                    <div class="modal-dialog" role="document" style="width:80%;">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <h5 class="modal-title" id="exampleModalLabel"> Add Product Images</h5>

                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"> <span aria-hidden="true">&times;</span>

                                                </button>

                                            </div>

                                            <div class="modal-body row">

                                                <input type="hidden" id="productid" name="productname">



                                                <div class="form-group col-sm-10">

                                                    <label class="exampleModalLabel image">Image</label>

                                                    <input type="file" name="image" class="form-control"
                                                        accept="image/*"    multiple>







                                                </div>



                                                <div class="col-sm-12">

                                                    <table class="table table-bordered">

                                                        <thead>

                                                            <th>

                                                                <center>SL No</center>

                                                            </th>



                                                            <th>

                                                                <center>Image</center>

                                                            </th>

                                                            <th>

                                                                <center>Action</center>

                                                            </th>

                                                        </thead>

                                                        <tbody id="product_list">



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
                            <div class="modal fade" id="addproduct_variant" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">



                            <form method="POST" action="{{url('addproductvariant')}}" enctype="multipart/form-data"
                                name="feature_form" onSubmit="return feature_form_vald();">@csrf



                                <div class="modal-dialog" role="document" style="width:80%;">



                                    <div class="modal-content">



                                        <div class="modal-header">



                                            <h5 class="modal-title" id="exampleModalLabel"> Add Product Variants

                                            </h5>



                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>



                                            </button>



                                        </div>



                                        <div class="modal-body row">



                                            <input type="hidden" id="variid" name="varid">

                                         
                                            <div class="form-group col-sm-6">



<label class="exampleModalLabel image">Variant Type</label>


<select name="vartype" id="vartype" class="form-control">

<option value="select">Select</option>
@foreach($vari as $val1)
<option value="{{$val1->id}}">{{$val1->variant_type}}</option>
@endforeach
</select>



</div>


                                            <div class="form-group col-sm-6">



                                                <label class="exampleModalLabel image">Variant Name</label>



                                                <input type="text" name="varname" class="form-control">



                                            </div>



                                            <div class="col-sm-12">



                                                <table class="table table-bordered">



                                                    <thead>



                                                        <th>



                                                            <center>SL No</center>



                                                        </th>


                                                        <th>



<center>Variant Type</center>



</th>




                                                        <th>



                                                            <center>Variant Name</center>



                                                        </th>



                                                        <th>



                                                            <center>Action</center>



                                                        </th>



                                                    </thead>



                                                    <tbody id="variant_list">



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












                            <div class="modal fade" id="addproductreviews" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <!-- <form method="POST" action="{{url('productimageinsert')}}" enctype="multipart/form-data">@csrf -->

                                <div class="modal-dialog" role="document" style="width:80%;">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title" id="exampleModalLabel"> Product Reviews</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>

                                            </button>

                                        </div>

                                        <div class="modal-body row">

                                            <input type="hidden" id="productid" name="productname">







                                            <div class="col-sm-12">

                                                <table class="table table-bordered">

                                                    <thead>

                                                        <th>

                                                            <center>Sl No</center>

                                                        </th>   
                                                        <th>

                                                            <center>Name</center>

                                                        </th>




                                                        <th>

                                                            <center>Reviews</center>

                                                        </th>

                                                        <!-- <th>

                                                            <center>Action</center>

                                                        </th> -->

                                                    </thead>

                                                    <tbody id="review_list">



                                                    </tbody>

                                                </table>

                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>



                                        </div>

                                    </div>

                                </div>

                                <!-- </form> -->

                            </div>




                            <div class="modal" id="editshopprod_modal" tabindex="-1" role="dialog">

                                <div class="modal-dialog" role="document">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title">Edit Shop Products</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                <span aria-hidden="true">&times;</span>

                                            </button>

                                        </div>

                                        <form method="POST" action="{{url('editshopproducts')}}"
                                            enctype="multipart/form-data" name="shopprod_edit_form" onSubmit="return shopprod_edit_vald();" >

                                            @csrf

                                            <div class="modal-body">



                                                <input type="hidden" name="id" id="shop_edit">

                                                <div class="form-group col-sm-6">

                                                    <label class="exampleModalLabel">Shop Name</label>

                                                    <select name="shopname" class="form-control" id="shopnameedit">

                                                        <option>select shop</option>

                                                        @foreach($sh as $key1)

                                                        <option value="{{$key1->id}}">{{$key1->shop_name}}</option>

                                                        @endforeach

                                                    </select>

                                                </div>

                                                <div class="form-group col-sm-6">

                                                    <label class="exampleModalLabel">Product Name</label>

                                                    <select name="productname" id="productnameedit"
                                                        class="form-control">

                                                        <option>select product</option>

                                                        @foreach($prod as $key1)

                                                        <option value="{{$key1->id}}">{{$key1->product_name}}</option>

                                                        @endforeach

                                                    </select>

                                                </div>

                                                <div class="form-group col-sm-6">

                                                    <label class="col-4 col-form-label">Price</label>



                                                    <input class="form-control" type="text" name="price" id="price" />



                                                </div>

                                                <div class="form-group col-sm-6">

                                                    <label class="col-4 col-form-label">Offer Price</label>



                                                    <input class="form-control" type="text" name="offerprice"
                                                        id="offprice" />



                                                </div>




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

                            <div class="modal" id="deleteShopProducts" tabindex="-1" role="dialog">

                                <div class="modal-dialog shopprodel" role="document">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title">Do you want to Delete ?</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                <span aria-hidden="true">&times;</span>

                                            </button>

                                        </div>



                                        <div class="modal-body">





                                            <div class="form-group col-sm-6">
                                                <form method="POST" action="{{url('deleteShopProducts')}}"
                                                    enctype="multipart/form-data">@csrf

                                                    <input type="hidden" name="shopproduct" id="shoproductdelid">







                                                    <button type="submit" class="btn btn-danger">Delete</button>



                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>

                                            </div>




                                            </form>




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