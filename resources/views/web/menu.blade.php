@extends('layouts.web.index')
@section('content')
    <!-- END nav -->

    <section class="home-slider owl-carousel img" style="background-image: url(web/images/copertine.png);">

      <div class="slider-item" style="background-image: url(web/images/copertine.png);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Our Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>
    
	<section class="ftco-section">
       
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Our Menu Pricing</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        @if($categories)
          @foreach($categories as $category)
          <div class="col-md-6">
            <div class="pricing-entry d-flex ftco-animate">
               <h1>{{$category->name}}</h1>
            </div>
         </div>
           @foreach($category->products as $product)
        <div class="row">
          <div class="col-md-12">
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(product_photos/{{$product->photo->product_image ?? ''}});">
              </div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>{{$product->name ?? ''}}</span></h3>
	        				<span class="price">${{$product->price ?? ''}}</span>
	        			</div>
	        			<div class="d-block">
	        				<p>{{$product->description ?? ''}}</p>
	        			</div>
        		  </div>
            </div>
        	</div>
        </div>
             @endforeach 
            @endforeach
          @endif
    	</div>
    </section>
@stop