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

    <!-- Font Awesome -->
    {!! Html::script('https://kit.fontawesome.com/754591c5ca.js') !!}

  </head>
  <body style="margin:0px;padding:0px;overflow:hidden">
    
    <div class="container-fluid position-absolute overflow-hidden" style="height:8%;top:0px;left:0px;border-bottom: 3px solid tomato">
        <div class="row h-100">
            <div class="col my-auto"><a href="{{ url('/') }}">{{ config('infos.name') }}</a></div>
            <div class="col d-none d-sm-block my-auto text-center">
                <a class="px-3" href="#"><i class="fas fa-desktop fa-lg"></i></a>
                <a class="px-3" href="#"><i class="fas fa-mobile-alt fa-lg"></i></a>
            </div>
            <div class="col my-auto text-right">
                <button type="button" class="btn btn-primary">Dark</button>
                <button type="button" class="btn btn-link">Link</button>
            </div>
        </div>
    </div>

    <iframe class="mx-auto" src="{{ $production->url }}" frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:92%;width:100%;position:absolute;top:8%;left:0px;right:0px;bottom:0px; max-width: 380px"></iframe>

    @include('cookieConsent::index')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(function(){

        
      });
    </script>
    
    @yield('scripts')
  </body>
</html>