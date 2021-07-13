@extends('layout.mainlayout')
@section('content')
<style>
   .checkboxes label {
   display: inline-block;
   padding-right: 10px;
   white-space: nowrap;
   }
   .checkboxes input {
   vertical-align: middle;
   }
   .checkboxes label span {
   vertical-align: middle;
   }
</style>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Orders</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   @if(session('success'))
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
                     <h3 class="card-title">Orders</h3>
                     <p align="right">
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-hover mb-0">
                        <thead>
                        <tr>
                                            <th>Sl No</th>
                                            <th>Order Id</th>
                                           
                                            <th>Customer Name</th>
                                          
                                            <th>Total Amount</th>
                                            
                                            <th>Shipping Charge</th>
                                            <th></th>
                                          
									
                                          
                                        </tr>
                        </thead>
                        <tbody>
                           @php
                           $i=1;
                           @endphp
                           @foreach($ord as $key)
                           <tr>
                              <td>{{$i}}</td>
                                 <td>{{$key->order_id}}</td>
                              
                              <td>{{$key->first_name}}</td>
                            
                         
                           
                              
<td></td>

                                            <td>{{$key->shipping_charge}}</td>


                                            <td> <button type="button" data-target="#items" data-toggle="modal"
                                                    class="btn btn-info additems" data-cusid="{{$key->customer_id}}" data-id="{{$key->id}}">
                                                    Items</button></td>


                            
                             
                           </tr>
                           @php
                           $i++;
                           @endphp
                           @endforeach 
                        </tbody>
                        <tfoot>
                           <tr>
                              <!-- <th>
                                 <label for="x"><input type="checkbox"/></label></th> -->
                               
                                            <th>Sl No</th>
                                            <th>Order Id</th>
                                           
                                            <th>Customer Name</th>
                                            <th>Total Amount</th>
                                            <th>Shipping Charge</th>
                                            <th></th>
                                           
											<th></th>
                                            
                                       
                           </tr>
                        </tfoot>
                     </table>
                     <div class="modal fade" id="items" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form method="POST" action="{{url('iteminsert')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-dialog" role="document" style="width:80%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> Item Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"> <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body row">
                                                    <input type="hidden" id="prodid" name="productname">


                                                    <div class="col-sm-6">
                                                        <label>Customer</label>

                                                        <input type="text" name="cust_name" id="cust_name"
                                                            class="form-control" disabled>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Phone Number</label>

                                                        <input type="text" name="phone" id="phno"
                                                            class="form-control" disabled>

                                                    </div>
                                                  
                                                    <div class="col-sm-6">
                                                        <label>Country</label>

                                                        <input type="text" name="country" id="country"
                                                            class="form-control" disabled>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>State</label>

                                                        <input type="text" name="state" id="state"
                                                            class="form-control" disabled>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>City</label>

                                                        <input type="text" name="city" id="city" class="form-control"
                                                        disabled>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Address</label>

                                                        <textarea type="text" name="address" id="shipaddress"
                                                            class="form-control" disabled></textarea>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Pin Code</label>

                                                        <input type="text" name="pincode" id="pin" class="form-control"
                                                        disabled>

                                                    </div>
                                                    <br><br><br>
                                                    <br>

                                                    <div class="col-sm-12">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <th>
                                                                    <center>SL No</center>
                                                                </th>

                                                                <th>
                                                                    <center>Product Name</center>
                                                                </th>
                                                                <th>
                                                                    <center>Quantity</center>
                                                                </th>
                                                                <th>
                                                                    <center>Amount</center>
                                                                </th>
                                                               
                                                            </thead>
                                                            <tbody id="item_list">
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
                                    </form>
                                </div>                  <!-- /.card-body -->
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
</div>
@endsection