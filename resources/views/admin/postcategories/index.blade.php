@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Posts Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posts_Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<br>
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-danger') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
<br>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <a href="{{route('postcategories.create')}}" class="btn btn-success" style="float: right;">Add Post Category</a>
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
              <h3 class="card-title">All Posts Categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categories" class="table table-bordered table-striped">
                <thead>
                 <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">UPDATED_AT</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- foreach --}}
                  @if($post_categories)  
                    @foreach($post_categories as $post_category)  
                <tr>
                  <td>{{$post_category->id}}</td>
                  <td><a style="color:black" href="{{route('postcategories.edit', $post_category->id)}}">{{$post_category->name}}</a></td>

                  <td>{{$post_category->created_at ? $post_category->created_at->diffForHumans() : 'No data'}}</td>
                  <td>{{$post_category->updated_at ? $post_category->updated_at->diffForHumans() : 'No data'}}</td>
                  <td><a style="color:black" href="{{route('postcategories.edit', $post_category->id)}}">Edit</a></td>
                  <td>
                  {!!Form::open(['method'=>'DELETE', 'action'=>['AdminPostCategoryController@destroy',  $post_category->id]])!!}
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