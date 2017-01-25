
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>@yield('title')</title>

  <!-- Bootstrap -->
  {{ Html::style('css/bootstrap.min.css') }}
  {{-- Navbar CSS --}}
  {{ Html::style('css/nav.css') }}
  {{-- Main Style CSS --}}
  {{ Html::style('css/style.css') }}
  {{ Html::style('css/select2.min.css') }}
  {{ Html::style('css/owl.carousel.min.css') }}
  {{ Html::style('css/footer.css') }}

  {{-- FontAwesome --}}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  {{-- {{ Html::script('js/jquery.js') }} --}}
  {{ Html::script('js/owl.carousel.min.js') }}
  @yield('stylesheets')

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
