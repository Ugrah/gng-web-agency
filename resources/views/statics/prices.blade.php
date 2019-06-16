@extends('layouts.app')

@section('styles')
<style>
    ul.nav-pills li.nav-item a.nav-link {
        border: 1px solid #428bca; margin: 0.5em;
    }

    ul.nav-pills li.nav-item a.nav-link.active, a.price {
        border-image: linear-gradient(to right top, #1ee6bf, #36e7ac, #4fe798, #67e681, #7fe569);
        background-image: linear-gradient(to right top, #1ee6bf, #36e7ac, #4fe798, #67e681, #7fe569);
    }

    .gradient-blue, a.price:hover {
        background-image: linear-gradient(to right top, #56c7fb, #3eb7fc, #38a5fc, #4892f7, #617ced);
        color: #fff;
    }

    .gradient-and-image {
        background-image: linear-gradient(to right top, rgba(232, 123, 192,0.9), rgba(225, 109, 203,0.9), rgba(211, 98, 218,0.9), rgba(190, 91, 234,0.9), rgba(158, 89, 253,0.9)), url(https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
@endsection

@section('content')

<div style="height: 70vh; background-image: linear-gradient(to right top, rgba(232, 123, 192, 0.9), rgba(225, 109, 203, 0.9), rgba(211, 98, 218, 0.9), rgba(190, 91, 234, 0.9), rgba(158, 89, 253, 0.9)), url('https://images.unsplash.com/photo-1459257831348-f0cdd359235f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'); background-repeat: no-repeat; background-size: cover; background-position: center bottom; background-attachment: fixed;" class="position-relative">
    {{ Html::navbar_default() }}


    <div class="position-absolute w-100 text-center text-white px-2" style="top: 45%;">
        <h1>{{ trans('front/pages/prices.title') }}</h1>
    </div>
</div>

<section class="py-5">
    <h2 class="text-center wow bounceInLeft display-4 px-2">{{ trans('front/pages/prices.section0.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center wow bounceInRight">{{ trans('front/pages/prices.section0.description')}}</p>
    <div class="container">
        <div class="row justify-content-around py-5">
            <div class="col">
                <ul class="row nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item col-10 col-md-4 text-center px-1">
                        <a class="nav-link rounded active" id="pills-website-tab" data-toggle="pill" href="#pills-website" role="tab" aria-controls="pills-website" aria-selected="true">{{trans('front/pages/prices.section0.website.name')}}</a>
                    </li>
                    <li class="nav-item col-10 col-md-4 text-center px-1">
                        <a class="nav-link rounded" id="pills-mobile_app-tab" data-toggle="pill" href="#pills-mobile_app" role="tab" aria-controls="pills-mobile_app" aria-selected="false">{{trans('front/pages/prices.section0.mobile_app.name')}}</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-website" role="tabpanel" aria-labelledby="pills-website-tab">
                        <div class="row justify-content-center mt-3">
                            <h3 class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.showcase.title')}}</h3>
                            <p class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.showcase.description')}}</p>
                            <div class="container">
                                <div class="card-columns text-center">
                                    @foreach($prices['showcase'] as $price)
                                    <div class="card wow bounceIn">
                                        <div class="card-header bg-primary">
                                        <h4 class="text-white nopadding">{{$price['title']}}</h4>
                                        </div>
                                        <div class="card-body nopadding bg-light">
                                        <small class="text-muted">{{ trans('front/pages/index.section2.from')}}</small>
                                        <p class="card-text display-4">{{$price['amount']}} <span style="font-size: 0.5em">Dh</span></p>

                                        <ul class="list-group mb-3">
                                            @foreach($price['options'] as $option)
                                            <li class="list-group-item">{{$option}}</li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <h3 class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.portfolio.title')}}</h3>
                            <p class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.portfolio.description')}}</p>
                            <div class="container">
                                <div class="card-columns text-center">
                                    @foreach($prices['portfolio'] as $price)
                                    <div class="card wow bounceIn">
                                        <div class="card-header bg-primary">
                                        <h4 class="text-white nopadding">{{$price['title']}}</h4>
                                        </div>
                                        <div class="card-body nopadding bg-light">
                                        <small class="text-muted">{{ trans('front/pages/index.section2.from')}}</small>
                                        <p class="card-text display-4">{{$price['amount']}} <span style="font-size: 0.5em">Dh</span></p>

                                        <ul class="list-group mb-3">
                                            @foreach($price['options'] as $option)
                                            <li class="list-group-item">{{$option}}</li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <h3 class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.e_commerce.title')}}</h3>
                            <p class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.e_commerce.description')}}</p>
                            <div class="container">
                                <div class="card-columns text-center">
                                    @foreach($prices['e_commerce'] as $price)
                                    <div class="card wow bounceIn">
                                        <div class="card-header bg-primary">
                                        <h4 class="text-white nopadding">{{$price['title']}}</h4>
                                        </div>
                                        <div class="card-body nopadding bg-light">
                                        <small class="text-muted">{{ trans('front/pages/index.section2.from')}}</small>
                                        <p class="card-text display-4">{{$price['amount']}} <span style="font-size: 0.5em">Dh</span></p>

                                        <ul class="list-group mb-3">
                                            @foreach($price['options'] as $option)
                                            <li class="list-group-item">{{$option}}</li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <h3 class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.catalog.title')}}</h3>
                            <p class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.catalog.description')}}</p>
                            <div class="container">
                                <div class="card-columns text-center">
                                    @foreach($prices['catalog'] as $price)
                                    <div class="card wow bounceIn">
                                        <div class="card-header bg-primary">
                                        <h4 class="text-white nopadding">{{$price['title']}}</h4>
                                        </div>
                                        <div class="card-body nopadding bg-light">
                                        <small class="text-muted">{{ trans('front/pages/index.section2.from')}}</small>
                                        <p class="card-text display-4">{{$price['amount']}} <span style="font-size: 0.5em">Dh</span></p>

                                        <ul class="list-group mb-3">
                                            @foreach($price['options'] as $option)
                                            <li class="list-group-item">{{$option}}</li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="pills-mobile_app" role="tabpanel" aria-labelledby="pills-mobile_app-tab">
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-7">
                                <h3>{{trans('front/pages/prices.section0.mobile_app.title')}}</h3>
                                <p>{{trans('front/pages/prices.section0.mobile_app.content')}}</p>
                            </div>
                            <div class="col-10 col-md-5">
                                <img src="https://images.unsplash.com/photo-1494366222322-387658a1a976?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80" class="img-fluid float-right" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('scripts')
<script type="text/javascript">
    $(function() {
        // Navbar active links
        $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(4)').addClass('active text-muet');
        $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(4)').addClass('active');
    });
</script>
@endsection