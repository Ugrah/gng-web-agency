<footer id="footer" class="bg-dark text-light py-5">
    <div class="container">
    <div class="row mb-5">
        <div class="col-md">
        <div class="">
            <h2 class="text-light"><a href="{{ url('/') }}">{{config('infos.name')}}</a></h2>
            <p>{{ trans('front/footer.gng-description') }}</p>
        </div>
        </div>
        <div class="col-md">
        <div class="mb-4 ml-md-5">
            <h2 class="text-light">{{ trans('front/footer.title-items.unseful') }}</h2>
            <ul class="list-unstyled">
            <li><a href="#" class="py-2 d-block">Servers</a></li>
            <li><a href="#" class="py-2 d-block">Windos Hosting</a></li>
            <li><a href="#" class="py-2 d-block">Cloud Hosting</a></li>
            <li><a href="#" class="py-2 d-block">OS Servers</a></li>
            <li><a href="#" class="py-2 d-block">Linux Servers</a></li>
            <li><a href="{{ url('/privacy-policy') }}" class="py-2 d-block">Policy</a></li>
            </ul>
        </div>
        </div>
        <div class="col-md">
            <div class="mb-4">
            <h2 class="text-light">{{ trans('front/footer.title-items.navigational') }}</h2>
            <ul class="list-unstyled">
            <li><a href="{{url('/')}}" class="py-2 d-block">{{ trans('front/navBar.menu-items.home') }}</a></li>
            <li><a href="{{ url('/about') }}" class="py-2 d-block">{{ trans('front/navBar.menu-items.about') }}</a></li>
            <li><a href="{{ url('/website') }}" class="py-2 d-block">{{ trans('front/navBar.menu-items.website') }}</a></li>
            <li><a href="{{ url('/mobile-app') }}" class="py-2 d-block">{{ trans('front/navBar.menu-items.mobile_app') }}</a></li>
            <li><a href="{{ url('/prices') }}" class="py-2 d-block">{{ trans('front/navBar.menu-items.prices') }}</a></li>
            <li><a href="{{ url('/realisations') }}" class="py-2 d-block">{{ trans('front/navBar.menu-items.realisations') }}</a></li>
            <li><a href="{{url('/contact')}}" class="py-2 d-block">{{ trans('front/navBar.menu-items.contact') }}</a></li>
            </ul>
        </div>
        </div>
        <div class="col-md">
        <div class="mb-4">
            <h2 class="text-light">{{ trans('front/footer.title-items.office') }}</h2>
            <div class="block-23 mb-3">
                <ul class="list-unstyled">
                <li class="mb-3"><i class="fas fa-map-marker-alt fa-lg text-light"></i> <span class="text">{{config('infos.address')}}</span></li>
                <li class="mb-3">
                    <a href="#"><i class="fas fa-phone fa-lg text-light"></i> <span class="text">+212 6 45 71 71 87</span></a>
                </li>
                <li class="mb-3"><a href="mailto:infos@gngdev.com"><i class="fas fa-envelope fa-lg text-light"></i> <span class="text"><span >infos@gngdev.com</span></span></a></li>
                </ul>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">

        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; 2019 {{config('infos.name')}}, All rights reserved.
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
    </div>
    </div>
</footer>