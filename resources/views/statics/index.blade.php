@extends('layouts.app')

@section('content')
    <div style="height: 100vh; background-image: linear-gradient(to right top, #e87bc0, #e16dcb, #d362da, #be5bea, #9e59fd);" class="position-relative">

        @include('blocs.navbar2')

        @include('blocs.carousel-home')
    </div>

    <section class="text-center py-5 bg-medium">
        <h2 class="wow bounceInLeft display-4">{{ trans('front/pages/index.section0.title')}}</h2>
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto">
                    <p class="wow bounceInRight">{{ trans('front/pages/index.section0.description')}}</p>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-8 col-md-6 col-lg-4 fadeInLeft wow" data-wow-delay="0.5s">
                    <div class="card p-4 mb-4">
                    <div class="card-body">
                        <i class="fas fa-window-restore fa-3x mb-4 text-success"></i>
                        <h5 class="card-title">{{ trans('front/pages/index.section0.item0.title')}}</h5>
                        <p class="card-text">{{ trans('front/pages/index.section0.item0.content')}}</p>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 fadeInLeft wow" data-wow-delay="0.3s">
                    <div class="card p-4 mb-4">
                    <div class="card-body">
                        <i class="fas fa-window-restore fa-3x mb-4 text-success"></i>
                        <h5 class="card-title">{{ trans('front/pages/index.section0.item1.title')}}</h5>
                        <p class="card-text">{{ trans('front/pages/index.section0.item1.content')}}</p>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 fadeInLeft wow" data-wow-delay="0.1s">
                    <div class="card p-4 mb-4">
                    <div class="card-body">
                        <i class="fas fa-window-restore fa-3x mb-4 text-success"></i>
                        <h5 class="card-title">{{ trans('front/pages/index.section0.item2.title')}}</h5>
                        <p class="card-text">{{ trans('front/pages/index.section0.item2.content')}}</p>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 fadeInRight wow" data-wow-delay="0.1s">
                    <div class="card p-4 mb-4">
                    <div class="card-body">
                        <i class="fas fa-window-restore fa-3x mb-4 text-success"></i>
                        <h5 class="card-title">{{ trans('front/pages/index.section0.item3.title')}}</h5>
                        <p class="card-text">{{ trans('front/pages/index.section0.item3.content')}}</p>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 fadeInRight wow" data-wow-delay="0.3s">
                    <div class="card p-4 mb-4">
                    <div class="card-body">
                        <i class="fas fa-window-restore fa-3x mb-4 text-success"></i>
                        <h5 class="card-title">{{ trans('front/pages/index.section0.item4.title')}}</h5>
                        <p class="card-text">{{ trans('front/pages/index.section0.item4.content')}}</p>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 fadeInRight wow" data-wow-delay="0.5s">
                    <div class="card p-4 mb-4">
                    <div class="card-body">
                        <i class="fas fa-window-restore fa-3x mb-4 text-success"></i>
                        <h5 class="card-title">{{ trans('front/pages/index.section0.item5.title')}}</h5>
                        <p class="card-text">{{ trans('front/pages/index.section0.item5.content')}}</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-background py-5">
        <div class="container text-light">
            <div class="row">
                <div class="col-6 wow bounceInLeft text-center">
                    <p>For image illustration</p>
                </div>
                <div class="col-6 wow bounceInRight">
                <h3 class="text-light">{{ trans('front/pages/index.section1.title', ['app_name' => config('infos.name')]) }}</h3>
                    <p>{!! trans('front/pages/index.section1.content') !!}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center py-5 bg-medium">
        <h2 class="wow bounceInLeft">{{ trans('front/pages/index.section2.title')}}</h2>
        <p class="col-10 col-md-8 mx-auto wow bounceInRight">{{ trans('front/pages/index.section2.description')}}</p>
        <div class="container mt-5">
            <div class="card-deck">
                <div class="card bg-danger">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body bg-warning w-100 nopadding">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text display-4 bg-light py-3">99 <span>dh</span></p>
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

    <section class="main-background py-5 text-center">
        <div class="container text-light">
            <h4 class="text-light mb-5">This is a title</h4>
            <div class="row">
                <div class="col-3 wow bounceInUp">
                    <span class="counter display-4">100</span>
                    <p>Value Name</p>
                </div>
                <div class="col-3 wow bounceInUp">
                    <span class="counter display-4">100</span>
                    <p>Value Name</p>
                </div>
                <div class="col-3 wow bounceInUp">
                    <span class="counter display-4">100</span>
                    <p>Value Name</p>
                </div>
                <div class="col-3 wow bounceInUp">
                    <span class="counter display-4">100</span>
                    <p>Value Name</p>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center py-5 bg-medium">
        <h2 class="wow bounceInLeft">{{ trans('front/pages/index.section4.title')}}</h2>
        <p class="wow bounceInRight">{{ trans('front/pages/index.section4.description')}}</p>
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