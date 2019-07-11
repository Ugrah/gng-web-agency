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
      .sidebar {
        width: 14rem;
        z-index: 1;
        overflow-x: hidden;
        transition: 0.5s;
      }

      #mySidebar a.nav-link { color: #d9D9D9 !important; opacity: 0.7; }
      #mySidebar a.nav-link:hover, #mySidebar a.nav-link.active { color: white !important; opacity: 1;}

      #main {
        transition: margin-left .5s;
        margin-left: 14rem;
      }

      .dropdown-toggle::after {
          display:none;
      }

      .badge-notify{
        background:#E74A3B;
        color: white;
        position:relative;
        font-size:9px;
        font-weight: bold;
        top: -10px;
        left: -10px;
      }

      #user-informations a.dropdown-item { font-size: 0.9em; }

      /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
      @media screen and (max-height: 450px) {
        
      }
    </style>

    <style>
      #scroll-to-top {
      display: inline-block;
      width: 50px;
      height: 50px;
      text-align: center;
      border-radius: 8px;
      position: fixed;
      bottom: 30px;
      right: 30px;
      transition: background-color .3s, 
        opacity .2s, visibility .2s;
      opacity: 0;
      visibility: hidden;
      z-index: 1000;
    }
    #scroll-to-top:hover {
      cursor: pointer;
      background-color: #333;
    }
    #scroll-to-top.show {
      opacity: 1;
      visibility: visible;
    }

    /* Styles for the content section */

    .content {
      width: 77%;
      margin: 50px auto;
      font-family: 'Merriweather', serif;
      font-size: 17px;
      color: #6c767a;
      line-height: 1.9;
    }
    @media (min-width: 500px) {
      .content {
        width: 43%;
      }
      #button {
        margin: 30px;
      }
    }
    .content h1 {
      margin-bottom: -10px;
      color: #03a9f4;
      line-height: 1.5;
    }
    .content h3 {
      font-style: italic;
      color: #96a2a7;
    }
    </style>

    @yield('styles')

    <!-- Font Awesome -->
    {!! Html::script('https://kit.fontawesome.com/754591c5ca.js') !!}

    @yield('scriptsBefore')
  </head>
  <body>

  <div id="mySidebar" class="sidebar position-fixed vh-100 bg-dark">
    <nav class="navbar navbar-toggleable-xl navbar-light px-0 pt-0">
        <ul class="navbar-nav w-100">
            <a class="navbar-brand mx-auto" href="{{url('/')}}" style="max-width:11rem"><img src="{{asset('img/gng-logo-width.png')}}" alt="GnG Dev Logo" class="img-fluid" /></a>
          
            <hr class="mx-3 my-0" style="border-color: rgba(255, 255, 255,0.3)">

            <li class="nav-item">
                <a class="nav-link px-3" href="{{ url('/dashboard') }}">
                <i class="fas fa-tachometer-alt pr-2"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="#">
                <i class="fas fa-clone pr-2"></i>  Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3 text-light" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-clone pr-2"></i>  Template <i class="fas fa-angle-right float-right"></i></a>
              <ul id="collapseExample" class="collapse list-group mx-3">
                <a href="#" class="list-group-item list-group-item-action py-2">Dapibus</a>
                <a href="#" class="list-group-item list-group-item-action py-2">Dapibus</a>
                <a href="#" class="list-group-item list-group-item-action py-2">Dapibus</a>
              </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 text-light" href="#">
                <i class="fas fa-clone pr-2"></i>  Link</a>
            </li>
        </ul>
  </nav>
  </div>

  <div id="main">
    <nav class="navbar navbar-expand navbar-light bg-white shadow py-2 pl-4">
      <a id="open-sidebar-btn" class="fa-2x d-none" href="#"><i class="fas fa-bars text-secondary"></i></a> 
      <a id="close-sidebar-btn" class="fa-2x" href="#"><i class="fas fa-times text-secondary"></i></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <!--
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
        </ul>
        -->

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link pt-3" href="#">
              <i class="fas fa-bell" style="font-size: 1rem; color: #B7B9CC"></i>
              <span class="badge badge-notify">3+</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pt-3" href="#">
              <i class="fas fa-envelope" style="font-size: 1rem; color: #B7B9CC"></i>
              <span class="badge badge-notify">10</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link pt-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span>{{ auth()->user()->name }} </span>
              <img src="{{ asset('img/icons/facebook-logo-2.png') }}" width="32" alt="" class="img-fluid img-rounded">
              <!-- <i class="fas fa-user-circle fa-2x"></i> -->
            </a>
            <div id="user-informations" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profile</a>
              <a class="dropdown-item" href="#"><i class="fas fa-cogs"></i> Setting</a>
              @auth
              <hr class="my-2">
                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              @endauth
            </div>
          </li>
        </ul>
      </div>
    </nav> 

    @yield('content')
  </div>
    
  <!-- Back to top button -->
  <a id="scroll-to-top" class="bg-primary"><i class="fas fa-angle-up text-light fa-3x"></i></a>


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
        $('#open-sidebar-btn').click(function(e){
          e.preventDefault();
          $(this).addClass('d-none');
          $('#close-sidebar-btn').removeClass('d-none');
          $('#mySidebar').css('width', '14rem');
          $('#main').css('marginLeft', '14rem');
        });

        $('#close-sidebar-btn').click(function(e){
          e.preventDefault();
          $(this).addClass('d-none'); 
          $('#open-sidebar-btn').removeClass('d-none');
          $('#mySidebar').css('width', '0');
          $('#main').css('marginLeft', '0');
        });

        var $scrollToTopButton = $('#scroll-to-top');

        $(window).scroll(function() {
          if ($(window).scrollTop() > 300) {
            $scrollToTopButton.addClass('show');
          } else {
            $scrollToTopButton.removeClass('show');
          }
        });

        $scrollToTopButton.on('click', function(e) {
          e.preventDefault();
          $('html, body').animate({scrollTop:0}, '300');
        });
        
      });
    </script>

    <!-- Initilise wowjs -->
    <script>
      new WOW().init();
    </script>
    
    @yield('scripts')
  </body>
</html>