<div class="row">
<div class="col-md-2">
  <!-- Button trigger modal -->
    @if (Auth::guest())
      <button type="button" class="btn btn-success top" data-toggle="modal" data-target="#myModal">Login</button>
    @else
      <div class="dropdown">
        <button class="btn btn-success dropdown-toggle top" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          {{ Auth::user()->name }}
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          {{-- <li><a href="#">Profile</a></li> --}}
          <li>
            <a href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </div>
    @endif
</div>
<div class="col-md-10">
  <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle top"><i class="fa fa-bars"></i></a>
  {{-- Navbar --}}
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <a id="menu-close" href="#" class="btn btn-danger pull-right hidden-md hidden-lg toggle"><i class="fa fa-times"></i></a>
      <li class="sidebar-brand">
        <a href="{{ url('/') }}"><img src="../img/logo.png"></a>
      </li>
      <li>
        <a href="{{ url('/') }}" title="Navigate to Jonathan Adcox IT Resume">Home</a>
      </li>
      <li>
        <a href="{{ url('/#about') }}" title="Go to About Us section">About</a>
      </li>
      <li>
        <a href="{{ route('hotels.index') }}" title="Navigate to Jonathan Adcox IT Resume">Hotels</a>
      </li>
      <li>
        <a href="{{ url('/#review') }}" title="Navigate to 'Our Services' section">City</a>
      </li>
      <!-- Future Development
      <li>
      <a href="#portfolio">Portfolio</a>
    </li> -->
    <a data-href="#" data-href="#collapseTwo" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo" style="cursor:pointer;"></a>
  </li>
</ul>
</nav>
{{-- Navbar End here --}}
</div>
</div>
