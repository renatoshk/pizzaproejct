@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Properties </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-danger') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <a href="{{route('add.create')}}" class="btn btn-success" style="float: right;">Add Property </a>
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
              <h3 class="card-title">All My Properties </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categories" class="table table-bordered table-striped">
                <thead>
                 <tr>
                    <th scope="col">Property Name</th>
                    <th scope="col">Property User</th>
                    <th scope="col">Property Description</th>
                    <th scope="col">Property Status</th>
                    <th scope="col">Property Type</th>
                    <th scope="col">Property Price</th>
                    <th scope="col">Property Location</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th> 
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody> 
                @if($data)
                 @foreach($data as $prop) 
              <tr>
                  <td>{{$prop['property_name']}}</td>
                  <td>{{$prop['name_user']}}</td>
                  <td>{{$prop['property_description']}}</td>
                  <td>{{$prop['status']}}</td>
                  <td>{{$prop['type']}}</td>
                  <td>{{$prop['price']}}</td>
                  <td>{{$prop['location']}}</td>
                  <td><a href="{{route('add.show',$prop['id'])}}">View Property</a></td> 
                  <td><a href="{{route('add.edit', $prop['id'])}}">Edit</a></td>
                  <td>
                  
                {!!Form::open(['method'=>'DELETE', 'action'=>['AddPropertyController@destroy', $prop['id']]])!!}
                     {!!Form::submit('Delete', ['class'=>'btn btn-danger'])!!} 
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@stop