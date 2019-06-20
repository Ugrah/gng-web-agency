<div id="home-carousel" class="carousel slide h-100 w-100 position-absolute" style="top:0; left:0" data-ride="carousel" data-touch="true">
    <ul class="carousel-indicators">
        <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#home-carousel" data-slide-to="1"></li>
    </ul>
    <div class="carousel-inner text-light h-100">
        <div class="carousel-item h-100 active">
            <div class="row justify-content-center h-100">
                <div class="col-10 col-md-4 my-auto wow bounceInUp" data-wow-delay="0.1s">
                    <h2>{{ trans('front/pages/index.carousel.item1.title') }}</h2>
                    <p>{{ trans('front/pages/index.carousel.item1.description') }}</p>
                    <div class="row">
                        <div class="col wow bounceInLeft mb-3" data-wow-delay="1s">
                            <a href="{{url('/contact')}}" class="btn btn-primary btn-lg btn-block rounded">{{ trans('front/pages/index.carousel.item1.button1') }}</a>
                        </div>
                        <div class="col wow bounceInRight mb-3" data-wow-delay="1s">
                            <a href="{{url('/website')}}" class="btn btn-success btn-lg btn-block rounded">{{ trans('front/pages/index.carousel.item1.button2') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-7 my-auto wow bounceInUp" data-wow-delay="0.5s">
                    <img class="img-fluid" src="{{ asset('img/multi-device-responsive-website.png') }}" alt="{{ trans('front/pages/index.carousel.item1.img-alt')}}" />
                </div>
            </div>  
        </div>

        <div class="carousel-item h-100">
            <div class="row justify-content-center h-100">
                <div class="col-10 col-md-4 my-auto">
                    <h2>{{ trans('front/pages/index.carousel.item2.title') }}</h2>
                    <p>{{ trans('front/pages/index.carousel.item2.description') }}</p>
                    <div class="row">
                        <div class="col mb-3">
                            <a href="{{url('/contact')}}" class="btn btn-primary btn-lg btn-block rounded">{{ trans('front/pages/index.carousel.item2.button1') }}</a>
                        </div>
                        <div class="col mb-3">
                            <a href="{{url('/mobile-app')}}" class="btn btn-success btn-lg btn-block rounded">{{ trans('front/pages/index.carousel.item2.button2') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-7 my-auto">
                    <img class="img-fluid" src="{{ asset('img/ui-mobile-device.png') }}" alt="{{ trans('front/pages/index.carousel.item2.img-alt')}}" />
                </div>
            </div>    
        </div>

    </div>
</div>