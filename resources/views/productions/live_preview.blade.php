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

    <style>
        a.preview-button.active { color: dodgerblue !important; }
        .preview-iframe-mobile{ max-width: 380px; }
    </style>

    <!-- Font Awesome -->
    {!! Html::script('https://kit.fontawesome.com/754591c5ca.js') !!}

  </head>
  <body class="bg-dark" style="margin:0px;padding:0px;overflow:hidden">
    
    <div class="container-fluid position-absolute overflow-hidden bg-light" style="height:8%;top:0px;left:0px;border-bottom: 3px solid tomato">
        <div class="row h-100">
            <div class="col my-auto"><a class="navbar-brand" href="{{url('/')}}" style="max-width:10rem"><img src="{{asset('img/gng-logo-width-2.png')}}" alt="GnG Dev Logo" class="img-fluid" /></a></div>
            <div class="col d-none d-md-block my-auto text-center">
                <a id="desktopToggle" class="preview-button text-muted px-3 active" href="#"><i class="fas fa-desktop fa-lg"></i></a>
                <a id="mobileToggle" class="preview-button text-muted px-3" href="#"><i class="fas fa-mobile-alt fa-lg"></i></a>
            </div>
            <div class="col my-auto text-right">
                <a class="btn btn-primary py-1" href="{{ url('/realisations') }}"><i class="fas fa-th fa-lg"></i> {{ __('Go to list') }}</a>
            </div>
        </div>
    </div>

    <iframe class="preview-iframe mx-auto" src="{{ $production->url }}" frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:92%;width:100%;position:absolute;top:8%;left:0px;right:0px;bottom:0px;"></iframe>

    @include('cookieConsent::index')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(function(){

        $("#desktopToggle").on('click', function(e) {
            e.preventDefault();
            $(".preview-iframe").removeClass("preview-iframe-mobile");
            $(this).addClass('active');
            $("#mobileToggle").removeClass('active');
        });
        $("#mobileToggle").on('click', function(e) {
            e.preventDefault();
            $(".preview-iframe").addClass("preview-iframe-mobile");
            $(this).addClass('active');
            $("#desktopToggle").removeClass('active');
        });
        
      });
    </script>
    
    @yield('scripts')
  </body>
</html>