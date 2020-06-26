@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
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
    {!!Form::open(['method'=>'POST', 'action'=>'AdminProductController@store',  'files'=>'true'])!!}
                <div class="card-body">
                  <div class="form-group" id="attr_group_select">
                    <label for="type">Product Type:</label>
                    {!!Form::select('product_type', [''=>'Choose Product  Type']+$attributes_set, null, ['class'=>'form-control'])!!}
                  </div>
                  <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" name="name" class="form-control" id="name">
                  </div>
                   <div class="form-group">
                    <label for="product_description">Product Description:</label>
                    <input type="text" name="description" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="price">Product Price:</label>
                    <input type="float" name="price" class="form-control" id="price">
                  </div>
                  <div class="form-group">
                    <label for="qty">Product Quantity:</label>
                    <input type="number" name="qty" class="form-control" id="qty">
                  </div>
                    <div class="form-group" id="file_upload">
                      {!!Form::file('photo_id', null, ['class'=>'form-control'])!!}
                    </div>
                  
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id='submit-btn'>Add Product</button>
                </div>
  {!!Form::close()!!}
  <!-- /.content -->
</div>
  </div>

@stop
