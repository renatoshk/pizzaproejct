@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section>
<br>
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-info') }}">
      <h3>{{ Session::get('flash_message') }}<a href="{{route('products.index')}}">Click here to see it!</a></h3>
  </div>
@endif
<br>
<!-- Krijimi  e categories -->
<div class="col-sm-10">
    {!!Form::model($product, ['method'=>'PATCH', 'action'=>['AdminProductController@update', $product->id], 'files'=>'true'])!!}
                <div class="card-body">
                  <div class="form-group" id="attr_group_select">
                    <label for="type">Product Type:</label>
                       <h4>{{$attr_set}}</h4>
                  </div>
                  <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" name="name" value="{{$product->name ?? ''}}" class="form-control" id="name">
                  </div>
                   <div class="form-group">
                    <label for="product_description">Product Description:</label>
                    <input type="text" name="description" value="{{$product->description ?? ''}}" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="price">Product Price:</label>
                    <input type="float" name="price" value="{{$product->price ?? ''}}" class="form-control" id="price">
                  </div>
                  <div class="form-group">
                    <label for="qty">Product Quantity:</label>
                    <input type="number" name="qty" value="{{$product->qty ?? ''}}" class="form-control" id="qty">
                  </div>
                    <div class="form-group">
                    <label for="status">Product Status:</label>
                    {!!Form::select('status', ['available'=>'available', 'unvailable'=>'unvailable'],null, ['class'=>'form-control'])!!}
                  </div>
                    <div class="form-group" id="file_upload">
                      {!!Form::file('photo_id', null, ['class'=>'form-control'])!!}
                    </div>
                    @if($condition)
                        @foreach($condition as $attrs)
                          @foreach($attrs as $attr)

                             <label for="status">{{$attr->label ?? ''}}:</label>
                             <input type="hidden" name="id_{{$attr->attr_code}}" value="{{$attr->id}}">
                              <input type="{{$attr->type}}" name="{{$attr->attr_code}}" value="{{App\Product_attribute::where('product_id',$product->id)->where('attribute_id', $attr->id)->first()->attribute_value ?? ''}}" class="form-control" id="status">
                           @endforeach
                        @endforeach
                    @endif
                  
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id='submit-btn'>Edit Product</button>
                </div>
  {!!Form::close()!!}
  <!-- /.content -->
</div>
  </div>

@stop
