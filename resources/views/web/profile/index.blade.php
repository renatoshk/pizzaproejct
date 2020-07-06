@extends('layouts.web.index')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@section('content')
<br>
<br>
<br>
<style>

.profile 
{
    min-height: 355px;
    display: inline-block;
    }
figcaption.ratings
{
    margin-top:20px;
    }
figcaption.ratings a
{
    color:#f1c40f;
    font-size:11px;
    }
figcaption.ratings a:hover
{
    color:#f39c12;
    text-decoration:none;
    }
.divider 
{
    border-top:1px solid rgba(0,0,0,0.1);
    }
.emphasis 
{
    border-top: 4px solid transparent;
    }
.emphasis:hover 
{
    border-top: 4px solid #1abc9c;
    }
.emphasis h2
{
    margin-bottom:0;
    }

</style>
<div class="content-wrapper" style="min-height: 500px;">
<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2>{{$user->username ?? ''}}</h2>
                    <p><strong>Your Email: </strong>{{$user->email ?? ''}}</p>
                </div>             
               
            </div>            
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong><?php $orders = App\Order::where('user_id', Auth::user()->id)->where('status','purchase')->get(); echo count($orders);?></strong></h2>                    
                    <p><small>My Orders</small></p>
                    <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span><a style="color:white;" href="/order">View Orders</a></button>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>My</strong></h2>                    
                    <p><small>Data</small></p>
                    <button class="btn btn-info btn-block"><span class="fa fa-user"></span><a style="color:white;" href="{{route('profile.edit', $user->slug)}}"> Edit Profile</a> </button>
                </div>
                 <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>My</strong></h2>                    
                    <p><small>Password</small></p>
                    <button class="btn btn-danger btn-block"><span class="fa fa-user"></span><a style="color:white;" href="{{route('changepassword.index')}}"> Edit Password </a></button>
                </div>

            </div>
    	 </div>                 
		</div>
	</div>
</div>
</div>
<br>
<br>
<br>
@stop