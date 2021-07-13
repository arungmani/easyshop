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



            .ftbtn {
                color: #fff;

                box-shadow: none;
                width: 80px;
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



                                <form method="POST" action="{{url('shopproductinsert1')}}" enctype="multipart/form-data"
                                    name="shoprod_form" onSubmit="return shopprod_vald();">

                                    @csrf



                                    <div class="modal-dialog" role="document" style="width:80%;">



                                        <div class="modal-content">



                                            <div class="modal-header">



                                                <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>

                                                &nbsp;&nbsp;
                                                <!-- 
                                                <button type="button" class="btn btn-sm btn-success">ADD SHOP

                                                    PRODUCTS</button>&nbsp;&nbsp; -->

                                                <!-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal"

                                                    data-target="#exampleModal1">ADD CATEGORY PRODUCTS</button> -->



                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"> <span aria-hidden="true">&times;</span>



                                                </button>



                                            </div>



                                            <div class="modal-body row">













                                                <div class="form-group col-sm-6">



                                                    <label class="exampleModalLabel">Product Name</label>



                                                    <select name="productname" class="form-control" id="productname" required>



                                                        <option>select product</option>



                                                        @foreach($prod as $key1)



                                                        <option value="{{$key1->id}}">{{$key1->product_name}}</option>



                                                        @endforeach



                                                    </select>
                                                    <p style="color:#007bff;" data-toggle="modal"
                                                        data-target="#exampleModal1"><i class="fa fa-plus"></i>Add new
                                                        Product</p>



                                                </div>







                                                <div class="form-group col-sm-6">



                                                    <label class="exampleModalLabel">Price *</label>



                                                    <input type="text" name="price" class="form-control" required>



                                                </div>

                                               

                                                <div class="form-group col-sm-6">



                                                    <label class="exampleModalLabel">Offer Price</label>



                                                    <input type="text" name="offprice" class="form-control">



                                                </div>
                                                <div class="form-group col-sm-6">



                                                    <label class="exampleModalLabel">Current Stock *</label>



                                                    <input type="text" name="curstock" class="form-control" required>



                                                </div>

                                                <div class="form-group col-sm-6">



                                                    <label class="exampleModalLabel">MOQ *</label>



                                                    <input type="text" name="moq" class="form-control" value="1" required>



                                                </div>
                                                <div class="form-group col-sm-6">
                                                


                                                <label class="exampleModalLabel">Image *</label>



<input type="file" name="image" class="form-control"
    accept="image/*" required>



                                                </div>
                                                <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Color</label>

                                                    <select name="color" class="form-control" id="color">



                                                            <option value="0">select color</option>



                                                            @foreach($colors as $key1)



                                                            <option value="{{$key1->id}}">{{$key1->varient}}</option>



                                                            @endforeach



                                                    </select>





                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Size</label>



                                                    <select name="size" class="form-control" id="size">



                                                            <option value="0">select size</option>



                                                            @foreach($size as $key1)



                                                            <option value="{{$key1->id}}">{{$key1->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Storage</label>



                                                    <select name="storage" class="form-control" id="storage">



                                                            <option value="0">select storage</option>



                                                            @foreach($storage as $key3)



                                                            <option value="{{$key3->id}}">{{$key3->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">RAM</label>



                                                    <select name="ram" class="form-control" id="ram">



                                                            <option value="0">select RAM</option>



                                                            @foreach($ram as $key4)



                                                            <option value="{{$key4->id}}">{{$key4->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">inch</label>



                                                    <select name="inch" class="form-control" id="inch">



                                                            <option value="0">select Inch</option>



                                                            @foreach($inch as $key5)



                                                            <option value="{{$key5->id}}">{{$key5->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">weight</label>



                                                    <select name="weight" class="form-control" id="weight">



                                                            <option value="0">select weight</option>



                                                            @foreach($weight as $key6)



                                                            <option value="{{$key6->id}}">{{$key6->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">display</label>



                                                    <select name="display" class="form-control" id="display">



                                                            <option value="0">select display</option>



                                                            @foreach($display as $key7)



                                                            <option value="{{$key7->id}}">{{$key7->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">lens</label>



                                                    <select name="lens" class="form-control" id="lens">



                                                            <option value="0">select lens</option>



                                                            @foreach($lens as $key8)



                                                            <option value="{{$key8->id}}">{{$key8->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">type</label>



                                                    <select name="type" class="form-control" id="type">



                                                            <option value="0">select type</option>



                                                            @foreach($type as $key9)



                                                            <option value="{{$key9->id}}">{{$key9->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">material</label>



                                                    <select name="material" class="form-control" id="material">



                                                            <option value="0">select material</option>



                                                            @foreach($material as $key10)



                                                            <option value="{{$key10->id}}">{{$key10->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>

                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Speed</label>



                                                    <select name="speed" class="form-control" id="speed">



                                                            <option value="0">select speed</option>



                                                            @foreach($speed as $key11)



                                                            <option value="{{$key11->id}}">{{$key11->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">beamwidth</label>



                                                    <select name="beamwidth" class="form-control" id="beamwidth">



                                                            <option value="0">select beamwidth</option>



                                                            @foreach($beamwidth as $key12)



                                                            <option value="{{$key12->id}}">{{$key12->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">headshape</label>



                                                    <select name="headshape" class="form-control" id="headshape">



                                                            <option value="0">select headshape</option>



                                                            @foreach($headshape as $key13)



                                                            <option value="{{$key13->id}}">{{$key13->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                     
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Cover</label>



                                                    <select name="Cover" class="form-control" id="Cover">



                                                            <option value="0">select Cover</option>



                                                            @foreach($Cover as $key14)



                                                            <option value="{{$key14->id}}">{{$key14->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                     
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Made of</label>



                                                    <select name="Madeof" class="form-control" id="Madeof">



                                                            <option value="0">select Madeof</option>



                                                            @foreach($Madeof as $key15)



                                                            <option value="{{$key15->id}}">{{$key15->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                     
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Inclusions</label>



                                                    <select name="Inclusions" class="form-control" id="Inclusions">



                                                            <option value="0">select Inclusions</option>



                                                            @foreach($Inclusions as $key16)



                                                            <option value="{{$key16->id}}">{{$key16->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">capacity</label>



                                                    <select name="capacity" class="form-control" id="capacity">



                                                            <option value="0">select capacity</option>



                                                            @foreach($capacity as $key17)



                                                            <option value="{{$key17->id}}">{{$key17->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Language</label>



                                                    <select name="Language" class="form-control" id="Language">



                                                            <option value="0">select Language</option>



                                                            @foreach($Language as $key18)



                                                            <option value="{{$key18->id}}">{{$key18->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Binding</label>



                                                    <select name="Binding" class="form-control" id="Binding">



                                                            <option value="0">select Binding</option>



                                                            @foreach($Binding as $key19)



                                                            <option value="{{$key19->id}}">{{$key19->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                     
                                                     
                                                
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Publisher</label>



                                                    <select name="Publisher" class="form-control" id="Publisher">



                                                            <option value="0">select Publisher</option>



                                                            @foreach($Publisher as $key20)



                                                            <option value="{{$key20->id}}">{{$key20->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Genre</label>



                                                    <select name="Genre" class="form-control" id="Genre">



                                                            <option value="0">select Genre</option>



                                                            @foreach($Genre as $key21)



                                                            <option value="{{$key21->id}}">{{$key21->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">ISBN</label>



                                                    <select name="ISBN" class="form-control" id="ISBN">



                                                            <option value="0">select ISBN</option>



                                                            @foreach($ISBN as $key22)



                                                        <option value="{{$key22->id}}">{{$key22->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Pages</label>



                                                    <select name="Pages" class="form-control" id="Pages">



                                                            <option value="0">select Pages</option>



                                                            @foreach($ISBN as $key23)



                                                            <option value="{{$key23->id}}">{{$key23->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">quantity</label>



                                                    <select name="quantity" class="form-control" id="quantity">



                                                            <option value="0">select quantity</option>



                                                            @foreach($quantity as $key24)



                                                            <option value="{{$key24->id}}">{{$key24->varient}}</option>



                                                            @endforeach



                                                    </select>



                                                    </div>
                                                    <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">shade</label>



                                                    <select name="shade" class="form-control" id="shade">



                                                            <option value="0">select shade</option>



                                                            @foreach($shade as $key25)



                                                            <option value="{{$key25->id}}">{{$key25->varient}}</option>



                                                            @endforeach



                                                    </select>



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

                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">



                                <form method="POST" action="{{url('catproductinsert1')}}" enctype="multipart/form-data"
                                    name="catprod_vald" onSubmit="return validate_form_catprod();">

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



                                                    <select name="subsubcat" class="form-control" id="subsubcategory" required>







                                                    </select>



                                                </div>







                                                <div class="form-group col-sm-6">



                                                    <label class="exampleModalLabel">Product Name</label>



                                                    <input type="text" name="productname" class="form-control" required>



                                                </div>







                                                <div class="form-group col-sm-12">



                                                    <label class="exampleModalLabel">Image</label>



                                                    <input type="file" name="image" class="form-control"
                                                        accept="image/*" required>



                                                </div>







                                                <!-- <div class="form-group col-sm-12">



														<label class="exampleModalLabel">Rating</label><br>



														<input type="radio" name="rating" value="1"  >1	&nbsp;



                                                        <input type="radio" name="rating" value="2"  >2	&nbsp;



                                                        <input type="radio" name="rating" value="3"  >3	&nbsp;



                                                        <input type="radio" name="rating" value="4"  >4	&nbsp;



                                                        <input type="radio" name="rating" value="5"  >5	&nbsp;



													</div> -->



                                                <!-- <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Discount</label>



                                                    <input type="text" name="discount" class="form-control"  >



                                                </div> -->



                                                <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Price</label>



                                                    <input type="text" name="price" class="form-control" required>



                                                </div>



                                                <div class="form-group col-sm-3">



                                                    <label class="exampleModalLabel">Offer Price</label>



                                                    <input type="text" name="offerprice" class="form-control" >



                                                </div>

                                                <div class="form-group col-sm-3">

                                                    <label class="exampleModalLabel">MOQ</label>

                                                    <input type="text" name="moq" class="form-control" required>

                                                </div>
                                                <div class="form-group col-sm-3">

                                                    <label class="exampleModalLabel"> Current Stock</label>

                                                    <input type="text" name="curstock" class="form-control" required>

                                                </div>



                                                <div class="form-group col-sm-12">



                                                    <label class="exampleModalLabel">Description</label>



                                                    <textarea class="form-control" name="desc" required></textarea>



                                                </div>



                                                <div class="form-group col-sm-3">



                                                    <input type="checkbox" value="1" name="newstatus"> New product



                                                </div>


                                                <div class="form-group col-sm-3">



<label class="exampleModalLabel">Color</label>

<select name="color" class="form-control" id="color">



        <option value="0">select color</option>



        @foreach($colors as $key1)



        <option value="{{$key1->id}}">{{$key1->varient}}</option>



        @endforeach



</select>





</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">Size</label>



<select name="size" class="form-control" id="size">



        <option value="0">select size</option>



        @foreach($size as $key1)



        <option value="{{$key1->id}}">{{$key1->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">Storage</label>



<select name="storage" class="form-control" id="storage">



        <option value="0">select storage</option>



        @foreach($storage as $key3)



        <option value="{{$key3->id}}">{{$key3->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">RAM</label>



<select name="ram" class="form-control" id="ram">



        <option value="0">select RAM</option>



        @foreach($ram as $key4)



        <option value="{{$key4->id}}">{{$key4->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">inch</label>



<select name="inch" class="form-control" id="inch">



        <option value="0">select Inch</option>



        @foreach($inch as $key5)



        <option value="{{$key5->id}}">{{$key5->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">weight</label>



<select name="weight" class="form-control" id="weight">



        <option value="0">select weight</option>



        @foreach($weight as $key6)



        <option value="{{$key6->id}}">{{$key6->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">display</label>



<select name="display" class="form-control" id="display">



        <option value="0">select display</option>



        @foreach($display as $key7)



        <option value="{{$key7->id}}">{{$key7->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">lens</label>



<select name="lens" class="form-control" id="lens">



        <option value="0">select lens</option>



        @foreach($lens as $key8)



        <option value="{{$key8->id}}">{{$key8->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">type</label>



<select name="type" class="form-control" id="type">



        <option value="0">select type</option>



        @foreach($type as $key9)



        <option value="{{$key9->id}}">{{$key9->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">material</label>



<select name="material" class="form-control" id="material">



        <option value="0">select material</option>



        @foreach($material as $key10)



        <option value="{{$key10->id}}">{{$key10->varient}}</option>



        @endforeach



</select>



</div>

<div class="form-group col-sm-3">



<label class="exampleModalLabel">Speed</label>



<select name="speed" class="form-control" id="speed">



        <option value="0">select speed</option>



        @foreach($speed as $key11)



        <option value="{{$key11->id}}">{{$key11->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">beamwidth</label>



<select name="beamwidth" class="form-control" id="beamwidth">



        <option value="0">select beamwidth</option>



        @foreach($beamwidth as $key12)



        <option value="{{$key12->id}}">{{$key12->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">headshape</label>



<select name="headshape" class="form-control" id="headshape">



        <option value="0">select headshape</option>



        @foreach($headshape as $key13)



        <option value="{{$key13->id}}">{{$key13->varient}}</option>



        @endforeach



</select>



</div>
 
<div class="form-group col-sm-3">



<label class="exampleModalLabel">Cover</label>



<select name="Cover" class="form-control" id="Cover">



        <option value="0">select Cover</option>



        @foreach($Cover as $key14)



        <option value="{{$key14->id}}">{{$key14->varient}}</option>



        @endforeach



</select>



</div>
 
<div class="form-group col-sm-3">



<label class="exampleModalLabel">Made of</label>



<select name="Madeof" class="form-control" id="Madeof">



        <option value="0">select Madeof</option>



        @foreach($Madeof as $key15)



        <option value="{{$key15->id}}">{{$key15->varient}}</option>



        @endforeach



</select>



</div>
 
<div class="form-group col-sm-3">



<label class="exampleModalLabel">Inclusions</label>



<select name="Inclusions" class="form-control" id="Inclusions">



        <option value="0">select Inclusions</option>



        @foreach($Inclusions as $key16)



        <option value="{{$key16->id}}">{{$key16->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">capacity</label>



<select name="capacity" class="form-control" id="capacity">



        <option value="0">select capacity</option>



        @foreach($capacity as $key17)



        <option value="{{$key17->id}}">{{$key17->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">Language</label>



<select name="Language" class="form-control" id="Language">



        <option value="0">select Language</option>



        @foreach($Language as $key18)



        <option value="{{$key18->id}}">{{$key18->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">Binding</label>



<select name="Binding" class="form-control" id="Binding">



        <option value="0">select Binding</option>



        @foreach($Binding as $key19)



        <option value="{{$key19->id}}">{{$key19->varient}}</option>



        @endforeach



</select>



</div>
 
 

<div class="form-group col-sm-3">



<label class="exampleModalLabel">Publisher</label>



<select name="Publisher" class="form-control" id="Publisher">



        <option value="0">select Publisher</option>



        @foreach($Publisher as $key20)



        <option value="{{$key20->id}}">{{$key20->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">Genre</label>



<select name="Genre" class="form-control" id="Genre">



        <option value="0">select Genre</option>



        @foreach($Genre as $key21)



        <option value="{{$key21->id}}">{{$key21->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">ISBN</label>



<select name="ISBN" class="form-control" id="ISBN">



        <option value="0">select ISBN</option>



        @foreach($ISBN as $key22)



    <option value="{{$key22->id}}">{{$key22->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">Pages</label>



<select name="Pages" class="form-control" id="Pages">



        <option value="0">select Pages</option>



        @foreach($ISBN as $key23)



        <option value="{{$key23->id}}">{{$key23->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">quantity</label>



<select name="quantity" class="form-control" id="quantity">



        <option value="0">select quantity</option>



        @foreach($quantity as $key24)



        <option value="{{$key24->id}}">{{$key24->varient}}</option>



        @endforeach



</select>



</div>
<div class="form-group col-sm-3">



<label class="exampleModalLabel">shade</label>



<select name="shade" class="form-control" id="shade">



        <option value="0">select shade</option>



        @foreach($shade as $key25)



        <option value="{{$key25->id}}">{{$key25->varient}}</option>



        @endforeach



</select>



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

                        </div>



                        <!-- /.card-header -->



                        <div class="card-body">



                            <table id="example1" class="table table-bordered table-striped">



                                <thead>



                                    <tr>



                                        <th>id</th>





                                        <th>Product Name</th>

                                        <th>Actual Price</th>





                                        <th>Offer Price</th>

                                        <th>Stock</th>

                                        <th>Commission</th>

                                        <th>Shipping Cost</th>

                                        <th></th>











                                        <th>Action</th>



                                    </tr>



                                </thead>



                                <tbody id="shopro">@php $i=1; @endphp @foreach($products as $key)



                                    <tr>



                                        <td>{{$i}}</td>





                                        <td>{{$key->product_name}}</td>





                                        <td>{{$key->price}}</td>

                                        <td>{{$key->offer_price}}</td>

                                        @if($key->stock>="1")

                                        <th>{{$key->stock}}</th>

                                        @else

                                        <th>No Stock</th>

                                        @endif


                                        <th></th>
                                        <th>Depends on your carrier</th>

                                        <td align="center">



                                            <button type="button" data-target="#addproductimages" data-toggle="modal"
                                                class="btn btn-info btn-sm ftbtn addproductimage"
                                                data-id="{{$key->id}}">



                                                + Images</button>
                                            <br><br>
                                            <button type="button" data-target="#addproductreviews" data-toggle="modal"
                                                class="btn btn-danger btn-sm ftbtn addproductreview"
                                                data-id="{{$key->id}}">



                                                Reviews</button>

                                            <br><br>

                                            <button type="button" data-target="#addproductfeatures1" data-toggle="modal"
                                                class="btn btn-success btn-sm ftbtn addproductfeature1"
                                                data-shid="{{$key->shopid}}" data-id="{{$key->product_id}}">



                                                + Features</button>

                                            <br><br>
                                            <!-- <button type="button" data-target="#addproduct_variant" data-toggle="modal"
                                                class="btn btn-warning btn-sm ftbtn addproductvariant"
                                                data-id="{{$key->id}}">

                                                + Variants</button> -->




                                        </td>



                                        <td> <i class="fa fa-edit edit_shopproduct" aria-hidden="true"
                                                data-toggle="modal" data-id="{{$key->id}}"></i>





                                            @if($key->deleted_status=="0")
                                            <button class="btn btn-success btn-sm deleteShopProducts"
                                                data-target="#deleteShopProducts" aria-hidden="true" data-toggle="modal"
                                                data-id="{{$key->id}}">Active</button>

                                            @else
                                            <button class="btn btn-danger btn-sm deleteShopProducts"
                                                data-target="#deleteShopProducts" aria-hidden="true" data-toggle="modal"
                                                data-id="{{$key->id}}">Inactive</button>
                                            @endif
                                            <!-- <td>@if($key->stock>="1")

                                            <a onclick="return checkStatus()" href="ChangeProductsStatus/{{ $key->id }}"

                                                class="btn btn-success">Active</a>

                                            @else

                                            <a onclick="return checkStatus()" href="ChangeProductsStatus/{{ $key->id }}"

                                                class="btn btn-danger">Inactive</a>

                                            @endif

                                        </td>



                                        -->



                                    </tr>@php $i++; @endphp @endforeach

                                </tbody>



                                <tfoot>



                                    <tr>







                                        <th>Sl No</th>



                                        <th>Product Name</th>

                                        <th>Actual Price</th>



                                        <th>Offer Price</th>



                                        <th>Stock</th>

                                        <th>Commission</th>
                                        <th>Shipping Cost</th>
                                        <th></th>

                                        <th>Action</th>



                                    </tr>



                                </tfoot>



                            </table>















                            <div class="modal fade" id="addproductimages" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">



                                <form method="POST" action="{{url('productimageinsert')}}" enctype="multipart/form-data"
                                    name="prodimage_form" onSubmit="return addprod_image_vald();">@csrf



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
                                                        accept="image/*" multiple>















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



                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
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

                                                <div class="form-group col-sm-6">



<label class="exampleModalLabel image">Stock</label>



<input type="text" name="stockvariantt" class="form-control">



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



<center>Stock</center>



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



                                        <form method="POST" action="{{url('editshopproducts1')}}"
                                            enctype="multipart/form-data" name="shopprod_edit_form"
                                            onSubmit="return shopprod_edit_vald();">



                                            @csrf



                                            <div class="modal-body">







                                                <input type="hidden" name="id" id="shop_edit">







                                                <div class="form-group col-sm-6">



                                                    <label class="exampleModalLabel">Product Name</label>



                                                    <select name="productname" id="productnameedit"
                                                        class="form-control" >



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


                                                <div class="form-group col-sm-6">



                                                    <label class="col-4 col-form-label">Current Stock</label>







                                                    <input class="form-control" type="text" name="curstock"
                                                        id="curstock" />







                                                </div>


                                                <div class="form-group col-sm-6">



                                                    <label class="col-4 col-form-label">MOQ</label>







                                                    <input class="form-control" type="text" name="moq" id="moq" />







                                                </div>
                                                

                                     <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">Color</label>

                                            <select name="color" class="form-control color" id="color">



                                                    <option value="0">select color</option>



                                                    @foreach($colors as $key1)



                                                    <option value="{{$key1->id}}" >{{$key1->varient}}</option>



                                                    @endforeach



                                            </select>





                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">Size</label>



                                            <select name="size" class="form-control" id="size">



                                                    <option value="0">select size</option>



                                                    @foreach($size as $key1)



                                                    <option value="{{$key1->id}}">{{$key1->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">Storage</label>



                                            <select name="storage" class="form-control" id="storage">



                                                    <option value="0">select storage</option>



                                                    @foreach($storage as $key3)



                                                    <option value="{{$key3->id}}">{{$key3->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">RAM</label>



                                            <select name="ram" class="form-control" id="ram">



                                                    <option value="0">select RAM</option>



                                                    @foreach($ram as $key4)



                                                    <option value="{{$key4->id}}">{{$key4->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">inch</label>



                                            <select name="inch" class="form-control" id="inch">



                                                    <option value="0">select Inch</option>



                                                    @foreach($inch as $key5)



                                                    <option value="{{$key5->id}}">{{$key5->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">weight</label>



                                            <select name="weight" class="form-control" id="weight">



                                                    <option value="0">select weight</option>



                                                    @foreach($weight as $key6)



                                                    <option value="{{$key6->id}}">{{$key6->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">display</label>



                                            <select name="display" class="form-control" id="display">



                                                    <option value="0">select display</option>



                                                    @foreach($display as $key7)



                                                    <option value="{{$key7->id}}">{{$key7->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">lens</label>



                                            <select name="lens" class="form-control" id="lens">



                                                    <option value="0">select lens</option>



                                                    @foreach($lens as $key8)



                                                    <option value="{{$key8->id}}">{{$key8->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">type</label>



                                            <select name="type" class="form-control" id="type">



                                                    <option value="0">select type</option>



                                                    @foreach($type as $key9)



                                                    <option value="{{$key9->id}}">{{$key9->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">material</label>



                                            <select name="material" class="form-control" id="material">



                                                    <option value="0">select material</option>



                                                    @foreach($material as $key10)



                                                    <option value="{{$key10->id}}">{{$key10->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>

                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">Speed</label>



                                            <select name="speed" class="form-control" id="speed">



                                                    <option value="0">select speed</option>



                                                    @foreach($speed as $key11)



                                                    <option value="{{$key11->id}}">{{$key11->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">beamwidth</label>



                                            <select name="beamwidth" class="form-control" id="beamwidth">



                                                    <option value="0">select beamwidth</option>



                                                    @foreach($beamwidth as $key12)



                                                    <option value="{{$key12->id}}">{{$key12->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">headshape</label>



                                            <select name="headshape" class="form-control" id="headshape">



                                                    <option value="0">select headshape</option>



                                                    @foreach($headshape as $key13)



                                                    <option value="{{$key13->id}}">{{$key13->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">Cover</label>



                                            <select name="Cover" class="form-control" id="Cover">



                                                    <option value="0">select Cover</option>



                                                    @foreach($Cover as $key14)



                                                    <option value="{{$key14->id}}">{{$key14->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">Made of</label>



                                            <select name="Madeof" class="form-control" id="Madeof">



                                                    <option value="0">select Madeof</option>



                                                    @foreach($Madeof as $key15)



                                                    <option value="{{$key15->id}}">{{$key15->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">Inclusions</label>



                                            <select name="Inclusions" class="form-control" id="Inclusions">



                                                    <option value="0">select Inclusions</option>



                                                    @foreach($Inclusions as $key16)



                                                    <option value="{{$key16->id}}">{{$key16->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">capacity</label>



                                            <select name="capacity" class="form-control" id="capacity">



                                                    <option value="0">select capacity</option>



                                                    @foreach($capacity as $key17)



                                                    <option value="{{$key17->id}}">{{$key17->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">Language</label>



                                            <select name="Language" class="form-control" id="Language">



                                                    <option value="0">select Language</option>



                                                    @foreach($Language as $key18)



                                                    <option value="{{$key18->id}}">{{$key18->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">Binding</label>



                                            <select name="Binding" class="form-control" id="Binding">



                                                    <option value="0">select Binding</option>



                                                    @foreach($Binding as $key19)



                                                    <option value="{{$key19->id}}">{{$key19->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            
                                            

                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">Publisher</label>



                                            <select name="Publisher" class="form-control" id="Publisher">



                                                    <option value="0">select Publisher</option>



                                                    @foreach($Publisher as $key20)



                                                    <option value="{{$key20->id}}">{{$key20->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">Genre</label>



                                            <select name="Genre" class="form-control" id="Genre">



                                                    <option value="0">select Genre</option>



                                                    @foreach($Genre as $key21)



                                                    <option value="{{$key21->id}}">{{$key21->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">ISBN</label>



                                            <select name="ISBN" class="form-control" id="ISBN">



                                                    <option value="0">select ISBN</option>



                                                    @foreach($ISBN as $key22)



                                                <option value="{{$key22->id}}">{{$key22->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">Pages</label>



                                            <select name="Pages" class="form-control" id="Pages">



                                                    <option value="0">select Pages</option>



                                                    @foreach($ISBN as $key23)



                                                    <option value="{{$key23->id}}">{{$key23->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">quantity</label>



                                            <select name="quantity" class="form-control" id="quantity">



                                                    <option value="0">select quantity</option>



                                                    @foreach($quantity as $key24)



                                                    <option value="{{$key24->id}}">{{$key24->varient}}</option>



                                                    @endforeach



                                            </select>



                                            </div>
                                            <div class="form-group col-sm-3">



                                            <label class="exampleModalLabel">shade</label>



                                            <select name="shade" class="form-control" id="shade">



                                                    <option value="0">select shade</option>



                                                    @foreach($shade as $key25)



                                                    <option value="{{$key25->id}}">{{$key25->varient}}</option>



                                                    @endforeach



                                            </select>
                                            </div>
                                                                                            <!-- <div class="form-group col-sm-6">



                                                    <label class="col-4 col-form-label">Discount</label>







                                                    <input class="form-control" type="text" name="discount"

                                                        id="dscnt" />







                                                </div>



 -->















                                            </div>



                                            <div class="modal-footer">



                                                <button type="submit" class="btn btn-primary">Save changes</button>



                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal" id="btnClosePopup">Close</button>



                                            </div>



                                        </form>



                                    </div>



                                </div>



                            </div>



                            <div class="modal" id="deleteShopProducts" tabindex="-1" role="dialog">



                                <div class="modal-dialog shopprodel" role="document">



                                    <div class="modal-content">



                                        <div class="modal-header">



                                            <h5 class="modal-title">Do you want to Change the Status ?</h5>



                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                                                <span aria-hidden="true">&times;</span>



                                            </button>



                                        </div>







                                        <div class="modal-body">











                                            <div class="form-group col-sm-6">

                                                <form method="POST" action="{{url('deleteShopProducts')}}"
                                                    enctype="multipart/form-data">@csrf



                                                    <input type="hidden" name="shopproduct" id="shoproductdelid">















                                                    <button type="submit" class="btn btn-danger">Yes</button>







                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">No</button>



                                            </div>









                                            </form>









                                        </div>











                                    </div>







                                </div>



                            </div>



                        </div>



                        <div class="modal fade" id="addproductfeatures1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">



                            <form method="POST" action="{{url('addproductfeatures1')}}" enctype="multipart/form-data"
                                name="feature_form" onSubmit="return feature_form_vald();">@csrf



                                <div class="modal-dialog" role="document" style="width:80%;">



                                    <div class="modal-content">



                                        <div class="modal-header">



                                            <h5 class="modal-title" id="exampleModalLabel"> Add Product Features

                                            </h5>



                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>



                                            </button>



                                        </div>



                                        <div class="modal-body row">



                                            <input type="hidden" id="profeatid" name="featname">

                                            <input type="hidden" id="profeatid1" name="shopname">





                                            <div class="form-group col-sm-12">



                                                <label class="exampleModalLabel image">Features</label>



                                                <input type="text" name="features" class="form-control" required>















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



                                                    <tbody id="feature_list1">



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


    <div class="modal" tabindex="-1" role="dialog" id="modalvarientstock">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">update Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
       <form method="POST" action="{{url('updatestockvarient')}}" enctype="multipart/form-data" name="shop_form" onSubmit="return shop_form_vald();">
       @csrf
       <div class="form-group col-sm-12">
       <input type="hidden" name="productvarientid" id="productvarint">
<label class="exampleModalLabel">stock</label>

<input type="text"  name="stock" id="stockvarient" class="form-control" >

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



    <!-- /.content -->



</div>@endsection