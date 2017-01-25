<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
  </head>
  <body>
    @include('partials._modal')
    @yield('content')
   		{{-- Container End here --}}
     {{-- Footer Starts here --}}
     @include('partials._footer')
    {{-- Footer End Here --}}
    @include('partials._javascript')
    <!-- Java Scripts Include all compiled plugins (below), or include individual files as needed -->

  </body>
</html>
