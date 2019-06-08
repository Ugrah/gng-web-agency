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
<div style="height: 70vh; background-image: linear-gradient(to right top, rgba(232, 123, 192, 0.9), rgba(225, 109, 203, 0.9), rgba(211, 98, 218, 0.9), rgba(190, 91, 234, 0.9), rgba(158, 89, 253, 0.9)), url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'); background-repeat: no-repeat; background-size: cover; background-position: center center; background-attachment: fixed;" class="position-relative">
    @include('blocs.navbar2')

    <div class="position-absolute w-100 text-center text-white" style="top: 45%;">
        <h1>{{ trans('front/pages/website.title') }}</h1>
    </div>
</div>

<section class="py-5">
    <h2 class="text-center wow bounceInLeft display-4">{{ trans('front/pages/website.section0.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center wow bounceInRight">{{ trans('front/pages/website.section0.description')}}</p>
    <div class="container">
        <div class="row justify-content-around py-5">
            <div class="col">
                <ul class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item col-6 col-md-3 text-center px-0">
                        <a class="nav-link rounded active" id="pills-showcase-tab" data-toggle="pill" href="#pills-showcase" role="tab" aria-controls="pills-showcase" aria-selected="true">{{trans('front/pages/website.section0.showcase.name')}}</a>
                    </li>
                    <li class="nav-item col-6 col-md-3 text-center px-0">
                        <a class="nav-link rounded" id="pills-e_commerce-tab" data-toggle="pill" href="#pills-e_commerce" role="tab" aria-controls="pills-e_commerce" aria-selected="false">{{trans('front/pages/website.section0.e_commerce.name')}}</a>
                    </li>
                    <li class="nav-item col-6 col-md-3 text-center px-0">
                        <a class="nav-link rounded" id="pills-portfolio-tab" data-toggle="pill" href="#pills-portfolio" role="tab" aria-controls="pills-portfolio" aria-selected="false">{{trans('front/pages/website.section0.portfolio.name')}}</a>
                    </li>
                    <li class="nav-item col-6 col-md-3 text-center px-0">
                        <a class="nav-link rounded" id="pills-catalog-tab" data-toggle="pill" href="#pills-catalog" role="tab" aria-controls="pills-catalog" aria-selected="false">{{trans('front/pages/website.section0.catalog.name')}}</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-showcase" role="tabpanel" aria-labelledby="pills-showcase-tab">
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-7">
                                <h3>{{trans('front/pages/website.section0.showcase.title')}}</h3>
                                <p>{{trans('front/pages/website.section0.showcase.content')}}</p>
                            </div>
                            <div class="col-10 col-md-5">
                                <img src="https://images.unsplash.com/photo-1502945015378-0e284ca1a5be?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" class="img-fluid float-right" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-e_commerce" role="tabpanel" aria-labelledby="pills-e_commerce-tab">
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-7">
                                <h3>{{trans('front/pages/website.section0.e_commerce.title')}}</h3>
                                <p>{{trans('front/pages/website.section0.e_commerce.content')}}</p>
                            </div>
                            <div class="col-10 col-md-5">
                                <img src="https://images.unsplash.com/photo-1502945015378-0e284ca1a5be?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" class="img-fluid float-right" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-portfolio" role="tabpanel" aria-labelledby="pills-portfolio-tab">
                        <div class="row">
                            <div class="col-10 col-md-7">
                                <h3>{{trans('front/pages/website.section0.portfolio.title')}}</h3>
                                <p>{{trans('front/pages/website.section0.portfolio.content')}}</p>
                            </div>
                            <div class="col-10 col-md-5">
                                <img src="https://images.unsplash.com/photo-1502945015378-0e284ca1a5be?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" class="img-fluid float-right" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-catalog" role="tabpanel" aria-labelledby="pills-catalog-tab">  
                        <div class="row">
                            <div class="col-10 col-md-7">
                                <h3>{{trans('front/pages/website.section0.catalog.title')}}</h3>
                                <p>{{trans('front/pages/website.section0.catalog.content')}}</p>
                            </div>
                            <div class="col-10 col-md-5">
                                <img src="https://images.unsplash.com/photo-1502945015378-0e284ca1a5be?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" class="img-fluid float-right" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 gradient-blue">
    <h2 class="text-center text-light wow bounceInLeft display-4">{{ trans('front/pages/website.section1.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center text-light wow bounceInRight">{{ trans('front/pages/website.section1.description')}}</p>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 mb-2">
                <img class="img-fluid" src="https://stonemedia.ch/wp-content/uploads/2018/04/programmation-logiciel.png" alt="">
            </div>
            <div class="col-10 col-md-6 mt-4 mt-md-0">
                <p class="text-light">{{ trans('front/pages/website.section1.content')}}</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <h2 class="text-center wow bounceInLeft display-4">{{ trans('front/pages/website.section2.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center wow bounceInRight">{{ trans('front/pages/website.section2.description')}}</p>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4 text-center text-md-right mt-4 mt-md-0 wow bounceInLeft">
                {!! trans('front/pages/website.section2.content1')!!}
            </div>

            <div class="col-10 col-md-4 mb-2 wow bounceInUp">
                <img class="img-fluid" src="https://stonemedia.ch/wp-content/uploads/2018/04/programmation-logiciel.png" alt="">
            </div>

            <div class="col-10 col-md-4 text-center text-md-left mt-4 mt-md-0 wow bounceInRight">
                {!! trans('front/pages/website.section2.content2')!!}
            </div>
        </div>
    </div>
</section>

<section class="py-5 gradient-and-image">
    <h2 class="text-center text-light wow bounceInLeft display-4">{{ trans('front/pages/website.section3.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center text-light wow bounceInRight">{{ trans('front/pages/website.section3.description')}}</p>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 mb-2">
                <img class="img-fluid" src="https://stonemedia.ch/wp-content/uploads/2018/04/programmation-logiciel.png" alt="">
            </div>
            <div class="col-10 col-md-6 mt-4 mt-md-0">
                <p class="text-light">{{ trans('front/pages/website.section3.content')}}</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <h2 class="text-center wow bounceInLeft display-4">{{ trans('front/pages/website.section4.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center  wow bounceInRight">{{ trans('front/pages/website.section4.description')}}</p>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 mt-4 mt-md-0">
                <p class="">{{ trans('front/pages/website.section4.content')}}</p>
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
        $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(2)').addClass('active text-muet');
        $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(2)').addClass('active');
    });
</script>
@endsection
