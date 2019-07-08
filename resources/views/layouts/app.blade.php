<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEOTools meta -->
    {!! html_entity_decode(SEO::generate()) !!}

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=ABeeZee|Lato|PT+Sans|Roboto|Roboto+Condensed" rel="stylesheet">

    <!-- Styles -->
    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/global.min.css') !!}
    {!! Html::style('css/animate.css') !!}

    @yield('styles')

    <!-- Font Awesome -->
    {!! Html::script('https://kit.fontawesome.com/754591c5ca.js') !!}

    @yield('scriptsBefore')
  </head>
  <body>

    {{ Html::navbar_fixed() }}

    @yield('content')

    @include('cookieConsent::index')

    {{ Html::footer_main() }}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- <script src="{{asset('js/wow.js')}}"></script> -->
    {!! Html::script('js/wow.js') !!}


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

        /*
         * Counter number animation
        */
        $('.counter').each(function () {
          var $this = $(this);
          jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
            duration: 4000,
            easing: 'swing',
            step: function () {
              $this.text(Math.ceil(this.Counter));
            }
          });
        });
        /* end counter funtion */
      });
    </script>


    <!-- Initilise wowjs -->
    <script>
      new WOW().init();
    </script>
    
    @yield('scripts')
  </body>
</html>