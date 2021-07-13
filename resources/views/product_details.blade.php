<!doctype html>@extends('layout.weblayout') @section('content')

@include('layout.webpartials.navbar')
<!-- Main Wrapper Start -->
    <!-- Header-area end -->
    <style>
        .checked {
            color: orange;
        }
        .rate{
            color: orange; 
        }
        .active-color{
            border:4px solid black;
        }
        .custom-radios div {
        display: inline-block;
        }
        .custom-radios input[type="radio"] {
        display: none;
        }
        .custom-radios input[type="radio"] + label {
        color: #333;
        font-family: Arial, sans-serif;
        font-size: 14px;
        }
        .custom-radios input[type="radio"] + label span {
        display: inline-block;
        width: 25px;
        height: 25px;
        margin: -1px 4px 0 0;
        vertical-align: middle;
        cursor: pointer;
        border-radius: 50%;
        border: 2px solid #fff;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
        background-repeat: no-repeat;
        background-position: center;
        text-align: center;
        line-height: 25px;
        }
        .custom-radios input[type="radio"] + label span img {
        opacity: 0;
        transition: all 0.3s ease;
        }

        .custom-radios input[type="radio"]:checked + label span img {
        opacity: 1;
        }
        .nstock{
            color:#ef0808;
            margin-right: 9px;
        }
    </style>

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{url('subcatlist/'.$subcategory->id)}}">{{$subcategory->categoryname}}</a></li>
                        <li class="breadcrumb-item "><a href="{{url('productlist/'.$subsubcategory->id)}}">{{$subsubcategory->categoryname}}</a></li>
                        <li class="breadcrumb-item "><a href="{{url('shoplisting/'.$product->id.'/'.$subsubcategory->id)}}">{{$product->product_name}}</a></li>
                        <li class="breadcrumb-item active">{{$shop->shop_name}}</li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    <div class="ad-area">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($banner as $banner)
                    <img src="{{ asset('/admin/images/'.$banner->banner_image) }}" alt="" />
                    @endforeach
                </div>
            </div>
		</div>
    </div>

    <br><br>

    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <input type="hidden" value="detail" name="pagetype"  id="pagetype">
            <div class="row single-product-area">
                <div class="col-lg-6 col-md-6" id="website_product_image_slide">
                   <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images-2 slider-lg-image-2 productimages" id="productimages_slides">
                            @foreach($productimages as $productimages)
                            <div class="lg-image">
                                <a href="{{ asset('/admin/images/'.$productimages->product_images) }}" class="img-poppu"><img src="{{ asset('/admin/images/'.$productimages->product_images) }}" alt="product image"></a>
                            </div>
                            @endforeach                       
                        </div>
                        <div class="product-details-thumbs-2 slider-thumbs-2 " id="productimages_thumbnail">
                            @foreach($productimages1 as $productimages1)									
                            <div class="sm-image"><img src="{{ asset('/admin/images/'.$productimages1->product_images) }}" alt="product image thumb"></div>
                            @endforeach
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>
                <input type="hidden" id="shop_id" value="{{$products->shop_id}}">
                <div class="col-lg-6 col-md-6" id="product_description_id">
                    <div class="product-details-view-content">
                        <div class="product-info">
                            <h2>{{$products->product_name}}</h2>                         
                            <input type="hidden" id="shopproduct_id" value="{{$products->product_id}}">
                            <div class="price-box">                       
                                @if($products->shprice==$products->shoffprice)                         
                                    <span class="new-price">{{$products->shoffprice}} AED</span>
                                @else
                                    <span class="old-price">{{$products->shprice}} AED</span>
                                    <span class="new-price1">{{$products->shoffprice}} AED</span>
                                @endif
                                @php
                                    $dis=round(((($products->shprice)-($products->shoffprice))/($products->shprice))*100)             
                                @endphp
                                @if($products->shprice!=$products->shoffprice) 
                                    <span class="discounts discount-percentage">Save @php echo $dis; @endphp  %</span>
                                @endif
                            </div>
                            <div id="out_of_stock" style="display:none;">
                                <h3>OUT OF STOCK</h3>
                            </div>
                            <p>{{$products->description}}.</p>                            
                            <input type="hidden" name="moqvalue" value="{{$products->moq}}" id="moqvalue">
                            <input type="hidden" name="maxProductStock" value="{{$products->stock}}" id="maxProductStock">

                            <div class="product-variants">
                                    @php
                           
                                    $size=DB::table('shop_products')
                                    ->leftJoin('shop_varients', 'shop_products.size', '=', 'shop_varients.id')
                                    ->where('shop_products.size','!=',0)
                                    ->where('shop_varients.varient_type_id',2)
                                    ->where('shop_products.product_id',$products->product_id)
                                    ->groupBy('shop_products.size')
                                    ->select('shop_products.*','shop_varients.*')
                                    ->get();
                                   
                                  
                                    
                                    
                                    $varientnamesize=DB::table('shop_varient_types')->where('id',2)->first();
                                    @endphp
                                     @if(!$size->isEmpty())
                                    <div class="produt-variants-size">
                                        <label>{{$varientnamesize->varient_type}}</label>

                                       
                                    
                                        <select class="form-control  p_variant  selectsize" id="sizeid" data-variant="size" >
                                        <option value="0">select</option>
                                        @foreach($size as $size)
                                       
                                        <option value="{{$size->size}}" @if($size->size==$products->size) selected @endif>{{$size->varient}}</option>

                                        @endforeach

                                    </select>


                                    </div>
                                    @endif
                                    @php
                           
                                $color=DB::table('shop_products')
                                ->leftJoin('shop_varients', 'shop_products.color', '=', 'shop_varients.id')
                                ->where('shop_products.color','!=',0)
                                ->where('shop_varients.varient_type_id',1)
                                ->where('shop_products.product_id',$products->product_id)
                                ->where('shop_products.shop_id',$idd)
                                ->groupBy('shop_products.color')
                                ->select('shop_products.*','shop_varients.*')
                                ->get();
                               
                                
                                
                                $varientnamesize=DB::table('shop_varient_types')->where('id',1)->first();
                                @endphp
                                @if(!$color->isEmpty())
                                <div class="produt-variants-color">
                                    <label>{{$varientnamesize->varient_type}}</label>

                                
                                 
                                    <select class="form-control   p_variant selectcolor" name="color" id="color_id" data-variant="color" >
                                    <option value="0">select</option>
                                    @foreach($color as $color)
                                    
                                    <option value="{{$color->color}}"  @if($color->color==$products->color) selected @endif>{{$color->varient}}</option>

                                    @endforeach

                                </select>


                                </div>
                                @endif    
                                @php
                           
                           $storage=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.storage', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',3)
                           ->where('shop_products.storage','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.storage')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnamestorage=DB::table('shop_varient_types')->where('id',3)->first();
                           
                           @endphp
                           
                           @if(!$storage->isEmpty())
                           <div class="produt-variants-storage">
                               <label>{{$varientnamestorage->varient_type}}</label>

                           
                           
                               <select class="form-control  p_variant selectstorage" id="storage_id" data-variant="storage">
                               <option value="0">select</option>
                               @foreach($storage as $key3)
                               <option value="{{$key3->storage}}"  @if($key3->storage==$products->storage) selected @endif>{{$key3->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif   
                           @php
                           
                           $ram=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.RAM', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',4)
                           ->where('shop_products.RAM','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.RAM')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnameram=DB::table('shop_varient_types')->where('id',4)->first();
                           @endphp
                           @if(!$ram->isEmpty())
                           <div class="produt-variants-ram">
                               <label>{{$varientnameram->varient_type}}</label>

                           
                           
                               <select class="form-control   p_variant selectram" id="ram_id" data-variant="RAM">
                               <option value="0">select</option>
                               @foreach($ram as $key4)
                               <option value="{{$key4->RAM}}"  @if($key4->RAM==$products->RAM) selected @endif>{{$key4->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $inch=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.inch', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',5)
                           ->where('shop_products.inch','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.inch')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnameinch=DB::table('shop_varient_types')->where('id',5)->first();
                           @endphp
                           @if(!$inch->isEmpty())
                           <div class="produt-variants-inch">
                               <label>{{$varientnameinch->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectinch" id="inch_id" data-variant="inch" >
                               <option value="0">select</option>
                               @foreach($inch as $key5)
                               <option value="{{$key5->inch}}"  @if($key5->inch==$products->inch) selected @endif>{{$key5->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $weight=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.weight', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',6)
                           ->where('shop_products.weight','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.weight')
                           ->select('shop_products.*','shop_varients.*','shop_varients.id as varientid')
                           ->get();
                          
                           
                           
                           $varientnameweight=DB::table('shop_varient_types')->where('id',6)->first();
                           @endphp
                           @if(!$weight->isEmpty())
                           <div class="produt-variants-weight">
                               <label>{{$varientnameweight->varient_type}}</label>

                           
                           
                               <select class="form-control  p_variant selectweight" id="weight_id"  data-variant="weight" >
                               <option value="0">select</option>
                               @foreach($weight as $key6)
                               <option value="{{$key6->varientid}}"  @if($key6->weight==$products->weight) selected @endif>{{$key6->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif   
                           @php
                           
                           $display=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.display', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',7)
                           ->where('shop_products.display','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.display')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnamedisplay=DB::table('shop_varient_types')->where('id',7)->first();
                           @endphp
                           @if(!$display->isEmpty())
                           <div class="produt-variants-display" >
                               <label>{{$varientnamedisplay->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectdisplay" id="display_id" data-variant="display" >
                               <option value="0">select</option>
                               @foreach($display as $key7)
                               <option value="{{$key7->display}}"  @if($key7->display==$products->display) selected @endif>{{$key7->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $lens=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.lens', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',8)
                           ->where('shop_products.lens','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.lens')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnamelens=DB::table('shop_varient_types')->where('id',8)->first();
                           @endphp
                           @if(!$lens->isEmpty())
                           <div class="produt-variants-lens">
                               <label>{{$varientnamelens->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectlens" id="lens_id" data-variant="lens">
                               <option value="0">select</option>
                               @foreach($lens as $key8)
                               <option value="{{$key8->lens}}"  @if($key8->lens==$products->lens) selected @endif>{{$key8->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $type=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.type', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',9)
                           ->where('shop_products.type','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.type')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnametype=DB::table('shop_varient_types')->where('id',9)->first();
                           @endphp
                           @if(!$type->isEmpty())
                           <div class="produt-variants-type">
                               <label>{{$varientnametype->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selecttype" id="type_id" data-variant="type">
                               <option value="0">select</option>
                               @foreach($type as $key9)
                               <option value="{{$key9->type}}"  @if($key9->type==$products->type) selected @endif>{{$key9->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $material=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.material', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',10)
                           ->where('shop_products.material','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.material')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnamematerial=DB::table('shop_varient_types')->where('id',10)->first();
                           @endphp
                           @if(!$material->isEmpty())
                           <div class="produt-variants-material">
                               <label>{{$varientnamematerial->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectmaterial" id="material_id" data-variant="p_variant" >
                               <option value="0">select</option>
                               @foreach($material as $key10)
                               <option value="{{$key10->material}}"  @if($key10->material==$products->material) selected @endif>{{$key10->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $speed=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.speed', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',11)
                           ->where('shop_products.speed','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.speed')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnamespeed=DB::table('shop_varient_types')->where('id',11)->first();
                           @endphp
                           @if(!$speed->isEmpty())
                           <div class="produt-variants-speed">
                               <label>{{$varientnamespeed->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectspeed" id="speed_id" data-variant="speed">
                               <option value="0">select</option>
                               @foreach($speed as $key11)
                               <option value="{{$key11->speed}}"  @if($key11->material==$products->speed) selected @endif>{{$key11->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $beamwidth=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.beamwidth', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',12)
                           ->where('shop_products.beamwidth','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.beamwidth')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnamebeamwidth=DB::table('shop_varient_types')->where('id',12)->first();
                           @endphp
                           @if(!$beamwidth->isEmpty())
                           <div class="produt-variants-beamwidth">
                               <label>{{$varientnamebeamwidth->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectbeamwidth" id="beamwidth_id" data-variant="beamwidth">
                               <option value="0">select</option>
                               @foreach($beamwidth as $key12)
                               <option value="{{$key12->beamwidth}}"  @if($key12->beamwidth==$products->beamwidth) selected @endif>{{$key12->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $Headshape=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.Headshape', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',13)
                           ->where('shop_products.Headshape','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.Headshape')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnameHeadshape=DB::table('shop_varient_types')->where('id',13)->first();
                           @endphp
                           @if(!$Headshape->isEmpty())
                           <div class="produt-variants-Headshape">
                               <label>{{$varientnameHeadshape->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectHeadshape" name="Headshape" id="Headshape_id" data-variant="Headshape">
                               <option value="0">select</option>
                               @foreach($Headshape as $key13)
                               <option value="{{$key13->Headshape}}"  @if($key13->Headshape==$products->Headshape) selected @endif>{{$key13->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $Cover=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.Cover', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',14)
                           ->where('shop_products.Cover','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.Cover')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnameCover=DB::table('shop_varient_types')->where('id',14)->first();
                           @endphp
                           @if(!$Cover->isEmpty())
                           <div class="produt-variants-Cover">
                               <label>{{$varientnameCover->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectCover"  name="Cover" id="Cover_id" data-variant="Cover">
                               <option value="0">select</option>
                               @foreach($Cover as $key14)
                               <option value="{{$key14->Cover}}"  @if($key14->Cover==$products->Cover) selected @endif>{{$key14->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $Madeof=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.Madeof', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',15)
                           ->where('shop_products.Madeof','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.Madeof')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnameMadeof=DB::table('shop_varient_types')->where('id',15)->first();
                           @endphp
                           @if(!$Madeof->isEmpty())
                           <div class="produt-variants-Madeof">
                               <label>{{$varientnameMadeof->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectMadeof" name="Madeof" id="Madeof_id" data-variant="Madeof">
                               <option value="0">select</option>
                               @foreach( $Madeof as $key15)
                               <option value="{{$key15->Madeof}}"  @if($key15->Madeof==$products->Madeof) selected @endif>{{$key15->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $Inclusions=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.Inclusions', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',16)
                           ->where('shop_products.Inclusions','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.Inclusions')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnameInclusions=DB::table('shop_varient_types')->where('id',16)->first();
                           @endphp
                           @if(!$Inclusions->isEmpty())
                           <div class="produt-variants-Inclusions">
                               <label>{{$varientnameInclusions->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectInclusions" name="Inclusions" id="Inclusions" data-variant="Inclusions">
                               <option value="0">select</option>
                               @foreach($Inclusions as $key16)
                               <option value="{{$key16->Inclusions}}"  @if($key16->Inclusions==$products->Inclusions) selected @endif>{{$key16->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $capacity=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.capacity', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',17)
                           ->where('shop_products.capacity','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.capacity')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnamecapacity=DB::table('shop_varient_types')->where('id',17)->first();
                           @endphp
                           @if(!$capacity->isEmpty())
                           <div class="produt-variants-capacity">
                               <label>{{$varientnamecapacity->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant  selectcapacity" name="capacity" id="capacity_id" data-variant="capacity">
                               <option value="0">select</option>
                               @foreach($capacity as $key17)
                               <option value="{{$key17->capacity}}"  @if($key17->capacity==$products->capacity) selected @endif>{{$key17->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $Language=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.Language', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',18)
                           ->where('shop_products.Language','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.Language')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnameLanguage=DB::table('shop_varient_types')->where('id',18)->first();
                           @endphp
                           @if(!$Language->isEmpty())
                           <div class="produt-variants-Language">
                               <label>{{$varientnameLanguage->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectLanguage" name="Language" id="Language_id" data-variant="Language">
                               <option value="0">select</option>
                               @foreach($Language as $key18)
                               <option value="{{$key18->Language}}"  @if($key18->Language==$products->Language) selected @endif>{{$key18->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                            
                           @php
                           
                           $Binding=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.Binding', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',19)
                           ->where('shop_products.Binding','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.Binding')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnameBinding=DB::table('shop_varient_types')->where('id',19)->first();
                           @endphp
                           @if(!$Binding->isEmpty())
                           <div class="produt-variants-Binding">
                               <label>{{$varientnameBinding->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectBinding" name="Binding" id="Binding_id" data-variant="Binding">
                               <option value="0">select</option>
                               @foreach($Binding as $key19)
                               <option value="{{$key19->Binding}}"  @if($key19->Binding==$products->Binding) selected @endif>{{$key19->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $Publisher=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.Publisher', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',20)
                           ->where('shop_products.Publisher','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.Publisher')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnamePublisher=DB::table('shop_varient_types')->where('id',20)->first();
                           @endphp
                           @if(!$Publisher->isEmpty())
                           <div class="produt-variants-Publisher">
                               <label>{{$varientnamePublisher->varient_type}}</label>

                           
                           
                               <select class="form-control  p_variant selectPublisher" name="Publisher" id="Publisher_id" data-variant="Publisher">
                               <option value="0">select</option>
                               @foreach($Publisher as $key20)
                               <option value="{{$key20->Publisher}}"  @if($key20->Publisher==$products->Publisher) selected @endif>{{$key20->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif  
                           @php
                           
                           $Genre=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.Genre', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',21)
                           ->where('shop_products.Genre','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.Genre')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnameGenre=DB::table('shop_varient_types')->where('id',21)->first();
                           @endphp
                           @if(!$Genre->isEmpty())
                           <div class="produt-variants-Genre">
                               <label>{{$varientnameGenre->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectGenre" name="Genre" id="Genre_id" data-variant="Genre">
                               <option value="0">select</option>
                               @foreach($Genre as $key21)
                               <option value="{{$key21->Genre}}"  @if($key21->Genre==$products->Genre) selected @endif>{{$key21->varient}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif 
                           @php
                           
                           $ISBN=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.ISBN', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',22)
                           ->where('shop_products.ISBN','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.ISBN')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnameISBN=DB::table('shop_varient_types')->where('id',22)->first();
                           @endphp
                           @if(!$ISBN->isEmpty())
                           <div class="produt-variants-ISBN">
                               <label>{{$varientnameISBN->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectISBN" name="ISBN" id="ISBN_id" data-variant="ISBN">
                               <option value="0">select</option>
                               @foreach($ISBN as $key22)
                               <option value="{{$key22->ISBN}}"  @if($key22->ISBN==$products->ISBN) selected @endif>{{$key22->ISBN}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif 
                           @php
                           
                           $Pages=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.Pages', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',23)
                           ->where('shop_products.Pages','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.Pages')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnamePages=DB::table('shop_varient_types')->where('id',23)->first();
                           @endphp
                           @if(!$Pages->isEmpty())
                           <div class="produt-variants-Pages">
                               <label>{{$varientnamePages->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectPages" name="Pages" id="Pages_id" data-variant="Pages">
                               <option value="0">select</option>
                               @foreach($Pages as $key23)
                               <option value="{{$key23->Pages}}"  @if($key23->Pages==$products->Pages) selected @endif>{{$key23->Pages}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif 
                           @php
                           
                           $quantity=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.quantity', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',24)
                           ->where('shop_products.quantity','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.quantity')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnamequantity=DB::table('shop_varient_types')->where('id',24)->first();
                           @endphp
                           @if(!$quantity->isEmpty())
                           <div class="produt-variants-quantity">
                               <label>{{$varientnamequantity->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectquantity" id="quantity_id" name="quantity" data-variant="quantity">
                               <option value="0">select</option>
                               @foreach($quantity as $key24)
                               <option value="{{$key24->quantity}}"  @if($key24->quantity==$products->quantity) selected @endif>{{$key24->quantity}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif 
                           @php
                           
                           $shade=DB::table('shop_products')
                           ->leftJoin('shop_varients', 'shop_products.shade', '=', 'shop_varients.id')
                           ->where('shop_varients.varient_type_id',25)
                           ->where('shop_products.shade','!=',0)
                           ->where('shop_products.product_id',$products->product_id)
                           ->where('shop_products.shop_id',$idd)
                           ->groupBy('shop_products.shade')
                           ->select('shop_products.*','shop_varients.*')
                           ->get();
                          
                           
                           
                           $varientnameshade=DB::table('shop_varient_types')->where('id',25)->first();
                           @endphp
                           @if(!$shade->isEmpty())
                           <div class="produt-variants-shade">
                               <label>{{$varientnameshade->varient_type}}</label>

                           
                           
                               <select class="form-control p_variant selectshade" id="shade_id"  name="shade" data-variant="shade">
                               <option value="0">select</option>
                               @foreach($shade as $key25)
                               <option value="{{$key25->shade}}"  @if($key25->shade==$products->shade) selected @endif>{{$key25->shade}}</option>

                               @endforeach

                           </select>


                           </div>
                           @endif 
                              
                            </div>
                          

                            <div class="single-add-to-cart">

                                <form action="#" class="cart-quantity">

                                    <div class="quantity">

                                        <label>Quantity</label>

                                        <div class="cart-plus-minus">
                                          @if($products->moq==NULL)

                                            <input class="cart-plus-minus-box" value="1" id="amountvalue" type="text">
                                         @else
                                            
                                             <input class="cart-plus-minus-box" value="{{$products->moq}}" id="amountvalue" type="text">

                                           @endif

                                        </div>

                                    </div>

                                    <button class="add-to-cart add-cart" type="submit" data-shopid="{{$idd}}" data-proid="{{$proid}}"  data-catid="{{$catid}}" data-color="{{$colorid}}" data-productidd="{{$products->shoproid}}" data-productname="{{$products->product_name}}" data-image="{{ asset('/admin/images/'.$products->image) }}" data-rate="{{$products->shoffprice}}" >Add to cart </button>

                                    <p id="gotocart"></p>

                                </form>

                            </div>
                            
                            @if($products->moq!=0)

                            <div class="product-availability">

<i class="fa fa-check"></i> Minimum Order Quantity : {{$products->moq}}

</div>
@endif
@if($products->stock!=0)
                            <div class="product-availability">
                           
                              <i class="fa fa-check"></i> In stock
                              </div>

@else
<div class="product-stock">
<i class="fa fa-close nstock"></i> No stock
                   @endif         </div>

                            <div class="product-social-sharing">

                                <label>Share</label>

                                <ul>

                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>

                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>

                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>

                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div> 

               

            </div>

            <div class="container">

                <div class="col-12">

                    <div class="product-details-tab mt--60">

                        <ul role="tablist" class="mb--50 nav">

                            <li class="active" role="presentation">

                                <a data-toggle="tab" role="tab" href="#description" class="active">Description</a>

                            </li>

                            <li role="presentation">

                                <a data-toggle="tab" role="tab" href="#sheet">Product Details</a>

                            </li>
                            <li role="presentation">

<a data-toggle="tab" role="tab" href="#features">Features</a>

</li>
                            <li role="presentation">

                                <a data-toggle="tab" role="tab" href="#reviews">Reviews</a>

                            </li>

                        </ul>

                    </div>

                </div>

                <div class="col-12">

                    <div class="product_details_tab_content tab-content">

                        <!-- Start Single Content -->

                        <div class="product_tab_content tab-pane active" id="description" role="tabpanel">

                            <div class="product_description_wrap">

                                <div class="product_desc mb--30">

                                    <h2 class="title_3">Details</h2>

                                    <p>{{$products->description}}.</p>

                                </div>

                               

                            </div>

                        </div>

                        <!-- End Single Content -->

                        <!-- Start Single Content -->

                        <!-- <div class="product_tab_content tab-pane" id="sheet" role="tabpanel">

                            <div class="pro_feature">

                                <h2 class="title_3">Data sheet</h2>

                                <ul class="feature_list">

                                    <li><a href="#"><i class="fa fa-play"></i>Duis aute irure dolor in reprehenderit in voluptate velit esse</a></li>

                                    <li><a href="#"><i class="fa fa-play"></i>Irure dolor in reprehenderit in voluptate velit esse</a></li>

                                    <li><a href="#"><i class="fa fa-play"></i>Irure dolor in reprehenderit in voluptate velit esse</a></li>

                                    <li><a href="#"><i class="fa fa-play"></i>Sed do eiusmod tempor incididunt ut labore et </a></li>

                                    <li><a href="#"><i class="fa fa-play"></i>Sed do eiusmod tempor incididunt ut labore et </a></li>

                                    <li><a href="#"><i class="fa fa-play"></i>Nisi ut aliquip ex ea commodo consequat.</a></li>

                                    <li><a href="#"><i class="fa fa-play"></i>Nisi ut aliquip ex ea commodo consequat.</a></li>

                                </ul>

                            </div>

                        </div> -->
                        <div class="product_tab_content tab-pane" id="features" role="tabpanel">

                        <div class="pro_feature">

<h2 class="title_3">Features</h2>

<ul class="feature_list">

@foreach($productfeatures as $productfeatures)

    <li><a href="#"><i class="fa fa-play"></i>{{$productfeatures->features}}</a></li>

 @endforeach

</ul>
@if(!empty($shopfeature))
<ul class="feature_list">

@foreach($shopfeature as $shopfeature)

    <li><a href="#"><i class="fa fa-play"></i>{{$shopfeature->features}}</a></li>

 @endforeach

</ul>
@endif

</div>
</div>
                        <!-- End Single Content -->

                        <!-- Start Single Content -->

                        <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">

                            <div class="review_address_inner">

                                <!-- Start Single Review -->

                                @foreach($reviews as $reviews)

                                <div class="pro_review">

                                    <div class="review_thumb">

                                        <img alt="review images" src="{{asset('img/user_img.png')}}">

                                    </div>

                                    <div class="review_details">

                                        <div class="review_info">

                                            <h4><a href="#">{{$reviews->name}}</a></h4>

                                            <ul class="product-rating d-flex">

                                            @for ($i = 0; $i < $reviews->rating; $i++)

                                                <li><span class="fa fa-star checked"></span></li>

                                              

                                            @endfor

                                            @for($j=0;$j< 5-$reviews->rating; $j++)

                                            <li><span class="fa fa-star "></span></li>

                                            @endfor

                                            </ul>

                                            <div class="rating_send">

                                                <a href="#"><i class="fa fa-reply"></i></a>

                                            </div>

                                        </div>

                                        <div class="review_date">

                                        @php

                                        $date = strtotime($reviews->added_date); 



                                        @endphp

                                            <span>{{date('d/M/Y h:i:s', $date)}}</span>

                                        </div>

                                        <p >{{$reviews->description}}</p>

                                    </div>

                                </div>

                             @endforeach

                            </div>

                            <!-- Start RAting Area -->

                            

                            <div class="rating_wrap">

                                <h2 class="rating-title">Write  A review</h2>

                                <h4 class="rating-title-2">Your Rating</h4>

                                <div class="rating_list">

                                    <ul class="product-rating d-flex">



                                        <li><span data-id="1" class="fa fa-star rating" id="ratestar_1" ></span></li>

                                        <li><span data-id="2" class="fa fa-star rating" id="ratestar_2"></span></li>

                                        <li><span data-id="3" class="fa fa-star rating" id="ratestar_3"></span></li>

                                        <li><span  data-id="4" class="fa fa-star rating" id="ratestar_4"></span></li>

                                        <li><span data-id="5" class="fa fa-star rating" id="ratestar_5"></span></li>

                                    </ul>

                                </div>

                            </div>

                            <!-- End RAting Area -->

                            <div class="comments-area comments-reply-area">

                                <div class="row">

                                    <div class="col-lg-12">

                                    <form method="POST" name="myForm" onsubmit="return validateForm()"  action="{{url('insertreview')}}" enctype="multipart/form-data">@csrf

                                    

                                            <div class="comment-input">

                                                <p class="comment-form-author">

                                                <input type="hidden" name="shop_id" id="ratingid" value="{{$products->shoproid}}" required>

                                                <input type="hidden" name="yourrate"  id="yourate" required>

                                                    <label>Name <span class="required">*</span></label> 

                                                    <input type="text" name="name">

                                                </p>

                                                <p class="comment-form-email">

                                                    <label>Email <span class="required">*</span></label> 

                                                    <input type="text" name="email">

                                                </p>

                                            </div>

                                            <p class="comment-form-comment">

                                                <label>Comment</label> 

                                                <textarea class="comment-notes" name="description" ></textarea>

                                            </p>

                                            <div class="comment-form-submit">

                                                <input type="submit" name="submit" value="Post Comment" class="comment-submit">

                                            </div>

                                            </form>  

                                    </div>

                                </div>

                            </div> 

                                                     

                        </div>

                        <!-- End Single Content -->

                    </div>

                </div>

            </div>

         

        </div>

    </div>

    <!-- content-wraper end -->



    <br/>



    <br/><br/><div class="ad-area">

		<div class="container">

            <div class="row">

                <div class="col-lg-12">

    <img src="{{asset('web/assets/images/adbanner/banner02.gif')}}" alt=""/>

				</div>

			</div>

		</div>

	</div>

    

    

    <!-- Product Area Start -->

    <div class="product-area section-pt">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <!-- section-title start -->

                    <div class="section-title section-bg-2">

                        <h2>Other Products</h2>

                        <!--<p>Most Trendy 2018 Clother</p>-->

                    </div>

                    <!-- section-title end -->

                </div>

            </div>

            <!-- product-wrapper start -->

            <div class="product-wrapper">

                <div class="row product-slider">

                @foreach($other_products as $other_products)

                    <div class="col-12">

                        <!-- single-product-wrap start -->

                        <div class="single-product-wrap">

                            <div class="product-image">

                                <a href="#"><img src="{{ asset('/admin/images/'.$other_products->image) }}" alt=""></a>

                                <span class="label-product label-new">@if($other_products->new_status==1) new @endif</span>

                                <span class="label-product label-sale">-{{$other_products->shdiscount}}%</span>

                                <div class="quick_view">

                                    <a href="#" title="quick view" class="quick-view-btn modalproduct_details" data-id="{{$other_products->shpid}}" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>

                                </div>

                            </div>

                            <div class="product-content">

                                <h3><a href="#">Fusce nec facilisi</a></h3>

                                <div class="price-box">

                                    <span class="new-price">{{$other_products->shprice}} AED</span>

                                    <span class="old-price">{{$other_products->shoffprice}} AED</span>

                                </div>

                                <div class="product-action">

                                    <button class="add-to-cart" title="Add to cart"><i class="fa fa-plus"></i> Add to cart</button>

                                    <div class="star_content">

                                        <ul class="d-flex">

                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>

                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>

                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>

                                            <li><a class="star" href="#"><i class="fa fa-star"></i></a></li>

                                            <li><a class="star-o" href="#"><i class="fa fa-star-o"></i></a></li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- single-product-wrap end -->

                    </div>

                   @endforeach()

                </div>

            </div>

            <!-- product-wrapper end -->

        </div>

    </div>

    <!-- Product Area End -->

    

    

    

    <!-- Footer Aare Start -->

  

    <!-- Footer Aare End -->

    

    <!-- Modal Algemeen Uitgelicht start -->

    <!-- <div class="modal fade modal-wrapper" id="exampleModalCenter" >

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    <div class="modal-inner-area row">

                        <div class="col-lg-5 col-md-6 col-sm-6">

                           <!-- Product Details Left -->

                            <!-- <div class="product-details-left">

          

                                <div class="product-details-images slider-navigation-1" >

                               

                                    <div class="lg-image">

                                        <img src="/admin/images/lap1.jpg" alt="product image">

                                    </div>

                                    <div class="lg-image">

                                        <img src="/admin/images/lap1.jpg" alt="product image">

                                    </div>

                                    <div class="lg-image">

                                        <img src="/admin/images/lap1.jpg" alt="product image">

                                    </div>

                                    <div class="lg-image">

                                        <img src="/admin/images/lap1.jpg" alt="product image">

                                    </div>

                                </div>

                                <div class="product-details-thumbs slider-thumbs-1">										

                                    <div class="sm-image"><img src="/admin/images/lap1.jpg" alt="product image thumb"></div>

                                    <div class="sm-image"><img src="/admin/images/lap1.jpg" alt="product image thumb"></div>

                                    <div class="sm-image"><img src="/admin/images/lap1.jpg" alt="product image thumb"></div>

                                    <div class="sm-image"><img src="/admin/images/lap1.jpg" alt="product image thumb"></div>

                                </div>

                            </div>

                            <!--// Product Details Left -->

                        <!-- </div>



                        <div class="col-lg-7 col-md-6 col-sm-6">

                            <div class="product-details-view-content">

                                <div class="product-info">

                                    <h2 id="heading"></h2>

                                    <div class="price-box">

                                        <span class="old-price"></span>

                                        <span class="new-price">$</span>

                                        <span class="discount discount-percentage">Save 5%</span>

                                    </div>

                                    <p id="descriptionval"></p>

                                    <div class="product-variants">

                                        <div class="produt-variants-size">

                                            <label>Size</label>

                                            <select class="form-control-select" >

                                                <option value="1" title="S" selected="selected">S</option>

                                                <option value="2" title="M">M</option>

                                                <option value="3" title="L">L</option>

                                            </select>

                                        </div>

                                        <div class="produt-variants-color">

                                            <label>Color</label>

                                            <ul class="color-list">

                                                <li><a href="#" class="orange-color active"></a></li>

                                                <li><a href="#" class="paste-color"></a></li>

                                            </ul>

                                        </div>

                                    </div>

                                    <div class="single-add-to-cart">

                                        <form action="#" class="cart-quantity">

                                            <div class="quantity">

                                                <label>Quantity</label>

                                                <div class="cart-plus-minus">

                                                    <input class="cart-plus-minus-box" value="1" type="text">

                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>

                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>

                                                </div>

                                            </div>

                                            <button class="add-to-cart" type="submit">Add to cart</button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>    -->

    <!-- Modal Algemeen Uitgelicht end -->

    

</div>

@endsection