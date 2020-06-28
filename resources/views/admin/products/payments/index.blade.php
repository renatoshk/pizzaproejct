@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Customer Payments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payments</li>
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
    <h3 class="card-title">All Customer Payments</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="categories" class="table table-bordered table-striped">
    <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">User</th>
            <th scope="col">Orders</th>
            <th scope="col">Credit Card Name</th>
            <th scope="col">Credit Card Number</th>
            <th scope="col">Expiration</th>
             <th scope="col">Verification Number</th>
            <th scope="col">Delete</th>
          </tr>
    
  </thead>
  <tbody>
  @if($payments) 	
    @foreach($payments as $payment)	

    <tr>
      <td>{{$payment->id}}</td>
      <td>{{$payment->user ? $payment->user->username : 'No user'}}</td>
      <td>{{$payment->order_id ? $payment->order_id : 'No order'}}</td>

      <td>{{$payment->credit_card_name }}</td>
      <td>{{$payment->credit_card_number }}</td>
      <td>{{$payment->expiration}}</td>
      <td>{{$payment->verification_number}}</td>
      <td>
        {!!Form::open(['method'=>'DELETE' , 'action'=>['AdminPaymentController@destroy', $payment->id]])!!}
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

