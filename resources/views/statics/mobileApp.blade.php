@extends('layouts.app')

@section('content')

<div style="height: 70vh; background-image: linear-gradient(to right top, rgba(232, 123, 192, 0.9), rgba(225, 109, 203, 0.9), rgba(211, 98, 218, 0.9), rgba(190, 91, 234, 0.9), rgba(158, 89, 253, 0.9)), url('img/bg/bg-mobile-app.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center bottom; background-attachment: fixed;" class="position-relative">
    {{ Html::navbar_default() }}


    <div class="position-absolute w-100 text-center text-white px-2" style="top: 45%;">
        <h1>{{ trans('front/pages/mobileApp.title') }}</h1>
    </div>
</div>

<section class="py-5">
    <h2 class="text-center display-4 px-2 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.1s">{{ trans('front/pages/mobileApp.section0.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">{{ trans('front/pages/mobileApp.section0.description')}}</p>
    <div class="container">
        <div class="row justify-content-around py-5">
            <div class="col">
                <ul class="row nav nav-pills justify-content-center mb-3 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.1s" id="pills-tab" role="tablist">
                    <li class="nav-item col-10 col-md-4 text-center px-1">
                        <a class="nav-link rounded active" id="pills-assistance-tab" data-toggle="pill" href="#pills-assistance" role="tab" aria-controls="pills-assistance" aria-selected="true">{{trans('front/pages/mobileApp.section0.assistance.name')}}</a>
                    </li>
                    <li class="nav-item col-10 col-md-4 text-center px-1">
                        <a class="nav-link rounded" id="pills-native-tab" data-toggle="pill" href="#pills-native" role="tab" aria-controls="pills-native" aria-selected="false">{{trans('front/pages/mobileApp.section0.native.name')}}</a>
                    </li>
                    <li class="nav-item col-10 col-md-4 text-center px-1">
                        <a class="nav-link rounded" id="pills-innovation-tab" data-toggle="pill" href="#pills-innovation" role="tab" aria-controls="pills-innovation" aria-selected="false">{{trans('front/pages/mobileApp.section0.innovation.name')}}</a>
                    </li>
                </ul>
                <div class="tab-content wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-assistance" role="tabpanel" aria-labelledby="pills-assistance-tab">
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-7 text-center text-md-left">
                                <h3>{{trans('front/pages/mobileApp.section0.assistance.title')}}</h3>
                                <p>{{trans('front/pages/mobileApp.section0.assistance.content')}}</p>
                            </div>
                            <div class="col-10 col-md-5">
                                <img src="{{ asset('img/mobile-app/assistance.png') }}" class="img-fluid float-right" alt="{{ trans('front/pages/mobileApp.section0.assistance.img_alt') }}">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-native" role="tabpanel" aria-labelledby="pills-native-tab">
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-7 text-center text-md-left">
                                <h3>{{trans('front/pages/mobileApp.section0.native.title')}}</h3>
                                <p>{{trans('front/pages/mobileApp.section0.native.content', ['app_name' => config('infos.name')])}}</p>
                            </div>
                            <div class="col-10 col-md-5">
                                <img src="{{ asset('img/mobile-app/native-app.png') }}" class="img-fluid float-right" alt="{{ trans('front/pages/mobileApp.section0.native.img_alt') }}">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-innovation" role="tabpanel" aria-labelledby="pills-innovation-tab">
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-7 text-center text-md-left">
                                <h3>{{trans('front/pages/mobileApp.section0.innovation.title')}}</h3>
                                <p>{{trans('front/pages/mobileApp.section0.innovation.content')}}</p>
                            </div>
                            <div class="col-10 col-md-5">
                                <img src="{{ asset('img/mobile-app/innovation.png') }}" class="img-fluid float-right" alt="{{ trans('front/pages/mobileApp.section0.native.img_alt') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 gradient-blue">
    <h2 class="text-center text-light display-4 px-2 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.1s">{{ trans('front/pages/mobileApp.section1.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center text-light wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">{{ trans('front/pages/mobileApp.section1.description')}}</p>

    <div class="container mt-5 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 mb-2">
                <img class="img-fluid" src="{{ asset('img/mobile-app/multi-ui-design.png') }}" alt="{{trans('front/pages/mobileApp.section1.img_alt')}}">
            </div>
            <div class="col-10 col-md-6 mt-4 mt-md-0">
                {!! trans('front/pages/mobileApp.section1.content') !!}
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <h2 class="text-center display-4 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.1s">{{ trans('front/pages/mobileApp.section2.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">{{ trans('front/pages/mobileApp.section2.description')}}</p>

    <div class="container mt-5 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 text-center text-light text-md-left mt-4 mt-md-0">
                {!! trans('front/pages/mobileApp.section2.content1')!!}
                {!! trans('front/pages/mobileApp.section2.content2')!!}
            </div>

            <div class="col-10 col-md-6 mb-2">
                <img class="img-fluid" src="{{asset('img/mobile-app/maintenance-mobile-app.png')}}" alt="{{trans('front/pages/mobileApp.section2.img_alt')}}">
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #fff;">
    <h2 class="text-center display-4 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.1s">{{ trans('front/pages/mobileApp.section3.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">{{ trans('front/pages/mobileApp.section3.description')}}</p>

    <div class="container mt-5 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 mt-4 mt-md-0">
                {!! trans('front/pages/mobileApp.section3.content') !!}
                <a href="{{url('/prices')}}" class="btn btn-primary px-4 py-2 mt-xl-5 rounded price">{{ trans('front/pages/mobileApp.section3.estimate_link')}}</a>
            </div>
            <div class="col-10 col-md-6 mb-2">
                <img class="img-fluid" src="{{asset('img/mobile-app/app-cost.png')}}" alt="">
            </div>
        </div>
    </div>
</section>

@endsection


@section('scripts')
<script type="text/javascript">
    $(function() {
        // Navbar active links
        $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(3)').addClass('active text-muet');
        $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(3)').addClass('active');
    });
</script>
@endsection