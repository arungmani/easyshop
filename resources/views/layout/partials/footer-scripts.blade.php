  <!-- SCRIPTS -->
  <!-- JQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>

<script src="{{asset('sweetalert2/sweetalert2.min.js')}}"></script>

<script src="{{asset('toastr/toastr.min.js')}}"></script>


<!-- DataTables -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

 
  <script>
  $('.category').on('change',function(){
  var id=$(this).val();
 
  if(id!=0){
    $('#subcategorydiv').show();
    $('#subsubcatyesno').show();
    $.ajax({
					type: "POST",
          dataType: "json",
					url: "{{ route('subcatfetch') }}",
					data: {  "_token": "{{ csrf_token() }}",
					id: id },
					success: function (res) {
                                         //       alert(res);
            console.log(res);
            $('#subcategory').empty();
				
          var html_each="<option value='0'>select</option>";
          $.each( res, function( key, value ) {
         html_each +='<option value='+value.id+'>'+value.categoryname+'</option>';
        });
        $('#subcategory').append(html_each);
					},
					});	
  }else{
    $('#subcategorydiv').hide();
    $('#subsubcatyesno').hide();
  }
  });

  $('#editcategory_body').on('change','.category_edit',function(){
  var id=$(this).val();
 
  if(id!=0){
    $('#subcategorydiv').show();
    $('#subsubcatyesno').show();
    $.ajax({
					type: "POST",
          dataType: "json",
					url: "{{ route('subcatfetch') }}",
					data: {  "_token": "{{ csrf_token() }}",
					id: id },
					success: function (res) {
            console.log(res);
            $('#subcategory_edit').empty();
				
          var html_each="<option value='0'>select</option>";
          $.each( res, function( key, value ) {
         html_each +='<option value='+value.id+'>'+value.categoryname+'</option>';
        });
        $('#subcategory_edit').append(html_each);
					},
					});	
  }else{
    $('#subcategorydiv').hide();
    $('#subsubcatyesno').hide();
  }
  });


  $('.subcategory').on('change',function(){
  var id=$(this).val();
 
  if(id){
   
    $.ajax({
					type: "POST",
          dataType: "json",
					url: "{{ route('subcatfetch') }}",
					data: {  "_token": "{{ csrf_token() }}",
					id: id },
					success: function (res) {
            console.log(res);
            $('#subsubcategory').empty();
				
          var html_each="<option value='0'>select</option>";
          $.each( res, function( key, value ) {
         html_each +='<option value='+value.id+'>'+value.categoryname+'</option>';
        });
        $('#subsubcategory').append(html_each);
					},
					});	
  }else{
    $('#subcategorydiv').hide();
   
  }
  });

  $('#editcategory_body').on('change','.subcategory_edit',function(){
  var id=$(this).val();
 
  if(id){
   
    $.ajax({
					type: "POST",
          dataType: "json",
					url: "{{ route('subcatfetch') }}",
					data: {  "_token": "{{ csrf_token() }}",
					id: id },
					success: function (res) {
            console.log(res);
            $('#subsubcategory_edit').empty();
				
          var html_each="<option value='0'>select</option>";
          $.each( res, function( key, value ) {
         html_each +='<option value='+value.id+'>'+value.categoryname+'</option>';
        });
        $('#subsubcategory_edit').append(html_each);
					},
					});	
  }else{
    $('#subcategorydiv').hide();
   
  }
  });

  

  $('document').ready(function() {
    $('#categorydroptable').on('click','.addsubcategories',function(){
    var id=$(this).data('id');
	$('#sucatinsertid').val(id);
      $('#subcategorylistedit').empty();
  $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ route('subcatfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      //  $('#editunit_modal').html(res);
        console.log(res);
        var html_each="";
        $i=1;
        $.each(res, function(index, itemData ) {
          html_each +='<tr><td align="center">'+$i+'</td><td align="center">'+itemData.categoryname+'</td><td align="center"><img src="{{url('admin/images/')}}/'+itemData.image+'" width="70"></td><td align="center"><a href="{{ URL::asset('/getdeleteCategoryStatus/') }}/'+itemData.id+'" class="trash" ><li class="fa fa-trash text-danger"></li></a></td></tr>';
          $i++;
});








   $('#subcategorylistedit').append(html_each);
	
       
        },
        });	
  

  $("#subcategorymodal").modal("show");
  });
$('#subcategorylistedit').on('click','.trash',function(){
    var checkstr =  confirm('are you sure you want to delete this?');
    if(checkstr == true){
  
    }else{
    return false;
    }
});

$('document').ready(function() {
        $('#catedit').on('click','.catproductdelete',function() {
  

  var id=$(this).data('id');
  $('#cateproductdelid').val(id);

});});
$('.shopdelete').on('click',function(){
  var id=$(this).data('id');
  $('#shopdelid').val(id);

});


$('.deleteShoplistBanner').on('click',function(){
  var id=$(this).data('id');
  $('#shoplistbannerid').val(id);

});
$('document').ready(function() {
  $('#shopro').on('click','.deleteShopProducts',function() {


  var id=$(this).data('id');
  $('#shoproductdelid').val(id);

});
});
  $('#bannertype').on('change',function(){
      var id=$(this).val();
      if(id){
        $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ route('subcatfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      //  $('#editunit_modal').html(res);
      $('#categorydroptable').empty();
        console.log(res);
        var html_each1="";
        $i=1;
        $.each(res, function(index, itemData ) {
          html_each1 +='<tr><td align="center">'+$i+'</td><td align="center">'+itemData.categoryname+'</td>';
          html_each1 +='<td align="center"><img src="{{url('admin/images/')}}/'+itemData.image+'" width="150" height="90"></td>';
          html_each1 +='<td align="center"><button type="button" class="btn btn-info addsubcategories" data-id="'+itemData.id+'">+ Sub Categories</button>	</td>';
          html_each1 +='<td align="center"><i class="fa fa-edit edit_category" aria-hidden="true" data-toggle="modal" data-id="'+itemData.id+'"></i><li class="fa fa-trash text-danger delete_category" data-target="#deleteCategoryStatus" data-toggle="modal" data-id="'+itemData.id+'"></li></a></td></tr>';
          $i++;
          });

          $('#categorydroptable').append(html_each1);

      }
  });
      }

});


$('document').ready(function() {
        $('#example1').on('click','.delete_category',function() {
  

var id=$(this).data('id');
$('#category_delid').val(id);

});});
 
  $('.selectmaincateadd').on('change',function(){
    
	var id=$(this).val();
	//alert(id);
	if(id){
		$.ajax({
					type: "POST",
					dataType: "json",
					url: "{{ route('subcatfetch') }}",
					data: {  "_token": "{{ csrf_token() }}",
					id: id },
					success: function (res) {
					console.log(res);
          			//var obj=JSON.parse(res)
					 // brandlist
					 $('#subcatlistadd').empty();
					 var html_each="<option value='0'>select</option>";
					  $.each( res, function( key, value ) {
  					html_each += '<option value='+value.id+'>'+value.categoryname+'</option>'
					});
					$('#subcatlistadd').append(html_each);
					},
					});	
	}
  });


  $('#checkradio').click(function(){
            if($(this).prop("checked") == true){
               $('#subsubcategorydiv').show();
            }
            else if($(this).prop("checked") == false){
              $('#subsubcategorydiv').hide();
            }
        });





        $('document').ready(function() {
  $('.edit_banner').click(function() {
    var id=$(this).data('id');
	
  if(id){
    $.ajax({
        type: "POST",

        url: "{{ route('bannerfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      
        console.log(res);
        var obj=JSON.parse(res)
       
        $('#bannerimage').val(obj.image);
      
		
        $('#bannerid').val(obj.id);
       
        },
        });	
  }
  $("#editbanner_modal").modal("show");
   // $('#dummyModal').modal('show');
  });


});



$('#example1').on('click','.edit_variant',function(){

    var id=$(this).data('id');
	
  if(id){
    $.ajax({
        type: "POST",

        url: "{{ route('variantfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      
        console.log(res);
        var obj=JSON.parse(res)
       
        $('#variant').val(obj.varient_type);
      
		
        $('#varid').val(obj.id);
       
        },
        });	
  }
  $("#editvariant_modal").modal("show");
   // $('#dummyModal').modal('show');
  });



  $('#example1').on('click','.edit_vari',function(){

var id=$(this).data('id');
    
if(id){
$.ajax({
    type: "POST",

    url: "{{ route('varifetch') }}",
    data: {  "_token": "{{ csrf_token() }}",
    id: id },
    success: function (res) {
  
    console.log(res);
    var obj=JSON.parse(res)
   
    $('#varie_type').val(obj.varient_type_id);
  
    $('#varian').val(obj.varient);
    $('#variid').val(obj.id);
   
    },
    });	
}
$("#editvari_modal").modal("show");
// $('#dummyModal').modal('show');
});










$('#example1').on('click','.addproductimage',function(){
 var id=$(this).data('id');
 $('#productid').val(id);
 if(id){
  $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ route('productimagefetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      
        console.log(res);
        $('#product_list').empty();
        var html_each="";
        $i=1;
        $.each( res, function( key, value ) {
          html_each +='<tr><td>'+$i+'</td><td><img src="{{url('admin/images/')}}/'+value.product_images+'". width="250". height="200"></td><td><a href="{{url('deleteProdImageStatus')}}/'+value.id+'" ><li class="fa fa-trash delimg text-danger"></li></a></td></tr>';
          $i++;
});
$('#productid').val(id)
     $('#product_list').append(html_each); 
        },
        });
 }
});



$('#example1').on('click','.addproductreview',function(){
 var id=$(this).data('id');
 $('#productid').val(id);
 if(id){
  $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ route('productreviewfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      
        console.log(res);
        $('#review_list').empty();
        var html_each="";
        $i=1;
        $.each( res, function( key, value ) {
          html_each +='<tr><td align="center">'+$i+'</td><td align="center">'+value.name+'</td><td align="center">'+value.description+'</td></tr>';
          $i++;
});
$('#productid').val(id)
     $('#review_list').append(html_each); 
        },
        });
 }
});




$('#example1').on('click','.addproductfeature',function(){

 var id=$(this).data('id');
 $('#profeatid').val(id);
//  alert(id);
 if(id){
  $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ route('productfeaturesfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      
        console.log(res);
        $('#feature_list').empty();
        var html_each="";
        $i=1;
        $.each( res, function( key, value ) {
  html_each +='<tr><td align="center">'+$i+'</td><td align="center">'+value.features+'</td><td align="center"><a href="{{ URL::asset('/deleteProdFeatStatus/') }}/'+value.id+'"><li class="fa fa-trash delft text-danger"></li></a></td></tr>';
         
          $i++;


});
     $('#feature_list').append(html_each); 
        },
        });
 }
});

$('#variant_list').on('click','.varientprodutstcokbutton',function(){
        var id=$(this).data('id');
        $('#productvarint').val(id);
        $.ajax({
        type: "POST",

        url: "{{ route('producvarientstockfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      //  $('#editunit_modal').html(res);
        console.log(res);
        var obj=JSON.parse(res)
       //alert(obj.var_stock);
       // $('#ban_img').val(obj.banner_image);
      
		
        $('#stockvarient').val(obj.var_stock);
        
       
        },
        });
$('#modalvarientstock').show();
});

$('#example1').on('click','.addproductvariant',function(){

 var id=$(this).data('id');
 $('#variid').val(id);
//  alert(id);
 if(id){
  $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ route('productvariantfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      
        console.log(res);
        $('#variant_list').empty();
        var html_each="";
        $i=1;
        $.each( res, function( key, value ) {
  
  html_each +='<tr><td align="center">'+$i+'</td><td align="center">'+value.variant_type+'</td><td align="center">'+value.variant_name+'</td><td align="center">'+value.var_stock+'&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success varientprodutstcokbutton" data-id="'+value.id+'"><i class="fa fa-edit"></i></button></td><td align="center"><a href="{{ URL::asset('/deleteProdVarStatus/') }}/'+value.id+'"><li class="fa fa-trash delvar1 text-danger"></li></a></td></tr>';
         
          $i++;


});
     $('#variant_list').append(html_each); 
        },
        });
 }
});



$('#example1').on('click','.addproductfeature1',function(){

 var id=$(this).data('id');
 var shid=$(this).data('shid');
 $('#profeatid').val(id);
 $('#profeatid1').val(shid);
//  alert(id);
 if(id){
  $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ route('productfeaturesfetch1') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      
        console.log(res);
        $('#feature_list1').empty();
        var html_each="";
        $i=1;
        $.each( res, function( key, value ) {
  html_each +='<tr><td align="center">'+$i+'</td><td align="center">'+value.features+'</td><td align="center"><a href="{{ URL::asset('/deleteProdFeatStatus1/') }}/'+value.id+'"><li class="fa fa-trash delft text-danger"></li></a></td></tr>';
         
          $i++;


});
     $('#feature_list1').append(html_each); 
        },
        });
 }
});











$('document').ready(function() {
  $('.edit_bannerimage').click(function() {
    var id=$(this).data('id');
	
  if(id){
    $.ajax({
        type: "POST",

        url: "{{ route('shoplistbannerfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      //  $('#editunit_modal').html(res);
        console.log(res);
        var obj=JSON.parse(res)
       
       // $('#ban_img').val(obj.banner_image);
      
		
        $('#ban_edit').val(obj.id);
        
       
        },
        });	
  }
  $("#editbanner_modal").modal("show");
   // $('#dummyModal').modal('show');
  });


});





  $('#example2').on('click','.edit_shop',function() {
    var id=$(this).data('id');
	// alert(id);
  if(id){
    $.ajax({
        type: "POST",

        url: "{{ route('shoplistfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      //  $('#editunit_modal').html(res);
        console.log(res);
        var obj=JSON.parse(res)
       // alert(res);
        $('#id_edit').val(obj.id);
       $('#shopname').val(obj.shop_name);
        $('#phno').val(obj.shop_phonenum);
       $('#mail').val(obj.shop_email);
       $('#place').val(obj.shop_place);
       $('#lat').val(obj.shop_lattitude);
       $('#long').val(obj.shop_longitude);
       $('#address').val(obj.shop_address);
     
       $('#closingtime').val(obj.shop_closing_time);
         $('#openingtime').val(obj.shop_open_time);
       $('#img').val(obj.shop_image);
     
       //$('#shop_edit').val(obj.id);
       
        },
        });	
  }
  $("#editshop_modal").modal("show");
  
   
  });







$('document').ready(function() {
        
  $('#shopban').on('click','.editshopbanners',function() {
 
    var id=$(this).data('id');
//	alert(id);
  if(id){
    $.ajax({
        type: "POST",

        url: "{{ route('shopbannerfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      //  $('#editunit_modal').html(res);
        console.log(res);
        var obj=JSON.parse(res)
        //$('#shopname').val(obj.shop_name);
       // $('#ban_img').val(obj.banner_image);
      
		
        $('#shopban_edit').val(obj.id);
       $('#shopnameedit').val(obj.shop_id);
        },
        });	
  }
  $("#editshopbanner_modal").modal("show");
   // $('#dummyModal').modal('show');
  });


});

$('document').ready(function() {
        $('#catedit').on('click','.catproductedit',function() {
  
    var id=$(this).data('id');
	
  if(id){
    $.ajax({
        type: "POST",

        url: "{{ route('catproductfetching') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      
        console.log(res);
        $('#editcategory_body').html(res);
        },
        });	
  }
  $("#editcatproduct_modal").modal("show");
   // $('#dummyModal').modal('show');
  });


});



$('document').ready(function() {
  $('#categorydroptable').on('click','.edit_category',function() {
    var id=$(this).data('id');
 //alert(id);
  if(id){
    $.ajax({
        type: "POST",

        url: "{{ route('categoryfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      
        console.log(res);
        var obj=JSON.parse(res)
        $('#parentcat').val(obj.parentcategory);
        $('#catname').val(obj.categoryname);
        //$('#image').val(obj.image);
      
       
        $('#categoryid1').val(obj.id);
        
        },
        });	
  }
  $("#editcategory_modal").modal("show");
   // $('#dummyModal').modal('show');
  });


});
//-----------------------------------------------------------------
$('document').ready(function() {
  $('#categorydroptable').on('click','.viewvarianttype',function() {
    var id=$(this).data('id');
 //alert(id);
  if(id){
 
        $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ route('assignvarifetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      
        console.log(res);
        $('#varienttypemodal').empty();
        var html_each="";
        $i=1;
        $.each( res, function( key, value ) {
      html_each +='<tr><td align="center">'+$i+'</td><td align="center">'+value.varient_type+'</td><td><a href="{{ URL::asset('/deleteassignvariants/') }}/'+value.id+'"><i class="fa fa-trash"></i></a></td></tr>';
         
          $i++;


});
     $('#varienttypemodal').append(html_each); 
        },
        });	
  }
  $("#viewvariant").modal("show");
   // $('#dummyModal').modal('show');
  });


});
//-------------------------------------------------------------


$('.additems').on('click',function(){
 var id=$(this).data('id');
 var cusid=$(this).data('cusid');
 $('#prodid').val(id);
 if(id){
  $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ route('itemfetching') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      
        console.log(res);
        $('#item_list').empty();
        var html_each="";
        $i=1;
        $.each( res, function( key, value ) {
          html_each +='<tr><td align="center">'+$i+'</td><td align="center">'+value.product_name+'</td><td align="center">'+value.product_qty+'</td><td align="center">'+value.offer_price * value.product_qty+'</td></tr>';
          $i++;
});
     $('#item_list').append(html_each); 
        },
        });

        $.ajax({
        type: "POST",
        //dataType: "json",
        url: "{{ route('custdetailsfetching') }}",
        data: {
            "_token": "{{ csrf_token() }}",
            cusid: cusid
        },
        success: function(res) {
            console.log(res);

            var obj = JSON.parse(res)
            $('#shipaddress').val(obj.address);
            $('#cust_name').val(obj.name);
           
            $('#phno').val(obj.phone_number);
            $('#country').val(obj.country);
            $('#state').val(obj.state);
            $('#city').val(obj.city);
            $('#pin').val(obj.pincode);
           
            $('#prodid').val(obj.id);
           
          

        },
    });

    $('#items').modal('show');
        
 }
});


$('document').ready(function() {
  $('#shopro').on('click','.edit_shopproduct',function() {

 
    var id=$(this).data('id');
	
  if(id){
    $.ajax({
        type: "POST",

        url: "{{ route('shopproductfetch') }}",
        data: {  "_token": "{{ csrf_token() }}",
        id: id },
        success: function (res) {
      //  $('#').html(res);
        console.log(res);
        var obj=JSON.parse(res)
   
		 // $('#shopname').val(obj.shop_name);
     //$('#productname').val(obj.product_name);
     $('#price').val(obj.price);
     $('#offprice').val(obj.offer_price);
     $('#dscnt').val(obj.discount);
     $('#curstock').val(obj.stock);
     $('#moq').val(obj.moq);
		// $('#status').val(obj.status);
        $('#shop_edit').val(obj.id);
        $('#shopnameedit').val(obj.shop_id);
        $('#productnameedit').val(obj.product_id);
        $.each($("#color option"), function(){ 
                
                 
               if($(this).val()==obj.color)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#size option"), function(){   
               if($(this).val()==obj.size)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#storage option"), function(){   
               if($(this).val()==obj.storage)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#ram option"), function(){   
               if($(this).val()==obj.RAM)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#inch option"), function(){   
               if($(this).val()==obj.inch)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#weight option"), function(){   
               if($(this).val()==obj.weight)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#display option"), function(){   
               if($(this).val()==obj.display)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#lens option"), function(){   
               if($(this).val()==obj.lens)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#type option"), function(){   
               if($(this).val()==obj.type)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#material option"), function(){   
               if($(this).val()==obj.material)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#speed option"), function(){   
               if($(this).val()==obj.speed)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#beamwidth option"), function(){   
               if($(this).val()==obj.beamwidth)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#headshape option"), function(){   
               if($(this).val()==obj.Headshape)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#Cover option"), function(){   
               if($(this).val()==obj.Cover)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#Madeof option"), function(){   
               if($(this).val()==obj.Madeof)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#Inclusions option"), function(){   
               if($(this).val()==obj.Inclusions)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#capacity option"), function(){   
               if($(this).val()==obj.capacity)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#Language option"), function(){   
               if($(this).val()==obj.Language)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#Binding option"), function(){   
               if($(this).val()==obj.Binding)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#Publisher option"), function(){   
               if($(this).val()==obj.Publisher)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#Genre option"), function(){   
               if($(this).val()==obj.Genre)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#ISBN option"), function(){   
               if($(this).val()==obj.ISBN)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#Pages option"), function(){   
               if($(this).val()==obj.Pages)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#quantity option"), function(){   
               if($(this).val()==obj.quantity)
               {
                $(this).attr('selected',true);
               }

               
        });
        $.each($("#shade option"), function(){   
               if($(this).val()==obj.shade)
               {
                $(this).attr('selected',true);
               }

               
        });
       
       
       
       
					// $('#productname').append(html_each);
					},
      
        });	
  }
  $("#btnClosePopup").click(function () {
            location.reload(true);
        });
        $('#editshopprod_modal').on('hidden.bs.modal', function(){
                location.reload(true);
        });
  $("#editshopprod_modal").modal("show");
   // $('#dummyModal').modal('show');
  });
});

  });
 



  

  </script>
 @if(session()->has('message'))

  <script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

  
    toastr.success('{{ session()->get('message') }}')
   
  });

  
    </script>

  @elseif(session()->has('deletesuccess'))
  <script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

  
      
    toastr.success('Deleted succesfully.')
   
  });

  
    </script>
@endif



<script type="text/javascript">



function validate_form ( )
{
	valid = true;

        if ( document.categ_form.catname.value == "" )
        {
                //alert ( "Please fill in the 'Category' box." );



                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Category' box.")
   
                });
                valid = false;
        }

    
if ( document.categ_form.parent.selectedIndex == 0 )
    {
       // alert ( "Please select Parent Category." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please select Parent Category.")
   
                });
        valid = false;
    }

        if ( document.categ_form.image.value == "" )
        {
                //alert ( "Please Upload an Image." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please Upload an Image.")
   
                });
                valid = false;
        }

  

    return valid;
}


function validate_form1 ( )
{
	valid = true;
if ( document.subcatg_vald.catname.value == "" )
        {
               // alert ( "Please fill in the 'SubCategory' box." );
               $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'SubCategory' box.")
   
                });
                valid = false;
        }


if ( document.subcatg_vald.image.value == "" )
        {
               // alert ( "Please Upload an Image." );
               $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please Upload an Image.")
   
                });
                valid = false;
        }

    return valid;
}



function validate_form2 ( )
{
	valid = true;
if ( document.editcatg.catname.value == "" )
        {
               // alert ( "Please fill in the 'Category' box." );
               $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Category' box.")
   
                });
                valid = false;
        }
 
     

        if ( document.editcatg.parent.selectedIndex == 0 )
    {
        // alert ( "Please select Parent Category." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please Select 'Parent Category'.")
   
                });
        valid = false;
    }
    return valid;
}


function validate_form_catprod()
{
	valid = true;
  if ( document.catprod_vald.parent.selectedIndex == 0 )
    {
        // alert ( "Please select Parent Category." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please Select 'Parent Category'.")
   
                });
        valid = false;
    }
    if ( document.catprod_vald.subcat.selectedIndex == 0 )
    {
        // alert ( "Please select Sub Category." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please Select 'SubCategory'.")
   
                });
        valid = false;
    }
    if ( document.catprod_vald.subsubcat.selectedIndex == 0 )
    {
        // alert ( "Please select Sub Sub Category." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please Select 'Sub sub Category'.")
   
                });
        valid = false;
    }
if ( document.catprod_vald.productname.value == "" )
        {
                // alert ( "Please fill in the 'productname' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Product Name' box.")
   
                });
                valid = false;
        }
 
if ( document.catprod_vald.image.value == "" )
        {
                // alert ( "Please Upload an Image" );
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
 
        if ( document.catprod_vald.discount.value == "" )
        {
                // alert ( "Please fill in the 'price' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Discount' box.")
   
                });
                valid = false;
        }

if ( document.catprod_vald.price.value == "" )
        {
                // alert ( "Please fill in the 'price' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Price' box.")
   
                });
                valid = false;
        }

   
        if ( document.catprod_vald.offerprice.value == "" )
        {
                // alert ( "Please fill in the 'price' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Offer Price' box.")
   
                });
                valid = false;
        }
  

        if ( document.catprod_vald.desc.value == "" )
        {
                // alert ( "Please fill in the 'price' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Description' box.")
   
                });
                valid = false;
        }

   
    return valid;
}

function feature_form_vald ( )
{
	valid = true;
if ( document.feature_form.features.value == "" )
        {
                // alert ( "Please fill in the 'Feature' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Feature' box.")
   
                });
                valid = false;
        }
 
     

    
    return valid;
}



function validate_form_catprod_edit()
{
	valid = true;
  if ( document.catprod_edit_vald.parent.selectedIndex == 0 )
    {
        // alert ( "Please select Parent Category." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please Select 'Parent Category'.")
   
                });
        valid = false;
    }
    if ( document.catprod_edit_vald.subcat.selectedIndex == 0 )
    {
        // alert ( "Please select Sub Category." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please Select 'SubCategory' .")
   
                });
        valid = false;
    }
    if ( document.catprod_edit_vald.subsubcat.selectedIndex == 0 )
    {
        // alert ( "Please select Sub Sub Category." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please select 'Sub sub Category' box.")
   
                });
        valid = false;
    }
if ( document.catprod_edit_vald.productname.value == "" )
        {
                // alert ( "Please fill in the 'productname' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Product Name' box.")
   
                });
                valid = false;
        }
 
if ( document.catprod_edit_vald.image.value == "" )
        {
                // alert ( "Please Upload an Image" );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please Upload an Image.")
   
                });
                valid = false;
        }
 
if ( document.catprod_edit_vald.price.value == "" )
        {
                // alert ( "Please fill in the 'price' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Price' box.")
   
                });
                valid = false;
        }

 
     

   
    return valid;
}


function shop_form_vald()
{
	valid = true;
  
if ( document.shop_form.shopname.value == "" )
        {
                // alert ( "Please fill in the 'Shop Name' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Shop Name' box.")
   
                });
                valid = false;
        }
 
if ( document.shop_form.shopphone.value == "" )
        {
                // alert ( "Please fill in the 'Shop Phone' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Shop Phone' box.")
   
                });
                valid = false;
        }
 

  if (document.shop_form.shopemail.value == "")
  {
  
 
    // alert("You have entered an invalid email address!")
    $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Email-id' box.")
   
                });
    valid = false;

  }
if ( document.shop_form.shopplace.value == "" )
        {
                // alert ( "Please fill in the 'Shop Place' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Shop Place' box.")
   
                });
                valid = false;
        }
        
if ( document.shop_form.shoplat.value == "" )
        {
                // alert ( "Please fill in the 'Lattitude' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Lattitude' box.")
   
                });
                valid = false;
        }
        
if ( document.shop_form.shoplong.value == "" )
        {
                // alert ( "Please fill in the 'Longitude' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Longitude' box.")
   
                });
                valid = false;
        } 
      
if ( document.shop_form.shopaddress.value == "" )
        {
                // alert ( "Please fill in the 'Shop Address' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Shop Address' box.")
   
                });
                valid = false;
        } 
      
          
if ( document.shop_form.image.value == "" )
        {
                // alert ( "Please fill in the 'Shop Address' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please Upload an Image.")
   
                });
                valid = false;
        } 
      
   
    return valid;
}







function shop_form_vald_edit()
{
	valid = true;
  
if ( document.shop_form_edit.shopname.value == "" )
        {
                // alert ( "Please fill in the 'Shop Name' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Shop Name' box.")
   
                });
                valid = false;
        }
 
if ( document.shop_form_edit.shopphone.value == "" )
        {
                // alert ( "Please fill in the 'Shop Phone' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Shop Phone' box.")
   
                });
                valid = false;
        }
 

  if (document.shop_form_edit.shopemail.value == "")
  {
  
 
    // alert("You have entered an invalid email address!")
    $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Email-id' box.")
   
                });
    valid = false;

  }
if ( document.shop_form_edit.shopplace.value == "" )
        {
                // alert ( "Please fill in the 'Shop Place' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Shop Place' box.")
   
                });
                valid = false;
        }
        
if ( document.shop_form_edit.shoplat.value == "" )
        {
                // alert ( "Please fill in the 'Lattitude' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Lattitude' box.")
   
                });
                valid = false;
        }
        
if ( document.shop_form_edit.shoplong.value == "" )
        {
                // alert ( "Please fill in the 'Longitude' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Longitude' box.")
   
                });
                valid = false;
        } 
      
if ( document.shop_form_edit.shopaddress.value == "" )
        {
                // alert ( "Please fill in the 'Shop Address' box." );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Shop Address' box.")
   
                });
                valid = false;
        } 
      
       
   
    return valid;
}



function shop_ban_vald ( )
{
	valid = true;
  if ( document.shop_ban_form.shopname.selectedIndex == 0 )
    {
        // alert ( "Please select Shop Name." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please Select'Shop Name' box.")
   
                });
        valid = false;
    }
     
        if ( document.shop_ban_form.image.value == "" )
        {
                // alert ( "Please Upload an Image" );
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


function shop_ban_edit_vald ( )
{
	valid = true;
  if ( document.shop_ban_edit.shopname.selectedIndex == 0 )
    {
        // alert ( "Please select Shop Name." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please select Shop Name.")
   
                });
        valid = false;
    }
     
     
    return valid;
}

function shopprod_vald ( )
{
	valid = true;
  if ( document.shoprod_form.shopname.selectedIndex == 0 )
    {
        // alert ( "Please select Shop Name." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please select Shop Name")
   
                });
        valid = false;
    }
    if ( document.shoprod_form.productname.selectedIndex == 0 )
    {
        // alert ( "Please select Product Name." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please Select Product Name.")
   
                });
        valid = false;
    }
    if ( document.shoprod_form.price.value == "" )
        {
                // alert ( "Please Fill in the 'Price'box" );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Price' box.")
   
                });
                valid = false;
        }
        if ( document.shoprod_form.offprice.value == "" )
        {
                // alert ( "Please Fill in the 'Price'box" );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Offer Price' box.")
   
                });
                valid = false;
        }
 
        if ( document.shoprod_form.dscnt.value == "" )
        {
                // alert ( "Please Fill in the 'Price'box" );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Discount' box.")
   
                });
                valid = false;
        }
    return valid;
}


function shopprod_edit_vald ( )
{
	valid = true;
  if ( document.shopprod_edit_form.shopname.selectedIndex == 0 )
    {
        // alert ( "Please select Shop Name." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please select the Shop Name.")
   
                });
        valid = false;
    }
    if ( document.shopprod_edit_form.productname.selectedIndex == 0 )
    {
        // alert ( "Please select Product Name." );
        $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please select Product Name.")
   
                });
        valid = false;
    }
    if ( document.shopprod_edit_form.price.value == "" )
        {
                // alert ( "Please Fill in the 'Price'box" );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Price' box.")
   
                });
                valid = false;
        }
        if ( document.shopprod_edit_form.offprice.value == "" )
        {
                // alert ( "Please Fill in the 'Price'box" );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Offer Price' box.")
   
                });
                valid = false;
        }
        if ( document.shopprod_edit_form.dscnt.value == "" )
        {
                // alert ( "Please Fill in the 'Price'box" );
                $(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });

  
                toastr.error("Please fill in the 'Discount' box.")
   
                });
                valid = false;
        }
     
    return valid;
}


function addprod_image_vald ( )
{
	valid = true;
 
        if ( document.prodimage_form.image.value == "" )
        {
                // alert ( "Please Upload an Image" );
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




$('#example1').on('click','.delvar',function(){
    var checkstr =  confirm('Are you sure you want to delete this?');
    if(checkstr == true){
  
    }else{
    return false;
    }
});


$('#variant_list').on('click','.delvar1',function(){
    var checkstr =  confirm('Are you sure you want to delete this?');
    if(checkstr == true){
  
    }else{
    return false;
    }
});

$('#feature_list').on('click','.delft',function(){
    var checkstr =  confirm('Are you sure you want to delete this?');
    if(checkstr == true){
  
    }else{
    return false;
    }
});

$('#feature_list1').on('click','.delft',function(){
    var checkstr =  confirm('Are you sure you want to delete this?');
    if(checkstr == true){
  
    }else{
    return false;
    }
});

$('#product_list').on('click','.delimg',function(){
    var checkstr =  confirm('Are you sure you want to delete this?');
    if(checkstr == true){
  
    }else{
    return false;
    }
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