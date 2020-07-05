@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Shipping Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">shipping</li>
            </ol>
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
    <h3 class="card-title">All Customers Shippings</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="categories" class="table table-bordered table-striped">
    <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">User</th>
            <th scope="col">Orders</th>
            <th scope="col">Shipping Method</th>
            <th scope="col">City</th>
            <th scope="col">Price</th>
             <th scope="col">Address</th>
            <th scope="col">Zip Code</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Delete</th>
          </tr>
    
  </thead>
  <tbody>
  @if($shippings) 	
    @foreach($shippings as $shipping)	

    <tr>
      <td>{{$shipping->id}}</td>
      <td>{{$shipping->user ? $shipping->user->username : 'No user'}}</td>
      <td>{{$shipping->order ? $shipping->order_id : 'No user'}}</td>
      <td>{{$shipping->shipping_method ? $shipping->shipping_method->method_name : '' }}</td>
      <td>{{$shipping->city}}</td>
      <td>{{$shipping->shipping_method->price}}</td>
      <td>{{$shipping->address}}</td>
      <td>{{$shipping->zip_code}}</td>
      <td>{{$shipping->created_at ? $shipping->created_at->diffForHumans() : 'No data'}}</td>
      <td>{{$shipping->updated_at ? $shipping->updated_at->diffForHumans() : 'No data'}}</td>
      <td>
        {!!Form::open(['method'=>'DELETE' , 'action'=>['AdminShippingController@destroy', $shipping->id]])!!}
        <div class="form-group">
          {!!Form::submit('Delete', ['class'=>'btn btn-danger'])!!}
        </div>
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

