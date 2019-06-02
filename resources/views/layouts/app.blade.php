<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=ABeeZee|Lato|PT+Sans|Roboto|Roboto+Condensed" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">

    @yield('styles')

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/754591c5ca.js"></script>

    @yield('scriptsBefore')
  </head>
  <body style="position: relative;">

    @include('blocs.navbar')

    @yield('header')
    @yield('content')
    @yield('footer')

    @include('blocs.footer')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(function(){

        /* Annimation navBar fixed of top page */
      
        var fixedNavIsDisplay = false;
        var minScrollToNavBar = 300;
        $("#fixedNavbar").fadeOut(300);

        $(window).scroll(function(){
          var scrollTop = $(window).scrollTop();
          if ( scrollTop > minScrollToNavBar && !fixedNavIsDisplay ) { $('#fixedNavbar').css('z-index', 1030); $('#fixedNavbar').fadeIn('fast', function(){ fixedNavIsDisplay = true;});
          }
          if (scrollTop < minScrollToNavBar && fixedNavIsDisplay) { 
            $('#fixedNavbar').fadeOut('fast', function(){ fixedNavIsDisplay = false; });
          }
        });
        /* End animated function */ 

        
      });
    </script>
    
    @yield('scripts')
  </body>
</html>