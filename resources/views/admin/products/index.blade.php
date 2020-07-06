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
              <a href="{{route('products.create')}}" class="btn btn-success" style="float: right;">Add Product </a>
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
                    <th scope="col">Id</th>
                    <th scope="col">Category</th>
                    <th scope="col">Type</th>
                    <th scope="col">Product Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th> 
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody> 
                @if($data)
                 @foreach($data as $prop) 
              <tr>
                  <td>{{$prop['id']}}</td>
                  <td>{{$prop['category']}}</td>
                  <td>{{$prop['type']}}</td>
                  <td><img src="/product_photos/{{$prop['photo']}}" style="width: 100px; height: 100px;" alt=""></td>
                  <td>{{$prop['name']}}</td>
                  <td>{{Str::limit($prop['description'],30)}}</td>
                  <td>${{$prop['price']}}</td>
                  <td>{{$prop['qty']}}</td>
                  <td>{{$prop['status']}}</td>
                  <td><a href="{{route('products.edit', $prop['id'])}}">Edit</a></td>
                  <td>
                  
                {!!Form::open(['method'=>'DELETE', 'action'=>['AdminProductController@destroy', $prop['id']]])!!}
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