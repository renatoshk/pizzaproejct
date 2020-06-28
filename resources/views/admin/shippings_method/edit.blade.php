@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Shipping Method</h1>
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
<br>
 @if ( Session::has('flash_message') )
    <div class="alert {{ Session::get('flash_type', 'alert-info') }}">
      <h3>{{ Session::get('flash_message') }} <a href="{{route('shippings.index')}}">Click Here to see it</a></h3>
    </div>
  @endif
<br>
<div class="col-sm-10">
    {!!Form::model($shippings_edit, ['method'=>'PATCH', 'action'=>['AdminShippingMethodController@update', $shippings_edit->id]])!!}
   
    <div class="form-group">
        {!!Form::label('method_name', 'Method Name:')!!}
        {!!Form::text('method_name',null, ['class'=>'form-control'])!!}
    </div>
   
    <div class="form-group">
        {!!Form::label('duration', 'Duration:')!!}
        {!!Form::number('duration', null, ['class'=>'form-control'])!!}        
    </div>

    <div class="form-group">
        {!!Form::label('price', 'Price:')!!}
        {!!Form::text('price', null,['class'=>'form-control'])!!}
    </div>
   
    <div class="form-group">
        {!!Form::submit('Update Method', ['class'=>'btn btn-primary col-sm-12'])!!}
    </div>
    {!!Form::close()!!}
</div>
</div>
@stop