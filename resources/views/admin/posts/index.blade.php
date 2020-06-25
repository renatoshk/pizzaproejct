@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
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
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
              <a href="{{route('posts.create')}}" class="btn btn-success" style="float: right;">Add Post</a>
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
    <h3 class="card-title">All Posts</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="categories" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Category</th>
            <th scope="col">User</th>
            <th scope="col">Photo</th>
            <th scope="col">Title</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>

          </tr>
          
  </thead>
  <tbody>
  @if($posts) 	
    @foreach($posts as $post)	
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
      <td>{{$post->user ? $post->user->username : 'No user'}}</td>
      <td><img height="50px" src="../posts_image/{{$post->photo ? $post->photo->file : 'No Photo'}}" alt=""></td>
      <td><a style="color: black" href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
      <td>{{$post->created_at ? $post->created_at->diffForHumans() : 'No data'}}</td>
      <td>{{$post->updated_at ? $post->updated_at->diffForHumans() : 'No data'}}</td>
      <td><a style="color: black" href="{{route('posts.edit', $post->id)}}">Edit</a></td>
      <td>
        {!!Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]])!!}
         <div class="form-group">
            {!!Form::submit('Delete Post', ['class'=>'btn btn-danger'])!!}
         </div>
        {!!Form::close()!!}

      </td>
    </tr>
    <tr>
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

<!-- /.row -->
    </section>
</div>


@stop

