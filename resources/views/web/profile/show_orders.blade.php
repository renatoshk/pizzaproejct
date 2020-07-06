@extends('layouts.web.index')
@section('content')
  <br>
  <br>
  @if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'bg-black') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
  <br>
  <br>
        <div class="col-lg-12">
          <h2 style="text-align: center" class="delivery-method tf"> My Orders </h2>
        </div>
      <div class="container">               
        <div class="table-responsive" style="border 1 px solid">          
          <table class="table">
            <thead>
              <tr>
               <td>Product</td>
                <td>Price</td>
                <td>Shipping Price</td>
                <td>Quantity</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                @if($orders)
                 @foreach($orders as $order)
                 @foreach ($order->shippings as $shipping)
                 <td>{{$order->product->name ?? ''}}</td>
                <td>${{$order->total_price ?? ''}}</td>
                <td>${{$shipping->shipping_method->price ?? ''}}</td>
                <td>{{$order->qty ?? ''}}</td>
              </tr>
                @endforeach
               @endforeach
              @endif
            </tbody>
          </table>
          </div>
     </div>
     <br>
     <br>
@stop