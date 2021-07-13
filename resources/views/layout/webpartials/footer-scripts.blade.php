<script src="{{asset('web/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!--<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>-->
<!-- Popper JS -->
<script src="{{asset('web/assets/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('web/assets/js/bootstrap.min.js')}}"></script>
<!-- Plugins JS -->
<script src="{{asset('web/assets/js/plugins.js')}}"></script>
<!-- Ajax Mail -->
<script src="{{asset('web/assets/js/ajax-mail.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('web/assets/js/main.js')}}"></script>

<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('js/jquery.validate.min.js')}}"></script>



<script src="{{asset('sweetalert2/sweetalert2.min.js')}}"></script>

<script src="{{asset('toastr/toastr.min.js')}}"></script>


<script>
$('.display').on('click',function(){

var id=$(this).data('id');

if(id==1){


$('#display_product').addClass('active');
$('#display_shop').removeClass('active');
}else{
$('#display_product').removeClass('active');
$('#display_shop').addClass('active');
}
});
$(document).ready(function(){
    $("a.submit").click(function(){
        document.getElementById("myform").submit();
    });
    var userId = {!! auth()->check()?auth()->user()->id:0; !!};
     var stored = JSON.parse(localStorage.getItem("cart"));
     if(stored.length != 0){
                var count = stored.length;
                var cartItemNo = 0;
                if(userId != 0){
                    for(var i= 0;i<count;i++){
                    if(stored[i]["userId"] == 0){
                        stored[i]["userId"] = userId;
                    }
                }
                 localStorage.setItem("cart", JSON.stringify(stored));
                }
                for(var i= 0;i<count;i++){
                    if(userId == stored[i]["userId"]){
                        cartItemNo = cartItemNo+1;
                    }
                }
                $('#cartTotal').html(cartItemNo);
     }

});


$('.modalproduct_details').on('click',function(){
    var id=$(this).data('id');

    if(id){
        $.ajax({
        type: "POST",

        url: "{{ route('shopproductdetailsfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {

        console.log(res);
        var obj=JSON.parse(res)

        $('#heading').html(obj.product_name);
        $('.old-price').html('$'+obj.price+'');
        $('.new-price').html('$'+obj.offer_price+'');
        $('#descriptionval').html(obj.description);

        $('#banner_edit').val(obj.id);

        },
        });
//         $.ajax({
//     type: "POST",
//     dataType: "json",
//     url: "{{ route('shop_productimagesfetch') }}",
//     data: {
//         "_token": "{{ csrf_token() }}",
//         id: id
//     },
//     success: function(res) {

//         console.log(res);
//         $('#modal_lg_iamges').empty();
//         var html_images = "";
//         var html_smimages="";
//         $.each(res, function(key, value) {
//             html_images += '<div class="lg-image"><img src="/admin/images/'+value.product_images+'" alt="product image"></div>';
//             html_smimages+=' <div class="sm-image"><img src="/admin/images/'+value.product_images+'" alt="product image thumb"></div>';
//         });
//         $('.product-details-images43').append(html_images);
//         $('.product-details-thumbs232').append(html_smimages);
//     },
// });
    }
//alert();
});
//$('#cartTotal').html(userLoggedId!=0?JSON.parse(localStorage.getItem("cart"))?JSON.parse(localStorage.getItem("cart")).length:0:0);
$('#product_description_id').on('click','.add-cart', function(event) {
    event.preventDefault();
    var stock = $('#maxProductStock').val();
    var amountvalue=$('#amountvalue').val();
   if(amountvalue==0){
   
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

  
      
    toastr.error('Plaese select Quantity')
   
  });
  
   }else{
   
    if(parseInt(amountvalue) > parseInt(stock)) {
        $('#stocknotificationmodal').modal('show');
        $('#stocknotif').html(' No Stock Available ' + stock);
    } else {
        var moqvalue=$('#moqvalue').val();
        var amountvalue=$('#amountvalue').val();


	    var productId = $(this).data('productidd');
	    var productTitle = $(this).data('productname');
	    var productImage = $(this).data('image');
	    var productrate = $(this).data('rate');
        var shop=$(this).data('shopid');
        var proid=$(this).data('proid');
        var catid=$(this).data('catid');
        var colorid=$(this).data('color');
       



        var userId = {!! auth()->check()?auth()->user()->id:0; !!};
        var moq=$('#moqvalue').val();
        var qnty1 = $('#amountvalue').val();
        if(parseInt(moq)<=parseInt(qnty1)){
            var qnty = $('#amountvalue').val();

        }else{
            var qnty = $('#moqvalue').val();
            $('#moqnotificationmodal').modal('show');
            $('#moqnotif').html(moq+ ' Minimum Order Quantity');
        }


	    var status=false;
        var index;
	    if(JSON.parse(localStorage.getItem("cart")) != null){
            var stored = JSON.parse(localStorage.getItem("cart"));
	    }
	    else{
	        var stored = [];

	    }
	    if(stored.length != 0){
	        var count = stored.length;
            for(var i = 0;i<count;i++){
                if(productId == parseInt(stored[i]['productId'])){
                        status = true;
                        index = i;
                }
            }
            console.log(status);
            if(status == false){
                var cartArrayDet = {productId,productTitle,qnty,productImage,productrate,userId,moq,shop,proid,catid,colorid};
                stored.push(cartArrayDet);
                $('#cartsuccess').modal('show');
            } else {
                stored[index] =  {productId,productTitle,qnty,productImage,productrate,userId,moq,shop,proid,catid,colorid};   
                $('#cartalreadyadded').modal('show');       
            }
	    }
	    else{
            var cartArrayDet = {productId,productTitle,qnty,productImage,productrate,userId,moq,shop,proid,catid,colorid};
            stored.push(cartArrayDet);
            $('#cartsuccess').modal('show');
	    }
        localStorage.setItem("cart", JSON.stringify(stored));
        $('#cartTotal').html(stored.length);
      
    }
   }
   
});




           $('.cartview').on('click',function(){
            var stored = JSON.parse(localStorage.getItem("cart"));console.log(stored);
            var html ='';
            var total = 0;
            var cartItemNo = 0;
            var userId = {!! auth()->check()?auth()->user()->id:0 !!};
            if(stored.length != 0 ){
                var count = stored.length;
                for(var i= 0;i<count;i++){
                    if(userId == stored[i]["userId"]){
                  html+=`<li class="mini-cart-item">
													<div class="mini-cart-product-img">
														<a href="#"><img src="${stored[i]["productImage"]}">
														</a> <span class="product-quantity">1x</span>
													</div>
													<div class="mini-cart-product-desc">
                                                    <input type="hidden" value="${stored[i]["productId"]}" name="pid[]">
                                                    <input type="hidden" value="${stored[i]["qnty"]}" name="qty[]">
                                                    <input type="hidden" value="${stored[i]["shop"]}" name="shop[]">
                                                    <input type="hidden" value="${stored[i]["proid"]}" name="proid[]">
                                                    <input type="hidden" value="${stored[i]["catid"]}" name="catid[]">
                                                    <input type="hidden" value="${stored[i]["colorid"]}" name="colorid[]">

                                                    <input type="hidden" value="${stored[i]["moq"]}" name="moq[]">
                                                        <h3 class="ProductID" style="display:none;">${stored[i]["productId"]}</h3>
                                                        <h3 class="product_qty" style="display:none;">${stored[i]["qnty"]}</h3>
														<h3><a href="#"  value="${stored[i]["productId"]}">${stored[i]["productTitle"]}</a></h3>
														<div class="price-box"> <span class="new-price " value="${stored[i]["productrate"]}">${stored[i]["productrate"]} AED</span>
														</div>
														<div class="size" ><span id="productQty_${stored[i]["productId"]}">QTY: ${stored[i]["qnty"]}</span>

                                                        </div>
													</div>
													<div class="remove-from-cart"> <a href="#" title="Remove"><i data-productid="${stored[i]["productId"]}" class="product-remove fa fa-trash"></i></a>
													</div>
												</li>`;
                                                total+= stored[i]["qnty"] * stored[i]["productrate"];
                                                cartItemNo = cartItemNo+1;
                    }

               }
               $('#cart-items').html(html);
               $('#grand-total').html(total+' AED');
               $('#amounttol').val(total);
               $('#cartTotal').html(cartItemNo);
            } else{
               html+='';
               $('#cart-items').html(html);
               $('#grand-total').html('0 AED');
               $('#amounttol').val(total);
               $('#cartTotal').html('0');
               $('#cartTotal').html(0);
           }
           });

           $('#cart-items').on('click','.product-remove',function(){

            var result = confirm("Want to delete?");
            if (result) {
                var productId = $(this).data('productid');

                //     var price=$('#subtol_'+productId).val();
                //     //var qty=$('#pqty').val();
                //     var garndamount=$('#subfinaltotal').val();
                // // var subamount=parseInt(price)*parseInt(qty);
                //     var balance=parseInt(garndamount)-parseInt(price);
                //     $('#subfinaltotal').val(balance);
                //     $('#finalsubtotal').html('$'+balance);
                //     $('#grandfinaltol').html('$'+balance);
                //     $("#row_"+productId).remove();
               
                        var stored = JSON.parse(localStorage.getItem("cart"));
                        var newData = [];console.log(stored.length);
                        if(stored.length != 0){
                        var count = stored.length;
                        for(var i = 0;i<count;i++){
                            if(productId == parseInt(stored[i]['productId'])){

                            }
                            else{
                                newData.push(stored[i]);
                            }
                        }
                    localStorage.setItem("cart", JSON.stringify(newData));
                    
                    location.reload(true);
                   
                        }

            }

        });

        $('.qtybutton').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        var target=$('#amountvalue')

        var current = parseFloat($(target).val());

        });
        $('#cart-items').on('click','.add_qnty',function(){

                    var rate = parseInt($(this).data('price'));
                    var id = parseInt($(this).data('productid'));
                    var qnty = parseInt($('#numberCol_'+id).val());
                    var amount=$('#amounttol').val();

                    var total = 0;
                    $('.data-qnty'+id).html(qnty);
                    $('.totalAmount'+id).html((qnty)*rate+' AED');
                    $('.totalAmount'+id).attr("data-value",(qnty)*rate);
                    $('#productQty_'+id).html('QTY :'+qnty);

                    $('.product-amount').each(function(i){
                        total+= parseInt($(this).attr('data-value'));
                    });
                    $('#grand-total').html(total);
                    $('#grand-total').attr("data-value",total);
                    $('#final_amount').val(total);
                    var stored = JSON.parse(localStorage.getItem("cart"));
                    if(stored.length != 0){
                    var count = stored.length;
                    for(var i = 0;i<count;i++){
                        if(id == parseInt(stored[i]['productId'])){
                            stored[i]['qnty'] = qnty;
                        }
                    }
                localStorage.setItem("cart", JSON.stringify(stored));
                    }

                });

                $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        });

        $('.place-order').on('click',function(){
            var name=$('#shname').val();
            var country=$('#shcountry').val();
            var address=$('#shadd').val();
            var apartment=$('#shapart').val();
            var city=$('#shcity').val();
            var state=$('#shstate').val();
            var pincode=$('#shpincode').val();
            var phone=$('#shphone').val();
            var pay=$('#paymethod').val();
           // alert(pay);



            if(name==""){
                $("#shname").css({"border": "1px solid red"});
                //$('#shnamerequired')css({"color":"red"});
            }else if(country==""){
                $("#shcountry").css({"border": "1px solid red"});
            }else if(address==""){
                $("#shadd").css({"border": "1px solid red"});
            }else if(apartment==""){
                $("#shapart").css({"border": "1px solid red"});
            }else if(city==""){
                $("#shcity").css({"border": "1px solid red"});
            }else if(state==""){
                $("#shstate").css({"border": "1px solid red"});
            }else if(pincode==""){
                $("#shpincode").css({"border": "1px solid red"});
            }else if(phone==""){
                $("#shphone").css({"border": "1px solid red"});
            }else{
                if ($("#paymethod").prop("checked")) {
                    var prodiuct_name = [];
            var product_qty = [];


            $('.ProductID').each(function(){
                prodiuct_name.push($(this).val());
            });
            $('.product_qty').each(function(){
                product_qty.push($(this).val());
            });

           // alert(product_qty);exit;
            $.ajax({
                    type: "POST",

                    url: "{{ route('checkauthentication') }}",
                    data: {  "_token": "{{ csrf_token() }}",
                    name:name,country:country,address:address,apartment:apartment,city:city,state:state,pincode:pincode,pay:pay,phone:phone,prodiuct_name:prodiuct_name,product_qty:product_qty},
                    success: function (res) {

                    console.log(res);
                    //var obj=JSON.parse(res)
                        if(res==0){
                            window.location.href = '{{url('userlogin')}}';
                        }else{
                            var stored = JSON.parse(localStorage.getItem("cart"));
                            var newData = [];
                            localStorage.setItem("cart", JSON.stringify(newData));
                            $('#cartTotal').html(0);
                            Swal.fire(
                            'Order Confirmed!',
                            'You clicked the button!',
                            'success'
                            )
                            window.location.href = '{{url('index')}}';

                        }

                    },
                    });
            }else{
                $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

  
      
    toastr.error('Payment method is not selected')
   
  });
  
                  
            }

            }


        });

$('.view').on('click',function(){
    var id=$(this).data('id');
    if(id){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('cusitemfetching') }}",
            data: {  "_token": "{{ csrf_token() }}",
            id: id },
            success: function (res) {
                console.log(res);
                $('#customerorderlist').empty();
                var html_each="";
                $i=1;
                $.each( res, function( key, value ) {
                html_each +='<tr><td align="center">'+$i+'</td><td align="center">'+value.product_name+'</td><td align="center">'+value.offer_price * value.product_qty+'</td><td align="center">'+value.product_qty+'</td></tr>';
                $i++;
                });
                $('#customerorderlist').append(html_each);
            },
        });
    }
    $('#itemviewmodal').modal('show');
});

  $(".rating").click(function(){
      var id=$(this).data('id');
		//$('#ratestar_'+id).toggleClass("rate");
		//var numItems = $('.rate').length;
	   // alert(numItems);
		$('#yourate').val(id);
		var i=0;
		for(i=1;i<=5;i++){
			if(i <= id){
				$('#ratestar_'+i).addClass("rate");
			}
			else{
				$('#ratestar_'+i).removeClass("rate");
			}
		}
  });

  $('.codinput').on('click',function(){
    $('.cashondelivery').show();
  });
$('.netinput').on('click',function(){
    $('.cashondelivery').hide();
});
$('.adddeladd').on('click',function(){
var add=$('#address').val();
if(add){
    $.ajax({
        type: "POST",

        url: "{{ route('insertdeladd') }}",
        data: {  "_token": "{{ csrf_token() }}",
        add: add },
        success: function (res) {

        console.log(res);
        location.reload();

        },
        });
}

});


        $('.plusminus').on('click',function(){

        var id=$(this).data('productid');
        var qty=$(this).val();
       
        var moq=$('#moq_'+id);
        if(parseInt(moq)>parseInt(qty)){
            $("#pqty_"+id).prop('disabled', true);
            $("#pqty_"+id).val(qty);
        }else{
 
 var price=$(this).data('price');
        var subtotal=parseInt(qty)*parseInt(price);
       
        $('#subtotal_price_'+id).html('$'+subtotal);
        $('#subtol_'+id).val(subtotal);
        calculateSum();
        }

        });

        $(document).ready(function() {
        $(".expenses").each(function() {

        calculateSum();

        });
        });

function calculateSum() {
  var sum = 0;
  $(".expenses").each(function() {
    if (!isNaN(this.value) && this.value.length != 0) {
      sum += parseFloat(this.value);
    }
  });
//alert(sum);
  $("#finalsubtotal").html(sum.toFixed(2)+' AED');
  $('#subfinaltotal').val(sum.toFixed(2));
  $('#grandfinaltol').html(sum.toFixed(2)+' AED');
}


$(document).on('click','.product_details',function(){
   
    var shop=$(this).data('shop');
    var product=$(this).data('product');

    $.ajax({
        type: "POST",
        url: "{{ route('productdetailfetching') }}",
        data: {  "_token": "{{ csrf_token() }}",shop: shop,product:product },
        success: function (res) {
            var reponse = JSON.parse(res)
            var obj=reponse.details
            var dis=((parseInt(obj.price)-parseInt(obj.offer_price))/parseInt(obj.price))*parseInt(100);

            $('#product_name').html(obj.product_name);
            $('#moqvalue').val(obj.moq);
            $('#maxProductStock').val(obj.stock);
            $('#shopproduct_id').val(obj.product_id);
            $('#shop_id').val(obj.shop_id);
            if(obj.price==obj.offer_price){
                $('.old-price').html('');
                $('.new-price').html(obj.offer_price + ' AED');
                $('.discount-percentage').hide();
            }else{
                $('.old-price').html(obj.price + ' AED');
                $('.new-price').html(obj.offer_price + ' AED');
                $('.discount-percentage').show();
            }
            $('#product-variants-container').html(reponse.varient);
            if(obj.moq!=0){
                $('.moqview').html('<div class="product-availability"><i class="fa fa-check"></i> Minimum Order Quantity : '+obj.moq+'</div>');
            }
            if(obj.stock!=0)
            {
                $('.stock').html('<i class="fa fa-check"></i> In stock');
            }
            else{
                $('.stock').html('<i class="fa fa-close nstock"></i> No stock');
            }
            

            $('.discount-percentage').html('Save ' +dis.toFixed(0)+' %');
            $('#productdesc').html(obj.description);
            let url = "{{url('admin/images/')}}"+'/'+obj.image
            $(".img-poppu").attr("href", url)
            $('.img-poppu').html('<img src="{{url('admin/images/')}}/'+obj.image+'">');
            // $('.add-to-cart').attr("data-product",obj.id);
            $('.add-to-cart').attr("data-productidd",obj.id);
            $('.add-to-cart').attr("data-productname",obj.product_name);
            $('.add-to-cart').attr("data-image",'{{url('admin/images/')}}/'+obj.image);
            $('.add-to-cart').attr("data-rate",obj.offer_price);
        },
    });
    //alert(shop);
    $('#modaldetailview').modal('show');
});



// $('#colorlistpicker').on('click','.color_picker',function(){
//    var type=$(this).data('type');
//     var id=$(this).data('id');
//     var store=$('#storevarients').val();
//     if(store==""){
//         var sdel=$(this).data('id');
//     }else{

//         //var check=sdel.includes(id);
//         if(store.indexOf(id) != -1){
//             var sdel=$('#storevarients').val();
//         }else{
//             var sdel=$('#storevarients').val()+','+$(this).data('id');
//         }

//     }
//     //alert(type);
//    $('#storevarients').val(sdel);
//     $('#color_'+id).addClass("active-color");
// });

// $('#colorlistpicker').on('click','.radiocheck',function(){
//     var color=$('input[name="color"]:checked').val();
//     $('.add-cart').attr("data-color",color);
// });
// $('.memoryselect').on('change',function(){
// var memory=$(this).val();
// $('.add-cart').attr("data-memory",memory);
// });





// $('#product_description_id').on('change','.selectcolor',function(){

//    var size=$('#sizeid').val();
//    var color=$(this).val();
//    var productid=$('#shopproduct_id').val();
//    //alert(size);alert(color);alert(productid);
//    $.ajax({
//            type: "POST",
//            dataType: 'json',
//            url: "{{ route('productvarientfetching') }}",
//            data: {  "_token": "{{ csrf_token() }}",
//            size: size,color:color,productid:productid },
//            success: function (res) {
//             // alert(res);
//             if(res!=null){
//                 $('#out_of_stock').hide();
//                 $('.price-box').css("display", "block");
//            }
//            else{

//               //$('#out_of_stock').show();
//               $('#out_of_stock').css("display","block");
//               $('.price-box').css("display", "none");
//               $('#productimages_slides').empty();
//                 $('#productimages_thumbnail').empty();
//            }


//                //var obj=JSON.parse(res)
//                console.log(res);
//               // var discount=parseInt(obj.price)-parseInt(obj.offer_price)/parseInt(obj.price)*parseInt(100);
//                var discount=Math.round(((parseInt(res.price)-parseInt(res.offer_price))/parseInt(res.price))*parseInt(100));
//                $('.old-price').html(res.price+'AED');
//                $('.new-price1').html(res.offer_price+'AED');
//                $('.discount-percentage').html('SAVE '+discount+' %');
//                $('.add-cart').attr("data-rate",res.offer_price);
//                $('.add-cart').attr("data-product",res.id);
//                var shoproductid=res.id;

//                $.ajax({
//                type: "POST",
//                dataType: "json",
//                url: "{{ route('getproductimages') }}",
//                data: {  "_token": "{{ csrf_token() }}",
//                shoproductid: shoproductid},
//                 success: function (result) {
//                 //var obj=JSON.parse(result)
//                 console.log(result);
//                 if(result){
//                 $('#productimages_slides').empty();
//                 $('#productimages_thumbnail').empty();
//                 //$('.product-details-left').hide();

//                 var html_each="";
//                     $.each(result, function( key, value ) {
//          html_each +='<div class="lg-image"><a href="#" class="img-poppu"><img src="{{url('admin/images/')}}/'+value.product_images+'" alt="product image"></a></div>';
//         html_each1='<div class="sm-image"><img src="{{url('admin/images/')}}/'+value.product_images+'" alt="product image thumb"></div>';

//     });

//         $('#productimages_slides').append(html_each);
//         $('#productimages_thumbnail').append(html_each1);
//                 }else{
//                     $('#out_of_stock').css("display", "block");
//               $('.price-box').css("display", "none");
//                 }


//                     }
//                 });
//            }
//    });

//    });
</script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    });

    $('.removecart').on('click',function(){
        var id=$(this).data('id');
        var price=$('#subtol_'+id).val();
        //var qty=$('#pqty').val();
        var garndamount=$('#subfinaltotal').val();
       // var subamount=parseInt(price)*parseInt(qty);
        var balance=parseInt(garndamount)-parseInt(price);
        $('#subfinaltotal').val(balance);
        $('#finalsubtotal').html('$'+balance);
        $('#grandfinaltol').html('$'+balance);
        $("#row_"+id).remove();

        var productId = $(this).data('id');

                //     var price=$('#subtol_'+productId).val();
                //     //var qty=$('#pqty').val();
                //     var garndamount=$('#subfinaltotal').val();
                // // var subamount=parseInt(price)*parseInt(qty);
                //     var balance=parseInt(garndamount)-parseInt(price);
                //     $('#subfinaltotal').val(balance);
                //     $('#finalsubtotal').html('$'+balance);
                //     $('#grandfinaltol').html('$'+balance);
                //     $("#row_"+productId).remove();
               
                        var stored = JSON.parse(localStorage.getItem("cart"));
                        var newData = [];console.log(stored.length);
                        if(stored.length != 0){
                        var count = stored.length;
                        for(var i = 0;i<count;i++){
                            if(productId == parseInt(stored[i]['productId'])){

                            }
                            else{
                                newData.push(stored[i]);
                            }
                        }
                    localStorage.setItem("cart", JSON.stringify(newData));
                    
                    location.reload(true);
                        }
    });

function validateForm ()
{
	valid = true;

        if ( document.myForm.name.value == "" )
        {
               //
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });


                toastr.error("Please Upload an Image")

                });
                valid = false;
        }


    return valid;
}



</script>

<script type="text/javascript">
$(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {

        toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
});
function checkPasswordMatch() {

    var password = $("#shop_password").val();
    var confirmPassword = $("#shop_cpassword").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    else
        $("#divCheckPasswordMatch").html("Passwords match.");
}
$("#shop_cpassword").keyup(checkPasswordMatch);

</script>

<script>
  function validateForm() {

            var user_name=document.forms["myForm"]["user_name"].value;
            var lastname=document.forms["myForm"]["lastname"].value;
            var user_email=document.forms["myForm"]["user_email"].value;
            var dob=document.forms["myForm"]["dob"].value;
            var address=document.forms["myForm"]["address"].value;
            var phnumber=document.forms["myForm"]["phnumber"].value;
            var oldpassword=document.forms["myForm"]["old-password"].value;
            var user_password=document.forms["myForm"]["user_password"].value;




             if(user_name!=""){
                $('#firsnameinput').css("border", "1px solid #999999");
           }
           else{
           $('#firsnameinput').css("border", "2px solid red");
               return false;
           }
           if(lastname!=""){
            $('#lastnameinput').css("border", "1px solid #999999");
           }else{
            $('#lastnameinput').css("border", "2px solid red");
               return false;
           }
           if(user_email!=""){
            $('#useremailinput').css("border", "1px solid #999999");
           }else{
            $('#useremailinput').css("border", "2px solid red");
               return false;
           }



           if(dob!=""){
            $('#userdob').css("border", "1px solid #999999");
           }else{
            $('#userdob').css("border", "2px solid red");
               return false;
           }

           if(address!=""){
            $('#useraddress').css("border", "1px solid #999999");
           }else{
            $('#useraddress').css("border", "2px solid red");
               return false;
           }
           if(phnumber!=""){
            $('#userphonenumber').css("border", "1px solid #999999");
           }else{
            $('#userphonenumber').css("border", "2px solid red");
               return false;
           }

           if(oldpassword!=""){
            $('#old-passinput').css("border", "1px solid #999999");
           }else{
            $('#old-passinput').css("border", "2px solid red");
               return false;
           }
           if(user_password!=""){
            $('#cnpassword').css("border", "1px solid #999999");
           }else{
            $('#cnpassword').css("border", "2px solid red");
               return false;
           }
             }

</script>
<script>
var pvarient=$('.p_variant').val();
$('.p_variant option:selected').each(function() {
    if($(this).val()==0)
    {
        $('.add-to-cart').attr('disabled',true);
    }
    else{
        $('.add-to-cart').attr('disabled',false);
    }

});

$('#product_description_id').on('change','.p_variant',function(){
    // localStorage.clear();
    var select=$(this).val();
    var variant_name=$(this).data('variant');
    var shop_id=$('#shop_id').val();

    if(variant_name=='storage')
    {
      var storage=select;
    }
    else if(variant_name=='RAM')
    {
        var ram=select;
    }
    else if(variant_name=='inch')
    {
        var inch=select;
    }
    else if(variant_name=='weight')
    {
        var weight=select;
    }
    else if(variant_name=='color')
    {
        var color=select;
    }
    else if(variant_name=='size')
    {
        var size=select;
    }
    else if(variant_name=='display')
    {
        var display=select;
    }
    else if(variant_name=='lens')
    {
        var lens=select;
    }
    else if(variant_name=='type')
    {
        var type=select;
    }
    else if(variant_name=='material')
    {
        var material=select;
    }
    else if(variant_name=='speed')
    {
        var speed=select;
    }
    else if(variant_name=='beamwidth')
    {
        var beamwidth=select;
    }

    else if(variant_name=='Headshape')
    {
        var Headshape=select;
    }
    else if(variant_name=='Cover')
    {
        var Cover=select;
    }
    else if(variant_name=='Madeof')
    {
        var Madeof=select;
    }
    else if(variant_name=='Inclusions')
    {
        var Inclusions=select;
    }
    else if(variant_name=='capacity')
    {
        var capacity=select;
    }
    else if(variant_name=='Language')
    {
        var Language=select;
    }
    else if(variant_name=='Binding')
    {
        var Binding=select;
    }
    else if(variant_name=='Publisher')
    {
        var Publisher=select;
    }
    else if(variant_name=='Genre')
    {
        var Genre=select;
    }
    else if(variant_name=='ISBN')
    {
        var ISBN=select;
    }
    else if(variant_name=='Pages')
    {
        var Pages=select;
    }
    else if(variant_name=='quantity')
    {
        var quantity=select;
    }
    else if(variant_name=='shade')
    {
        var shade=select;
    } else{
        storage='';
        weight='';
        inch='';
        ram='';
        color='';
        size='';
        display='';
        lens='';
        type='';
        material='';
        speed='';
        beamwidth='';
        Headshape='';
        Cover='';
        Madeof='';
        Inclusions='';
        capacity='';
        Language='';
        Binding='';
        Publisher='';
        Genre='';
        ISBN='';
         Pages='';
         quantity='';
         shade='';
    }


    var size=$('#sizeid').val();
    var color=$('#color_id').val();
    var storage=$('#storage_id').val();
    var ram=$('#ram_id').val();
    var inch=$('#inch_id').val();
    var weight=$('#weight_id').val();
    var display=$('#display_id').val();
    var lens=$('#lens_id').val();
    var type=$('#type_id').val();
    var material=$('#material_id').val();
    var speed=$('#speed_id').val();
    var beamwidth=$('#beamwidth_id').val();
    var Headshape=$('#Headshape_id').val();
    var Cover=$('#Cover_id').val();
    var Madeof=$('#Madeof_id').val();
    var Inclusions=$('#Inclusions').val();
    var capacity=$('#capacity_id').val();
    var Language=$('#Language_id').val();
    var Binding=$('#Binding_id').val();
    var Publisher=$('#Publisher_id').val();
    var Genre=$('#Genre_id').val();
    var ISBN=$('#ISBN_id').val();
    var Pages=$('#Pages_id').val();
    var quantity=$('#quantity_id').val();
    var shade=$('#shade_id').val();

    var productid=$('#shopproduct_id').val();


   //alert(size);alert(color);alert(productid);
    $.ajax({
            type: "POST",
            url: "{{ route('productvarientfetching') }}",
            data: {  "_token": "{{ csrf_token() }}",
            shop_id:shop_id,size:size,color:color,storage:storage,ram:ram,inch:inch,productid:productid,
            weight:weight,display:display,lens:lens,type:type,material:material,speed:speed,beamwidth:beamwidth,
            Headshape:Headshape,Cover:Cover,Madeof:Madeof,Inclusions:Inclusions,capacity:capacity,
            Language:Language,Binding:Binding,Publisher:Publisher,Genre:Genre,ISBN:ISBN,
            Pages:Pages,quantity:quantity,shade:shade},
            success: function (res) {
                var obj=JSON.parse(res)
                console.log(res);
                // alert(res);
                if(typeof obj === 'object' && obj !== null){
                    $('#out_of_stock').hide();
                    $('.price-box').css("display", "block");
                    $('.product-availability').css("display", "block");
                    $('.add-to-cart').attr('disabled',false);

                    var discount=Math.round(((parseInt(obj.price)-parseInt(obj.offer_price))/parseInt(obj.price))*parseInt(100));
                    $('.old-price').html(obj.price+'AED');
                    $('.new-price1').html(obj.offer_price+'AED');
                    $('.new-price').html(obj.offer_price+'AED');
                    $('.discount-percentage').html('SAVE '+discount+' %');
                    $('.add-cart').attr("data-rate",obj.offer_price);
                    $('.add-cart').attr("data-productidd",obj.id);
                    $('.add-cart').attr("data-image",'http://easyshop.espylabs.com/public/admin/images/'+obj.single_image);

                    $('#moqvalue').val(obj.moq);
                    $('#maxProductStock').val(obj.stock);

                    if(obj.stock == 0) {
                        $('.product-availability').css("display", "none");
                        $('.add-to-cart').attr('disabled',true);
                        $('#out_of_stock').css("display","block");
                    }

                    var shoproductid=obj.id;

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ route('getproductimages') }}",
                        data: {  "_token": "{{ csrf_token() }}",shoproductid: shoproductid},
                        success: function (result) {
                            if(result){
                                var pagetype =$('#pagetype').val();
                                if(pagetype == 'popup') {
                                    if(result.length > 0) {
                                        let first = result[0]
                                        let url = "{{url('admin/images/')}}"+'/'+first.product_images
                                        $(".img-poppu").attr("href", url)
                                        $('.img-poppu').html('<img src="{{url('admin/images/')}}/'+first.product_images+'">');
                                    } else {
                                        $('.img-poppu').html('');
                                    }
                                } else {
                                    $('.product-details-images-2').html("");
                                    $('.product-details-thumbs-2').html("");

                                    var html_each ='';
                                    $.each(result, function( key, value ) {
                                        html_each +='<div class="lg-image"> <a href="{{url('admin/images/')}}/'+value.product_images+'" class="img-poppu"><img src="{{url('admin/images/')}}/'+value.product_images+'" alt="product image"></a></div>';
                                    });
                                    

                                    var html_each_thumb='';
                                    $.each(result, function( key, value ) {
                                        html_each_thumb +='<div class="sm-image"><img src="{{url('admin/images/')}}/'+value.product_images+'" alt="product image thumb"></div>';

                                    });
                                

                                    var $thumb = $('.product-details-thumbs-2');
                                    $('.product-details-images-2').slick('removeSlide', null, null, true);
                                    $('.product-details-images-2').slick("unslick");
                                    $('.product-details-images-2').html(html_each);
                                    $('.product-details-images-2').slick({
                                        arrows: false,
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                        autoplay: false,
                                        autoplaySpeed: 5000,
                                        dots: false,
                                        infinite: true,
                                        centerMode: false,
                                        centerPadding: 0,
                                        asNavFor: $thumb,
                                        swipe: false,
                                        swipeToSlide: false,
                                    });

                                    var $this = $(this);
                                    var $details = $('.product-details-images-2');
                                    $('.product-details-thumbs-2').slick('removeSlide', null, null, true);
                                    $('.product-details-thumbs-2').slick("unslick");
                                    $('.product-details-thumbs-2').html(html_each_thumb);
                                    setTimeout(function() { 
                                        $('.product-details-thumbs-2').slick({
                                            arrows: true,
                                            slidesToShow: 4,
                                            slidesToScroll: 1,
                                            autoplay: false,
                                            autoplaySpeed: 5000,
                                            vertical:true,
                                            verticalSwiping:true,
                                            dots: false,
                                            infinite: true,
                                            focusOnSelect: true,
                                            centerMode: false,
                                            centerPadding: 0,
                                            prevArrow: '<span class="slick-prev"><i class="fa fa-angle-up"></i></span>',
                                            nextArrow: '<span class="slick-next"><i class="fa fa-angle-down"></i></span>',
                                            asNavFor: $details,
                                            responsive: [
                                                {
                                                    breakpoint: 1200,
                                                    settings: {
                                                        slidesToShow: 3,
                                                    }
                                                },
                                                {
                                                    breakpoint: 991,
                                                    settings: {
                                                        slidesToShow: 3,
                                                    }
                                                },
                                                {
                                                    breakpoint: 767,
                                                    settings: {
                                                        slidesToShow: 2,
                                                    }
                                                },
                                                {
                                                    breakpoint: 479,
                                                    settings: {
                                                        slidesToShow: 2,
                                                    }
                                                }
                                            ]
                                        });
                                    }, 500);

                                    $('.img-poppu').magnificPopup({
                                        type: 'image',
                                        gallery:{
                                            enabled:true
                                        }
                                    });
                                }
                                

                                // $('.product-details-images-2').slick('reinit');
                                // $('.product-details-thumbs-2').slick('removeSlide', null, null, true);
                                // $('.product-details-thumbs-2').slick('reinit');

                                // $('.product-details-images-2').slick('refresh');

                            } else {
                                $('#out_of_stock').css("display", "block");
                                $('.price-box').css("display", "none");
                            }
                        }
                    });
                } else{
                    console.log('else');
                    //$('#out_of_stock').show();
                    $('#out_of_stock').css("display","block");
                    $('.add-to-cart').attr('disabled',true);

                    $('.price-box').css("display", "none");
                    $('.product-availability').css("display", "none");
                    $('#productimages_slides').empty();
                    $('#productimages_thumbnail').empty();
                    var pagetype =$('#pagetype').val();
                    if(pagetype == 'popup') {
                        $('.img-poppu').html('');
                    }
                }
            }
    });
});
</script>
<script>
$('#shphone').keypress(function (event) {
    var keycode = event.which;
    if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
        event.preventDefault();
       
        $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

  
      
    toastr.error('please enter Numbers')
   
  });
    }
});
</script>
