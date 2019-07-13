@extends('layouts.app')

@section('content')
    <div style="height: 100vh; background-image: linear-gradient(to right top, #e87bc0, #e16dcb, #d362da, #be5bea, #9e59fd); overflow: hidden;" class="position-relative">

        {{ Html::navbar_default() }}
        {{ Html::carousel_home() }}
        
    </div>
    <h1 class="d-none">{{ config('infos.name').' - '.trans('back/seo/defaults.default_title') }}</h1>

    <section class="text-center py-5 bg-medium">
        <h2 class="display-4 px-3 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.1s">{{ trans('front/pages/index.section0.title')}}</h2>
        <p class="col-10 col-md-8 mx-auto wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">{{ trans('front/pages/index.section0.description')}}</p>
        <div class="container mt-5">
            <div class="row justify-content-center">

                {{ Html::div_card_icon(
                    'fadeInUp',
                    '0.3s',
                    'far fa-window-restore fa-3x',
                    trans('front/pages/index.section0.item0.title'),
                    trans('front/pages/index.section0.item0.content')
                ) }}

                {{ Html::div_card_icon(
                    'fadeInUp',
                    '0.3s',
                    'fas fa-cart-arrow-down',
                    trans('front/pages/index.section0.item1.title'),
                    trans('front/pages/index.section0.item1.content')
                ) }}

                {{ Html::div_card_icon(
                    'fadeInUp',
                    '0.3s',
                    'fas fa-bullseye',
                    trans('front/pages/index.section0.item2.title'),
                    trans('front/pages/index.section0.item2.content')
                ) }}

                {{ Html::div_card_icon(
                    'fadeInUp',
                    '0.3s',
                    'fas fa-mobile-alt',
                    trans('front/pages/index.section0.item3.title'),
                    trans('front/pages/index.section0.item3.content')
                ) }}

                {{ Html::div_card_icon(
                    'fadeInUp',
                    '0.3s',
                    'fas fa-newspaper',
                    trans('front/pages/index.section0.item4.title'),
                    trans('front/pages/index.section0.item4.content')
                ) }}

                {{ Html::div_card_icon(
                    'fadeInUp',
                    '0.3s',
                    'fas fa-poll',
                    trans('front/pages/index.section0.item5.title'),
                    trans('front/pages/index.section0.item5.content')
                ) }}
            </div>
        </div>
    </section>

    <section class="short-about-index py-5">
        <div class="container text-light">
            <div class="row justify-content-center">
                <div class="col-10 col-md-6 d-none d-sm-block my-auto text-center wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.1s">
                    <img src="{{ asset('img/web-development.jpg') }}" alt="Web development illustration" class="img-fluid">
                </div>
                <div class="col-10 col-md-6 text-center text-md-left my-auto wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
                <h3 class="text-light">{{ trans('front/pages/index.section1.title', ['app_name' => config('infos.name')]) }}</h3>
                    {!! trans('front/pages/index.section1.content') !!}
                </div>
            </div>
        </div>
    </section>

    <section class="text-center py-5 bg-medium">
        <h2 class="wow wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s">{{ trans('front/pages/index.section2.title')}}</h2>
        <p class="col-10 col-md-8 mx-auto wow wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s">{{ trans('front/pages/index.section2.description')}}</p>
        <div class="container">
            <div class="row justify-content-center mt-5">
                 <div class="card-group">
                    {{ Html::prod_step(
                        'fadeInUp',
                        '0.1s',
                        'far fa-comment-dots',
                        trans('front/pages/index.section2.item0.content')
                    )}}
                    {{ Html::prod_step(
                        'fadeInUp',
                        '0.1s',
                        'far fa-file-pdf',
                        trans('front/pages/index.section2.item1.content')
                    )}}
                    {{ Html::prod_step(
                        'fadeInUp',
                        '0.1s',
                        'fas fa-hand-holding-usd',
                        trans('front/pages/index.section2.item2.content')
                    )}}
                    {{ Html::prod_step(
                        'fadeInUp',
                        '0.1s',
                        'fas fa-cogs',
                        trans('front/pages/index.section2.item3.content')
                    )}}
                    {{ Html::prod_step(
                        'fadeInUp',
                        '0.3s',
                        'fas fa-file-invoice-dollar',
                        trans('front/pages/index.section2.item4.content')
                    )}}
                    {{ Html::prod_step(
                        'fadeInUp',
                        '0.3s',
                        'fas fa-file-invoice-dollar',
                        trans('front/pages/index.section2.item5.content'),
                        'fas fa-check'
                    )}}
                    {{ Html::prod_step(
                        'fadeInUp',
                        '0.3s',
                        'fas fa-chart-pie',
                        trans('front/pages/index.section2.item6.content')
                    )}}
                    {{ Html::prod_step(
                        'fadeInUp',
                        '0.3s',
                        'fas fa-chart-pie',
                        trans('front/pages/index.section2.item7.content'),
                        'fas fa-check'
                    )}}
                    {{ Html::prod_step(
                        'fadeInUp',
                        '0.5s',
                        'fas fa-laptop-code',
                        trans('front/pages/index.section2.item8.content')
                    )}}
                    {{ Html::prod_step(
                        'fadeInUp',
                        '0.5s',
                        'far fa-file-alt',
                        trans('front/pages/index.section2.item9.content')
                    )}}
                    {{ Html::prod_step(
                        'fadeInUp',
                        '0.5s',
                        'far fa-check-circle',
                        trans('front/pages/index.section2.item10.content')
                    )}}
                    {{ Html::prod_step(
                        'fadeInUp',
                        '0.5s',
                        'fas fa-globe',
                        trans('front/pages/index.section2.item11.content')
                    )}}
                </div>
            </div>
           
        </div>
    </section>

    <!--
    <section class="main-background py-5 text-center">
        <div class="container text-light">
            <h4 class="text-light mb-5 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s">{{trans('front/pages/index.section3.title')}}</h4>
            <div class="row">
                <div class="col-3 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s">
                    <span class="counter display-4">100</span>
                    <p>{{trans('front/pages/index.section3.customers')}}</p>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s">
                    <span class="counter display-4">100</span>
                    <p>{{trans('front/pages/index.section3.projects')}}</p>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s">
                    <span class="counter display-4">100</span>
                    <p>{{trans('front/pages/index.section3.satisfaction')}}</p>
                </div>
                <div class="col-3 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s">
                    <span class="counter display-4">100</span>
                    <p>{{trans('front/pages/index.section3.experience')}}</p>
                </div>
            </div>
        </div>
    </section>
    -->

    <section class="py-5 text-white custom-gradient-blue">
        <div class="container">
            <div class="row text-center text-md-left justify-content-center">
                <div class="col-10 col-md-6 my-auto">
                    <h4 class="text-white wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s" style="font-size: 2rem">{{trans('front/pages/index.section4.title')}}</h4>
                    <p class="text-light wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s">{{trans('front/pages/index.section4.description')}}</p>
                </div>
                <div class="col-10 col-md-6 my-auto text-center text-md-right wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s"><a href="{{ url('/contact') }}" class="btn btn-dark py-3 px-4 rounded">{{ trans('front/pages/index.section4.link') }}</a></div>
            </div>
        </div>
    </section>

    <!-- Section to portfolio | Create user space before
    <section class="text-center py-5 bg-medium">
        <h2 class="wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s">{{ trans('front/pages/index.section4.title')}}</h2>
        <p class="wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.2s">{{ trans('front/pages/index.section4.description')}}</p>
        <div class="container mt-5">
            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function(){
            // Navbar active links
            $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(0)').addClass('active');
            $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(0)').addClass('active');
        });
    </script>
@endsection