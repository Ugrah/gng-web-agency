<nav id="standardNavbar" class="navbar navbar-expand-lg navbar-dark bg-dark px-xl-5" style="">
    <a class="navbar-brand" href="{{url('/')}}"><h4>{{ config('infos.name') }}</h4></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#standardNavbarCollapse" aria-controls="standardNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="standardNavbarCollapse">
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
    <a class="nav-link" href="{{url('/')}}">{{ trans('front/navBar.menu-items.home') }} <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">{{ trans('front/navBar.menu-items.about') }}</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{url('/contact')}}">{{ trans('front/navBar.menu-items.contact') }}</a>
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