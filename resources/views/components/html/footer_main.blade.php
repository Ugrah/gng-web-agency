<footer id="footer" class="bg-dark text-light py-5">
    <div class="container">
    <div class="row mb-5">
        <div class="col-md">
        <div class="">
            <h2 class="text-light"><a href="{{ url('/') }}">{{config('infos.name')}}</a></h2>
            <p>{{ trans('front/footer.gng-description') }}</p>
            <div>
            <a class="social-icon px-1" target="_blank" href="https://www.facebook.com/GnG-Dev-Agence-420818978521192/"><img src="{{asset('img/icons/facebook-logo-2.png')}}" width="50" /></a>
            <a class="social-icon px-1" target="_blank" href="https://www.instagram.com/gngdevinsta"><img src="{{asset('img/icons/instagram-logo-2.png')}}" width="50" /></a>
            <a class="social-icon px-1" target="_blank" href="https://twitter.com/DevGng"><img src="{{asset('img/icons/twitter-logo-2.png')}}" width="50" /></a>
            </div>
        </div>
        </div>
        <div class="col-md">
        <div class="mb-4 ml-md-5">
            <h2 class="text-light">{{ trans('front/footer.title-items.unseful') }}</h2>
            <ul class="list-unstyled">
            <li><a href="{{ url('/privacy-policy') }}" class="py-2 d-block">{{ trans('front/footer.privacy_policy') }}</a></li>
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
            <!--
            <li><a href="{{ url('/realisations') }}" class="py-2 d-block">{{ trans('front/navBar.menu-items.realisations') }}</a></li>
            -->
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
                @foreach(config('infos.phones') as $numberPhone)
                    <li class="mb-3"><i class="fas fa-phone-alt"></i><a href="tel:{{$numberPhone}}"> <span class="text"><span>{{$numberPhone}}</span></span></a></li>
                @endforeach
                @foreach(config('infos.emails') as $email)
                    <li class="mb-3"><i class="fas fa-envelope fa-lg text-light"></i><a href="mailto:{{$email}}"> <span class="text"><span>{{$email}}</span></span></a></li>
                @endforeach
                </ul>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <p>Copyright &copy; {{config('infos.name')}} 2019</p>
        </div>
    </div>
    </div>
</footer>