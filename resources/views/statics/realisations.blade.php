@extends('layouts.app')

@section('content')

<div style="height: 70vh; background-image: linear-gradient(to right top, rgba(232, 123, 192, 0.9), rgba(225, 109, 203, 0.9), rgba(211, 98, 218, 0.9), rgba(190, 91, 234, 0.9), rgba(158, 89, 253, 0.9)), url('img/bg/bg-realisations.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center bottom; background-attachment: fixed;" class="position-relative">
    {{ Html::navbar_default() }}


    <div class="position-absolute w-100 text-center text-white px-2" style="top: 45%;">
        <h1>{{ trans('front/pages/realisations.title') }}</h1>
    </div>
</div>

<section class="py-5">
    <h2 class="text-center wow bounceInLeft display-4 px-2">{{ trans('front/pages/realisations.section0.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center wow bounceInRight">{{ trans('front/pages/realisations.section0.description')}}</p>
    <div class="container">
        <div class="row justify-content-around py-5">
            <div class="col">
                <ul class="row nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item col-10 col-md-4 text-center px-1">
                        <a class="nav-link rounded active" id="pills-website-tab" data-toggle="pill" href="#pills-website" role="tab" aria-controls="pills-website" aria-selected="true">{{trans('front/pages/realisations.section0.website.name')}}</a>
                    </li>
                    <li class="nav-item col-10 col-md-4 text-center px-1">
                        <a class="nav-link rounded" id="pills-mobileApp-tab" data-toggle="pill" href="#pills-mobileApp" role="tab" aria-controls="pills-mobileApp" aria-selected="false">{{trans('front/pages/realisations.section0.mobileApp.name')}}</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-website" role="tabpanel" aria-labelledby="pills-website-tab">
                        <div class="row justify-content-center">
                            
                            <div class="card-deck">

                                {{ Html::card_img('https://image.freepik.com/free-photo/executive-with-light-bulb-surrounded-by-icons_1232-162.jpg', 'Title', 'Text Right', 'Text Left', 'Footer') }}

                                {{ Html::card_img('https://image.freepik.com/free-photo/executive-with-light-bulb-surrounded-by-icons_1232-162.jpg', 'Title', 'Text Right', 'Text Left', 'Footer') }}

                                {{ Html::card_img('https://image.freepik.com/free-photo/executive-with-light-bulb-surrounded-by-icons_1232-162.jpg', 'Title', 'Text Right', 'Text Left', 'Footer') }}
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-mobileApp" role="tabpanel" aria-labelledby="pills-mobileApp-tab">
                        <div class="row justify-content-center">
                        
                            <div class="card-deck">

                                {{ Html::card_img('https://image.freepik.com/free-photo/executive-with-light-bulb-surrounded-by-icons_1232-162.jpg', 'Title', 'Text Right', 'Text Left', 'Footer') }}

                                {{ Html::card_img('https://image.freepik.com/free-photo/executive-with-light-bulb-surrounded-by-icons_1232-162.jpg', 'Title', 'Text Right', 'Text Left', 'Footer') }}

                                {{ Html::card_img('https://image.freepik.com/free-photo/executive-with-light-bulb-surrounded-by-icons_1232-162.jpg', 'Title', 'Text Right', 'Text Left', 'Footer') }}
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
        $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(5)').addClass('active text-muet');
        $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(5)').addClass('active');

        //Card hover effect
        $('div.card')
            .mouseenter(function(){
                $(this).children('img.card-img').addClass('animate')
            }).mouseleave(function(){
                $(this).children('img.card-img').removeClass('animate')
            });
    });
</script>
@endsection