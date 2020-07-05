@extends('layouts.web.index')
@section('content')
<style>
	/*
** Style Simple Ecommerce Theme for Bootstrap 4
** Created by T-PHP https://t-php.fr/43-theme-ecommerce-bootstrap-4.html
*/
.bloc_left_price {
    color: white;
    text-align: center;
    font-weight: bold;
    font-size: 150%;
}
.category_block li:hover {
    background-color: white;
}
.category_block li:hover a {
    color: white;
}
.category_block li a {
    color: #343a40;
}
.add_to_cart_block .price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 200%;
    margin-bottom: 0;
}
.add_to_cart_block .price_discounted {
    color: white;
    text-align: center;
    text-decoration: line-through;
    font-size: 140%;
}
.product_rassurance {
    padding: 10px;
    margin-top: 15px;
    background: #ffffff;
    border: 1px solid #6c757d;
    color: white;
}
.product_rassurance .list-inline {
    margin-bottom: 0;
    text-transform: uppercase;
    text-align: center;
}
.product_rassurance .list-inline li:hover {
    color: #343a40;
}
.reviews_product .fa-star {
    color: white;
}
.pagination {
    margin-top: 20px;
}
footer {
    background: #343a40;
    padding: 40px;
}
footer a {
    color: #f8f9fa!important
}

</style>
 <br> 
 <br>
    @if ( Session::has('flash_message') )
        <div class="alert {{ Session::get('flash_type', 'bg-black') }}">
          <h3>{{ Session::get('flash_message') }} <a href="/">Continue Shopping!</a></h3>
        </div>
    @endif
 <br>
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col"><h4>Product</h4></th>
                            <th scope="col"><h4>Available</h4></th>
                            <th scope="col" class="text-center"><h4>Quantity</h4></th>
                            <th scope="col" class="text-right"><h4>Price</h4></th>
                            <td scope="col" class="text-center"><h4>Update</h4></td>
                            <td scope="col"><h4>Delete</h4></td>
                        </tr>
                    </thead>
                    <tbody>
@if($orders)
    @foreach($orders as $order)
      {!!Form::model($order, ['method'=>'PATCH', 'action'=>['OrderController@update', $order->id]])!!}
                        <tr>
                            <td><img width="50px" height="50px" src="product_photos/{{$order->product->photo->product_image ?? ''}}" /> </td>
                            <td>{{$order->product->name ?? ''}}</td>
                            <td>{{$order->product->status ?? ''}}</td>
                            <td class="product-quantity">
                              <div class="quantity">
                                 <input type="number" size="4" class="input-text qty text" title="Qty" value="{{$order->qty}}" name="qty" min="1" max="{{$order->product->qty}}" step="1">
                              </div>
                           </td>
                           <input type="hidden" name="total_price" value="{{$order->total_price}}">
                            <td class="text-right">${{$order->total_price}}</td>
                              <td>
                               <button class="update btn btn-default" type="submit"><i class="fa fa-undo"></i> &nbsp;Update cart
                              </button>
                             </td>
         {!!Form::close()!!}
         {!!Form::open(['method'=>'DELETE', 'action'=>['OrderController@destroy', $order->id]])!!}
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                        </tr>
                    </tbody>
        {!!Form::close()!!}
    @endforeach
@endif
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    {{-- empty section --}}
                </div>
                <div class="col-sm-12 col-md-6">
                    <p class="total-price">Total price:${{$total_price}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light"><a style="color:black" href="/">Continue Shopping</a></button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase"><a href="">Checkout</a></button>
                </div>
        </div>
            </div>
    </div>
</div>
@stop