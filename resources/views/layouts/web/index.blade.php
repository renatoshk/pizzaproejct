 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>VintagePizza</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('web/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('web/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('web/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('web/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('web/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
  </head>
  <body>
        @include('layouts.web.navbar')
        @yield('content')
 <div id="map"></div>            
 <footer class="ftco-footer ftco-section img">
        <div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(web/images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(web/images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cooked</a></li>
                <li><a href="#" class="py-2 d-block">Deliver</a></li>
                <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                <li><a href="#" class="py-2 d-block">Mixed</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Have a Questions?</h2>
                <div class="block-23 mb-3">
                  <ul>
                    <li><span class="icon icon-map-marker"></span><span class="text">688 New Loudon Rd. Latham, New York 12110</span></li>
                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">518 783-1380</span></a></li>
                    <li><a href="#"><span class="icon icon-envelope"></span><span class="text">Anxhels@gmail.com</span></a></li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('web/js/jquery.min.js')}}"></script>
  <script src="{{asset('web/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('web/js/popper.min.js')}}"></script>
  <script src="{{asset('web/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('web/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('web/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('web/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('web/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('web/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('web/js/aos.js')}}"></script>
  <script src="{{asset('web/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('web/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('web/js/jquery.timepicker.min.js')}}"></script>
  <script src="{{asset('web/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('web/js/google-map.js')}}"></script>
  <script src="{{asset('web/js/main.js')}}"></script>
    <script>
  // Remove Items From Cart
$('a.remove').click(function(){
  event.preventDefault();
  $( this ).parent().parent().parent().hide( 400 );
 
})

// Just for testing, show all items
  $('a.btn.continue').click(function(){
    $('li.items').show(400);
  })

  
</script>
  </body>
</html>  