<input type="hidden" id="catproductid" name="catproductname" value="{{$cat_pro->id}}">



<div class="form-group col-sm-6">

    <label class="exampleModalLabel">Parent Category</label>

    <select name="parent" class="form-control category_edit" id="maincatnameedit">

        <option>select category</option>

        @foreach($cat as $key1)

        <option value="{{$key1->id}}" @if($cat_pro->main_category_id==$key1->id) selected @endif>{{$key1->categoryname}}

        </option>

        @endforeach

    </select>

</div>

<div class="form-group col-sm-6" id="subcategorydiv">

    <label class="exampleModalLabel">Sub Category</label>

    <select name="subcat" class="form-control subcategory_edit" id="subcategory_edit">

        @foreach($sub_cat as $key2)

        <option value="{{$key2->id}}" @if($cat_pro->category_id == $key2->id ) selected @endif >{{$key2->categoryname}}

        </option>

        @endforeach

    </select>

</div>

<div class="form-group col-sm-6" id="sub-subcategorydiv">

    <label class="exampleModalLabel">Sub-sub Category</label>

    <select name="subsubcat" class="form-control" id="subsubcategory_edit">

        @foreach($sub_subcat as $key3)

        <option value="{{$key3->id}}" @if($cat_pro->subsub_cat_id == $key3->id) selected @endif >{{$key3->categoryname}}

        </option>

        @endforeach

    </select>

</div>



<div class="form-group col-sm-6">

    <label class="exampleModalLabel">Product Name</label>

    <input type="text" name="productname" id="productname" value="{{$cat_pro->product_name}}" class="form-control"

        required>

</div>



<div class="form-group col-sm-12">

    <label class="exampleModalLabel">Image</label>

    <input type="file" name="image" id="image" class="form-control" accept="image/*">

</div>



<!-- <div class="form-group col-sm-12">

														<label class="exampleModalLabel">Rating</label><br>

														<input type="radio" name="rating" value="1" @if($cat_pro->rating==1) checked  @endif >1	&nbsp;

                                                        <input type="radio" name="rating" value="2" @if($cat_pro->rating==2) checked  @endif >2	&nbsp;

                                                        <input type="radio" name="rating" value="3"  @if($cat_pro->rating==3) checked  @endif >3	&nbsp;

                                                        <input type="radio" name="rating" value="4" @if($cat_pro->rating==4) checked  @endif >4	&nbsp;

                                                        <input type="radio" name="rating" value="5" @if($cat_pro->rating==5) checked  @endif  >5	&nbsp;

													</div> -->

<div class="form-group col-sm-4">

    <label class="exampleModalLabel">Discount</label>

    <input type="text" name="discount" id="discount" value="{{$cat_pro->discount}}" class="form-control" required>

</div>

<div class="form-group col-sm-4">

    <label class="exampleModalLabel">Price</label>

    <input type="text" name="price" id="price" value="{{$cat_pro->price}}" class="form-control" required>

</div>

<div class="form-group col-sm-4">

    <label class="exampleModalLabel">Offer Price</label>

    <input type="text" name="offerprice" id="offerprice" value="{{$cat_pro->offer_price}}" class="form-control"

        required>

</div>


<div class="form-group col-sm-12">

    <label class="exampleModalLabel">Description</label>

    <textarea class="form-control" id="desc" name="desc">{{$cat_pro->description}}</textarea>

</div>

<div class="form-group col-sm-12">

    <input type="checkbox" value="1" id="newstat" name="newstatus" @if($cat_pro->new_status==1) checked @endif > New

    product

</div>