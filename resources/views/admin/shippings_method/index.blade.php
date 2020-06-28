@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Shipping Methods</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Shippings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     @if ( Session::has('flash_message') )
    <div class="alert {{ Session::get('flash_type', 'alert-danger') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
    </div>
    @endif
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <a href="{{route('shippings.create')}}" class="btn btn-success" style="float: right;">Add Shipping Method</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
     <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <h3 class="card-title">All Shipping Method</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="categories" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Method_name</th>
      <th scope="col">Duration(Minutes)</th>
      <th scope="col">Price($)</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated_at</th>
      <th scope="col">Action</th>
      <th scope="col">Delete</th>
    </tr>
    
  </thead>
  <tbody>
  @if($shippings_method) 	
    @foreach($shippings_method as $shipping_method)	
    <tr>
      <td>{{$shipping_method->id}}</td>
      <td><a href="{{route('shippings.edit', $shipping_method->id)}}">{{$shipping_method->method_name}}</a></td>
      <td>{{$shipping_method->duration}}</td>
       <td>{{$shipping_method->price}}</td>
      <td>{{$shipping_method->created_at ? $shipping_method->created_at->diffForHumans() : 'No data'}}</td>
      <td>{{$shipping_method->updated_at ? $shipping_method->updated_at->diffForHumans() : 'No data'}}</td>
      <td><a style="color:black" href="{{route('shippings.edit', $shipping_method->id)}}">Edit</a></td>

      <td>
		{!!Form::open(['method'=>'DELETE' , 'action'=>['AdminShippingMethodController@destroy', $shipping_method->id]])!!}
			{!!Form::submit('Delete', ['class'=>'btn btn-danger col-sm-12'])!!}
		{!!Form::close()!!}
      </td>
    </tr>
    
    @endforeach
   @endif 
  </tbody>
  </table>
</div>
<!-- /.card-body -->

</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
    </section>
</div>
@stop

