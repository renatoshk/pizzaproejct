@extends('layouts.web.index')
@section ('content')
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
          <h2 style="text-align: center" class="delivery-method tf"> Make Payment! </h2>
        </div>
   {!!Form::open(['method'=>'POST', 'action'=>'PaymentController@store'])!!}
          <div class="container">               
          <div class="table-responsive" style="border 1 px solid">          
           <div class="form-group">
            <label for="CardNumber">Credit Card Number *</label>
              <input type="number" name="credit_card_number" class="form-control" id="CardNumber">
          </div>
            <div class="form-group">
            <label for="CardNumber">Credit Card Name *</label>
              <input type="text" name="credit_card_name" class="form-control" id="CardNumber">
          </div>
          <div class="form-group">
            <label>Expiration date *</label>
             <input type="date" name="expiration" class="form-control">
          </div>
          <div class="form-group">
            <label> Verification Number*</label>
             <input type="number" name="verification_number" class="form-control">
          </div>
           <div class="cart-bottom">
            <div class="box-footer">
              <div class="pull-left"><a href="/step-1" class="btn btn-default"> <i class="fa fa-arrow-left"></i> &nbsp; Previous </a>
              </div>
              <div class="pull-right  " >
                  {!!Form::submit('Submit', ['class'=>'form-control'])!!}
              </div>
            </div>
          </div>
          </div>
        </div>
  {!!Form::close()!!}
  
  
@stop