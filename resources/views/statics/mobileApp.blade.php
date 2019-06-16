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

<div style="height: 70vh; background-image: linear-gradient(to right top, rgba(232, 123, 192, 0.9), rgba(225, 109, 203, 0.9), rgba(211, 98, 218, 0.9), rgba(190, 91, 234, 0.9), rgba(158, 89, 253, 0.9)), url('https://images.unsplash.com/photo-1533022139390-e31c488d69e2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80'); background-repeat: no-repeat; background-size: cover; background-position: center bottom; background-attachment: fixed;" class="position-relative">
    {{ Html::navbar_default() }}


    <div class="position-absolute w-100 text-center text-white px-2" style="top: 45%;">
        <h1>{{ trans('front/pages/mobileApp.title') }}</h1>
    </div>
</div>

<section class="py-5">
    <h2 class="text-center wow bounceInLeft display-4 px-2">{{ trans('front/pages/mobileApp.section0.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center wow bounceInRight">{{ trans('front/pages/mobileApp.section0.description')}}</p>
    <div class="container">
        <div class="row justify-content-around py-5">
            <div class="col">
                <ul class="row nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
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
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-assistance" role="tabpanel" aria-labelledby="pills-assistance-tab">
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-7">
                                <h3>{{trans('front/pages/mobileApp.section0.assistance.title')}}</h3>
                                <p>{{trans('front/pages/mobileApp.section0.assistance.content')}}</p>
                            </div>
                            <div class="col-10 col-md-5">
                                <img src="https://images.unsplash.com/photo-1494366222322-387658a1a976?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80" class="img-fluid float-right" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-native" role="tabpanel" aria-labelledby="pills-native-tab">
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-7">
                                <h3>{{trans('front/pages/mobileApp.section0.native.title')}}</h3>
                                <p>{{trans('front/pages/mobileApp.section0.native.content')}}</p>
                            </div>
                            <div class="col-10 col-md-5">
                                <img src="https://images.unsplash.com/photo-1494366222322-387658a1a976?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80" class="img-fluid float-right" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-innovation" role="tabpanel" aria-labelledby="pills-innovation-tab">
                        <div class="row">
                            <div class="col-10 col-md-7">
                                <h3>{{trans('front/pages/mobileApp.section0.innovation.title')}}</h3>
                                <p>{{trans('front/pages/mobileApp.section0.innovation.content')}}</p>
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

<section class="py-5 gradient-blue">
    <h2 class="text-center text-light wow bounceInLeft display-4 px-2">{{ trans('front/pages/mobileApp.section1.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center text-light wow bounceInRight">{{ trans('front/pages/mobileApp.section1.description')}}</p>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 mb-2">
                <img class="img-fluid" src="https://stonemedia.ch/wp-content/uploads/2018/04/programmation-logiciel.png" alt="">
            </div>
            <div class="col-10 col-md-6 mt-4 mt-md-0">
                <p class="text-light">{{ trans('front/pages/mobileApp.section1.content')}}</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <h2 class="text-center wow bounceInLeft display-4">{{ trans('front/pages/mobileApp.section2.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center wow bounceInRight">{{ trans('front/pages/mobileApp.section2.description')}}</p>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4 text-center text-light text-md-right mt-4 mt-md-0 wow bounceInLeft">
                {!! trans('front/pages/mobileApp.section2.content1')!!}
            </div>

            <div class="col-10 col-md-4 mb-2 wow bounceInUp">
                <img class="img-fluid" src="https://stonemedia.ch/wp-content/uploads/2018/04/programmation-logiciel.png" alt="">
            </div>

            <div class="col-10 col-md-4 text-center text-light text-md-left mt-4 mt-md-0 wow bounceInRight">
                {!! trans('front/pages/mobileApp.section2.content2')!!}
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #fff;">
    <h2 class="text-center wow bounceInLeft display-4">{{ trans('front/pages/mobileApp.section3.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center  wow bounceInRight">{{ trans('front/pages/mobileApp.section3.description')}}</p>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 mt-4 mt-md-0">
                <p class="">{{ trans('front/pages/mobileApp.section3.content')}}</p>
                <a href="#" class="btn btn-primary px-4 py-2 mt-xl-5 rounded price">Voir nos tarifs</a>
            </div>
            <div class="col-10 col-md-6 mb-2">
                <img class="img-fluid" src="https://stonemedia.ch/wp-content/uploads/2018/04/programmation-logiciel.png" alt="">
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