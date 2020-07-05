
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container">
      <a class="navbar-brand" href="/"><span class="flaticon-pizza-1 mr-1"></span>Vintage<br><small>Pizza </small></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
  <div class="collapse navbar-collapse" id="ftco-nav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
      <li class="nav-item"><a href="/menu" class="nav-link">Menu</a></li>
      <li class="nav-item"><a href="/services" class="nav-link">Services</a></li>
      <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
      <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
      <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
    @if(Auth::user())
      <li class="nav-item"><a href="{{route('profile.index')}}" class="nav-link">My Profile</a></li>
        <li class="nav-item">
          <a class="nav-link"  href="{{route('logout')}}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout')}}
           </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
       <li  class="nav-item">
           <a class="nav-link" href="/cart">
            <i class="fa fa-shopping-cart"></i> Cart
            <span class="badge badge-light"><?php $orders = App\Order::where('status','none')->get(); echo count($orders); ?></span>
         </a>
       </li> 
    @endif 
    @if(Auth::guest())
      <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Sign In</a></li>
      <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Sign Up</a></li>
    @endif
    @if(Auth::check())
      @if(Auth::user()->role_id == 1)
      <li class="nav-item"><a href="/adm" class="nav-link">Admin</a></li>
      @endif
    @endif
    </ul>
  </div>
  </div>
</nav>