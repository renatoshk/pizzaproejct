@extends('layouts.web.index')
@section('content')
<br>
<br>
<br>
<style>
	@import url(https://fonts.googleapis.com/css?family=Calibri:400,300,700);


.card {
    margin: auto;
    max-width: 450px;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}

@media(max-width:768px) {
    .card {
        width: 90%
    }
}

.upper {
    padding: 6vh 6vh 3vh 6vh
}

.lower {
    padding: 4vh 0 6vh;
    text-align: center
}

.heading {
    display: flex;
    align-items: center;
    vertical-align: middle
}

.heading p {
    margin-bottom: 0
}

input {
    border: 1px solid white;
    padding: 0.75rem;
    outline: none;
    width: 100%;
    min-width: unset;
    background-color: white;
    color: black;
}

.form-element {
    margin: 4vh 0
}

form .col-3,
.col-9,
.col-1,
.col--11 {
    padding: 0;
    width: min-content
}

form .col-11 {
    padding-left: 10px
}

form .col-1 {
    display: flex;
    align-items: center;
    color: red;
    font-size: 3vh;
    justify-content: center
}

#code {
    text-align: center
}

form .row {
    margin: 0
}

hr {
    margin: 0;
    border-top: 2px solid rgba(0, 0, 0, .1)
}

#input-header {
    color: grey
}

.invalid {
    color: grey;
    line-height: 1.2
}

.btn {
    width: 50%;
    background-color: rgb(255, 38, 0);
    border-color: rgb(255, 38, 0);
    color: white;
    padding: 1.5vh 0
}

.btn:focus {
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none
}

.btn:hover {
    color: white
}

input:focus::-webkit-input-placeholder {
    color: transparent
}

input:focus:-moz-placeholder {
    color: transparent
}

input:focus::-moz-placeholder {
    color: transparent
}

input:focus:-ms-input-placeholder {
    color: transparent
}
</style>
 <div class="content-wrapper" style="min-height: 900px;">
<div class="card">
    <div class="upper">
        <div class="row">
            <div class="col-8 heading">
                <h5><b>Track Your Order</b></h5>
            </div>
        </div>
   {!!Form::open(['method'=>'POST', 'action'=>'OrderController@store'])!!}
             <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="form-element"> <span id="input-header">{{$attr_set ?? ''}} </span> </div>
            <div class="form-element"> <span id="input-header">{{$product->name ?? ''}}</span> </div>
            <div class="form-element"> <span id="input-header"><img src="/product_photos/{{$product->photo->product_image ?? ''}}" width="200px" height="200px" alt=""></span> </div>
          
    @if($condition)
      @foreach($condition as $attrs)
          @foreach($attrs as $attr)
               @if($attr->attr_code == 'size') 
                   	<input type="hidden" name="total_price" value="{{$product->price}}">
                  <div class="row ">
                   <select name="size" id="" class="form-element form-control">

                   	<option style= "color: black;"  value="small">Small( <?php $all = App\Product_attribute::where('product_id', $product->id)->where('attribute_id', $attr->id)->first()->attribute_value ?? '' ; $s = (int)$all - 6; echo $s;?> slices, ${{$product->price?? ''}})

                   	</option>
                   	<option style= "color: black;" value="medium">Medium( <?php $all = App\Product_attribute::where('product_id', $product->id)->where('attribute_id', $attr->id)->first()->attribute_value ?? '' ;$m = (int)$all -4; echo $m;?> slices,  ${{$product->price + 2.5 ?? ''}})</option>
                   	<option style= "color: black;" value="large">Large( <?php $all = App\Product_attribute::where('product_id', $product->id)->where('attribute_id', $attr->id)->first()->attribute_value ?? '' ; echo (int)$all;?> slices, ${{$product->price + 4.5 ?? ''}})</option>
                   </select>
                </div>
         @else   
            <div class="form-element">
            <input type="hidden" name="total_price" value="{{$product->price}}">
            <input type="hidden" name="dessert_size" value="{{ App\Product_attribute::where('product_id', $product->id)->where('attribute_id', $attr->id)->first()->attribute_value ?? ''}}">
            <div class="form-element"> <span id="input-header">${{$product->price ?? ''}}</span> </div>
                <div class="row invalid" >
                    <div>{{$attr->label ?? '' }} : </div>
                    {{ App\Product_attribute::where('product_id', $product->id)->where('attribute_id', $attr->id)->first()->attribute_value ?? ''}}
                </div>
            </div>
           @endif
       @endforeach
      @endforeach
    @endif
    <div class="form-element">
        @if(Auth::user())
          <label for="qty">Qty:</label>
            <div class="row invalid">
            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items" type="button"> <i class="fa fa-minus"></i> </button>
            <input type="text" class="input-text qty" title="Qty" value="1"  id="qty" name="qty">
            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if(qty < {{$product->qty}}) result.value++;return false;" class="increase items" type="button"> <i class="fa fa-plus"></i> </button>
            </div>
        </div>  
       @endif
    </div>
    <hr>
    <div class="lower"> <button class="btn">Track Order</button> </div>
        {!!Form::close()!!}
</div>
 </div>
@stop