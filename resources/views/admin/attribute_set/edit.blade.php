@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Attribute Set</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attribute Set</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-info') }}">
      <h3>{{ Session::get('flash_message') }} <a href="{{route('attributes_set.index')}}">Click here to see it!</a></h3>
  </div>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <a href="{{route('attributes_set.create')}}" class="btn btn-success" style="float: right;">Add Attribute Set</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<br>
<br>
<!-- editimi e categories -->
<div class="col-sm-6">
{!!Form::model($attribute_set, ['method'=>'PATCH', 'action'=>['AdminAttributeSetController@update', $attribute_set->id]]) !!}
<div class="form-group">
     {!!Form::text('name', null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::submit('Update Attribute Set ', ['class'=>'btn btn-primary col-sm-6'])!!}
</div>
{!!Form::close()!!}
<!-- end editimi e categories -->

  <!-- /.content -->
</div>
</div>

@stop