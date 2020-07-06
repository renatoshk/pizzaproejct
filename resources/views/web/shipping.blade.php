@extends('layouts.web.index')
@section ('content')
  <br>
  <br>
  @if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-danger') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
  <br>
  <br>
        <div class="col-lg-12">
          <h2 style="text-align: center" class="delivery-method tf"> Choose your delivery method </h2>
        </div>

  {!!Form::open(['method'=>'POST', 'action'=>'ShippingController@store'])!!}

      <div class="container">               
          <div class="table-responsive" style="border 1 px solid">          
          <table class="table">
            <thead>
              <tr>
               <td>Select</td>
                <td>Method</td>
                <td>Duration</td>
                <td>Price!</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                @if($shipping_methods)
                 @foreach($shipping_methods as $shipping_method)
                <td> 
                  <div class="radio">
                      <label>
                        <input type="radio" name="shipping_id" id="shipping_id" value="{{$shipping_method->id}}">
                      </label>
                    </div>
                 </td>
                <td>{{$shipping_method->method_name}}</td>
                <td>{{$shipping_method->duration}} minutes</td>
                <td>${{$shipping_method->price}}</td>
              </tr>
                @endforeach
              @endif
            </tbody>
          </table>
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" class="form-control">
          </div>
          <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" class="form-control">
          </div>
          <div class="form-group">
            <label for="address">Zip Code:</label>
            <input type="text" name="zip_code" class="form-control">
          </div>
           <div class="cart-bottom">
            <div class="box-footer">
              <div class="pull-left"><a href="/cart" class="btn btn-default"> <i class="fa fa-arrow-left"></i> &nbsp; Previous </a>
              </div>
              <div class="pull-right bg-success" >
                  {!!Form::submit('Continue to payment', ['class'=>'form-control'])!!}
              </div>
            </div>
          </div>
          </div>
        </div>
              <br>
  {!!Form::close()!!}
  
  
@stop