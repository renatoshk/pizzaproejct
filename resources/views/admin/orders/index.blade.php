@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
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
    <h3 class="card-title">All Orders</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
   <table id="categories" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Product</th>
          <th scope="col">Client</th>
          <th scope="col">Status</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total Price</th>
          <th scope="col">Created_at</th>
          <th scope="col">Updated_at</th>
          <th scope="col">Delete</th>
        </tr>
    
  </thead>
  <tbody>
  @if($orders) 	
    @foreach($orders as $order)	
    <tr>
      <td>{{$order->id}}</td>
      <td>{{$order->product ? $order->product->id : 'Uncategorized'}}</td>
      <td>{{$order->user ? $order->user->username : 'No user'}}</td>
      <td>{{$order->status}}</td>
      <td>{{$order->qty}}</td>
       <td>${{$order->total_price}}</td>
      <td>{{$order->created_at ? $order->created_at->diffForHumans() : 'No data'}}</td>
      <td>{{$order->updated_at ? $order->updated_at->diffForHumans() : 'No data'}}</td>
      <td>
        {!!Form::open(['method'=>'DELETE', 'action'=>['AdminOrdersController@destroy', $order->id]])!!}
              <div class="form-group">
                {!!Form::submit('DELETE', ['class'=>'form-control btn btn-danger'])!!}
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

