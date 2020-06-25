@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Replies</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Replies</li>
            </ol>
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
              <h3 class="card-title">All Replies</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categories" class="table table-bordered table-striped">
                <thead>
                 <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Author</th>
                    <th scope="col">Content</th>
                    <th scope="col">Posts</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">Action</th>
                    <th scope="col">Delete</th>
                    
                  </tr>
                </thead>
                <tbody>
                  {{-- foreach --}}
                  @if($replies)  
                    @foreach($replies as $reply)  
                <tr>
                  <td>{{$reply->id}}</td>
                  <td>{{$reply->author}}</td>
                  <td>{{$reply->text}}</td>
                  <td><a href="{{route('blog.edit', $reply->comment->post->id)}}">View Post</a></td>
                  <td>{{$reply->created_at ? $reply->created_at->diffForHumans() : 'No data'}}</td>
                  
                    <td>
    @if($reply->is_active ==1)
        {!!Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id    ]]) !!}
                      <input type="hidden" name="is_active" value="0">
                        <div class="form-group">
                            {!!Form::submit('Unnapprove ', ['class'=>'btn btn-warning'])!!}
                        </div>
        {!!Form::close()!!}

      @else
        {!!Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                      <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                            {!!Form::submit('Approve ', ['class'=>'btn btn-success'])!!}
                        </div>
          {!!Form::close()!!}
    @endif
      </td>
          <td>
    {!!Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
                    <div class="form-group">
                        {!!Form::submit('DELETE ', ['class'=>'btn btn-danger'])!!}
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