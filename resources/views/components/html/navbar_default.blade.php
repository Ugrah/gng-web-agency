<nav id="standardNavbar" class="navbar navbar-expand-lg navbar-dark bg-dark px-xl-5"> 
    <a class="navbar-brand" href="{{url('/')}}"><h4><img src="{{asset('img/gng-logo-width.png')}}" alt="GnG Dev Logo" class="img-fluid" width="35%" /></h4></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#standardNavbarCollapse" aria-controls="standardNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="standardNavbarCollapse">
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
    <a class="nav-link" href="{{url('/')}}">{{ trans('front/navBar.menu-items.home') }} <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{url('/about')}}">{{ trans('front/navBar.menu-items.about') }}</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{url('/website')}}">{{ trans('front/navBar.menu-items.website') }}</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{url('/mobile-app')}}">{{ trans('front/navBar.menu-items.mobile_app') }}</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{url('/prices')}}">{{ trans('front/navBar.menu-items.prices') }}</a>
    </li>
    <!--
    <li class="nav-item">
    <a class="nav-link" href="{{url('/realisations')}}">{{ trans('front/navBar.menu-items.realisations') }}</a>
    </li>
    -->
    <li class="nav-item">
    <a class="nav-link" href="{{url('/contact')}}">{{ trans('front/navBar.menu-items.contact') }}</a>
    </li>

    <!-- language links -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-globe"></i>
        </a>
        <div style="background-color: transparent; border: none;" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="{{ app()->getLocale() == 'en' ? 'dropdown-item disabled active-locale' : 'dropdown-item text-muet' }}" href="{{url('/language/en')}}">en</a>
            <a class="{{ app()->getLocale() == 'fr' ? 'dropdown-item disabled active-locale' : 'dropdown-item text-muet' }}" href="{{url('/language/fr')}}">fr</a>
        </div>
    </li>
</ul>

<!--
<form class="form-inline mt-2 mt-md-0">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
-->
</div>
</nav>