@extends('layout.weblayout') @section('content')
@include('layout.webpartials.navbar')
<style>
    .cartlist{
      
    margin-top: 39px;

    }
    .cart-itemlist{
        margin: 42px;
        padding: 15px;
        background-color:#f6f6f6;
        
    }
    </style>
<section class="cartlist">
<form method="POST" action="{{url('addtocartpay')}}" enctype="multipart/form-data">@csrf
    <div class="container">
        <div class="row">
            <div class="col-12" style="border:1px solid #f6f6f6;">
                <div class="cart-itemlist row">
                <div class="col-sm-12"> 
                <h3>Payment Options</h3> 
                 <hr> 
                 <div class="googlepay">
                     <input type="radio" name="paytype"> Google Pay
                     <div class="googlepay1"></div>
                 </div>
                 <div class="wallets">
                     <input type="radio" name="paytype"> Wallet
                     <div class="wallet"></div>
                 </div>
                 <div class="creditcard">
                     <input type="radio" name="paytype"> Credit Card
                     <div class="creditcard1"></div>
                 </div>
                 <div class="netbanking">
                     <input type="radio" class="netinput" name="paytype"> Net Banking
                     <div class="netbanking"></div>
                 </div>
                 <div class="cod">
                     <input type="radio" class="codinput" name="paytype"> Cash On Delivery
                     <div class="cashondelivery" style="display:none;">
                        @if($deladdcheck==null)
                        
                        <textarea class="form-control " id="address" placeholder="Enter delivery address here"></textarea><br>
                        <button type="button" class="btn btn-sm btn-danger adddeladd">Save</button>
                        @else
                        @foreach($deladd as $deladd)
                        <div class="addressdel">
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="deladdress" value="{{$deladd->id}}">&nbsp;{{$deladd->deliveryaddrress}}

                        </div>
                        @endforeach
                        @endif
                     
                     </div>
                 </div>
                </div>

        
                </div>

            </div>


        
    </div>
</form>
</section>
@endsection