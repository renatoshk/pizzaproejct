@extends('layouts.web.index')
@section('content')
<br>
<br>
	@if ( Session::has('flash_message') )
	<div class="alert {{ Session::get('flash_type', 'bg-dark') }}">
	   <h3>{{ Session::get('flash_message') }} </h3>
	</div>
	@endif
<br>

<div class="content-wrapper" style="min-height: 500px;">
 <div class="row justify-content-center">	
		{!!Form::model($user, ['method'=>'PATCH' , 'action'=>['ProfileController@update', $user->id], 'files'=>true])!!}
			<h1>You can update your account here </h1>
			<div class="form-group">
				{!!Form::label('Username', 'Username:')!!}
			    {!!Form::text('username', null, ['class'=>'form-control'])!!}
			</div> 
			<div class="form-group">
				{!!Form::label('email', 'Email:')!!}
				{!!Form::email('email',null, ['class'=>'form-control'] )!!}
				
			</div>
			<div class="form-group">
				{!!Form::submit('Update', ['class'=>'btn btn-primary'])!!}
			</div>
			<h1>You can delete your account here </h1>
       {!!Form::close()!!}
    </div>
 <div class="row justify-content-center"> 
        {!!Form::open(['method'=>'DELETE' , 'action'=>['ProfileController@destroy', $user->id]])!!}
       <div class="form-group">
        {!!Form::submit('DELETE ACCOUNT!', ['class'=>'btn btn-danger'])!!}
       </div>
        {!!Form::close()!!}
     </div>   
 </div>  
@stop