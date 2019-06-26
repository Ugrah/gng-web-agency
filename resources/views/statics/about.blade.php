@extends('layouts.app')

@section('content')
<div style="height: 70vh; background-image: linear-gradient(to right top, rgba(232, 123, 192, 0.9), rgba(225, 109, 203, 0.9), rgba(211, 98, 218, 0.9), rgba(190, 91, 234, 0.9), rgba(158, 89, 253, 0.9)), url('img/bg/bg-about.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center; background-attachment: fixed;" class="position-relative">
    {{ Html::navbar_default() }}

    <div class="position-absolute w-100 text-center text-white" style="top: 45%;">
        <h1>{{ trans('front/pages/about.title', ['app_name' => config('infos.name')]) }}</h1>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-10 col-md-6 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.1s">
                <img class="img-fluid" width="100%" src="{{asset('img/about/computer_and_mobile_phone.jpg')}}" alt="About illustration">
            </div>
            <div class="col-10 col-md-6 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link rounded active" id="pills-do-tab" data-toggle="pill" href="#pills-do" role="tab" aria-controls="pills-do" aria-selected="true">{{trans('front/pages/about.section0.do.name')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded" id="pills-mission-tab" data-toggle="pill" href="#pills-mission" role="tab" aria-controls="pills-mission" aria-selected="false">{{trans('front/pages/about.section0.mission.name')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded" id="pills-goal-tab" data-toggle="pill" href="#pills-goal" role="tab" aria-controls="pills-goal" aria-selected="false">{{trans('front/pages/about.section0.goal.name')}}</a>
                    </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-do" role="tabpanel" aria-labelledby="pills-do-tab">
                        <h3>{{trans('front/pages/about.section0.do.title')}}</h3>
                        {!! trans('front/pages/about.section0.do.content') !!}
                    </div>
                    <div class="tab-pane fade" id="pills-mission" role="tabpanel" aria-labelledby="pills-mission-tab">
                        <h3>{{trans('front/pages/about.section0.mission.title', ['app_name' => config('infos.name')])}}</h3>
                        {!! trans('front/pages/about.section0.mission.content', ['app_name' => config('infos.name')]) !!}
                    </div>
                    <div class="tab-pane fade" id="pills-goal" role="tabpanel" aria-labelledby="pills-goal-tab">
                        <h3>{{trans('front/pages/about.section0.goal.title')}}</h3>
                        {!! trans('front/pages/about.section0.goal.content') !!}
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
        $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(1)').addClass('active');
        $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(1)').addClass('active');
    });
</script>
@endsection
