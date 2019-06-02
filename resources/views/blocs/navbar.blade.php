<style>
    nav#fixedNavbar {
        -webkit-box-shadow: 0px 10px 11px 0px rgba(0,0,0,0.27);
        -moz-box-shadow: 0px 10px 11px 0px rgba(0,0,0,0.27);
        box-shadow: 0px 10px 11px 0px rgba(0,0,0,0.27);
        z-index: -1000;
    }

    nav#fixedNavbar ul li a {
        text-transform: uppercase;
        font-weight: bold;
    }

    nav#fixedNavbar ul li.active a {
        color: #627BED;
    }
</style>

<nav id="fixedNavbar" class="navbar navbar-expand-md navbar-light fixed-top bg-light p-3">
    <a class="navbar-brand" href="{{url('/')}}"><h4>GnG Web Agency</h4></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fixedNavbarCollapse" aria-controls="fixedNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="fixedNavbarCollapse">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <a class="nav-link" href="#">{{ trans('front/navBar.menu-items.home') }} <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">{{ trans('front/navBar.menu-items.about') }}</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">{{ trans('front/navBar.menu-items.contact') }}</a>
        </li>

        <!-- language links -->
        <li class="nav-item">
            <a class="{{ app()->getLocale() == 'en' ? 'nav-link disabled' : 'nav-link' }}" href="{{url('/language/en')}}">en</a>
        </li>
        <li class="nav-item">
            <a class="{{ app()->getLocale() == 'fr' ? 'nav-link disabled' : 'nav-link' }}" href="{{url('/language/fr')}}">fr</a>
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