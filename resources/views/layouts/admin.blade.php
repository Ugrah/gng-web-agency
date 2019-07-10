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

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  
}
</style>

    @yield('styles')

    <!-- Font Awesome -->
    {!! Html::script('https://kit.fontawesome.com/754591c5ca.js') !!}

    @yield('scriptsBefore')
  </head>
  <body>

  <div id="mySidebar" class="sidebar position-fixed vh-100 bg-secondary">
    <nav class="navbar navbar-toggleable-xl navbar-light px-0 pt-0">
        <ul class="navbar-nav w-100">
            <a class="navbar-brand p-3" href="{{ url('/') }}">{{ config('infos.name') }}</a>

            <li class="nav-item">
                <a class="nav-link px-3 text-light" href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 text-light" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link px-3 text-light" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Link <i class="fas fa-angle-right float-right"></i></a>
              <ul id="collapseExample" class="collapse list-group">
                <li class="list-group-item nav-item">Cras justo odio</li>
                <li class="list-group-item nav-item">Dapibus ac facilisis in</li>
                <li class="list-group-item nav-item">Morbi leo risus</li>
              </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 text-light" href="#">Link</a>
            </li>
        </ul>
  </nav>
  </div>

  <div id="main">
    <nav class="navbar navbar-expand navbar-light bg-light py-0">
      <a id="open-sidebar-btn" class="fa-2x d-none" href="#"><i class="fas fa-bars text-secondary"></i></a> 
      <a id="close-sidebar-btn" class="fa-2x" href="#"><i class="fas fa-times text-secondary"></i></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link pt-3" href="#">
              <i class="fas fa-bell" style="font-size: 1rem; color: #B7B9CC"></i>
              <span class="badge badge-notify">3+</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link pt-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span>{{ auth()->user()->name }} </span>
              <img src="{{ asset('img/icons/facebook-logo-2.png') }}" width="32" alt="" class="img-fluid img-rounded">
              <!-- <i class="fas fa-user-circle fa-2x"></i> -->
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
      </div>
    </nav> 
    @yield('content')
  </div>


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
        $('#open-sidebar-btn').click(function(){
          $(this).addClass('d-none');
          $('#close-sidebar-btn').removeClass('d-none');
          $('#mySidebar').css('width', '14rem');
          $('#main').css('marginLeft', '14rem');
        })

        $('#close-sidebar-btn').click(function(){
          $(this).addClass('d-none'); 
          $('#open-sidebar-btn').removeClass('d-none');
          $('#mySidebar').css('width', '0');
          $('#main').css('marginLeft', '0');
        })
        
      });
    </script>

    <!-- Initilise wowjs -->
    <script>
      new WOW().init();
    </script>
    
    @yield('scripts')
  </body>
</html>