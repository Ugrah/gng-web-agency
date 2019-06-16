@extends('layouts.app')

@section('styles')
<style>
    ul.nav-pills li.nav-item a.nav-link {
        border: 1px solid #428bca; margin: 0.5em;
    }

    ul.nav-pills li.nav-item a.nav-link.active {
        border-image: linear-gradient(to right top, #1ee6bf, #36e7ac, #4fe798, #67e681, #7fe569);
        background-image: linear-gradient(to right top, #1ee6bf, #36e7ac, #4fe798, #67e681, #7fe569);
    }
</style>
@endsection

@section('content')
<div style="height: 70vh; background-image: linear-gradient(to right top, rgba(232, 123, 192, 0.9), rgba(225, 109, 203, 0.9), rgba(211, 98, 218, 0.9), rgba(190, 91, 234, 0.9), rgba(158, 89, 253, 0.9)), url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'); background-repeat: no-repeat; background-size: cover; background-position: center center; background-attachment: fixed;" class="position-relative">
    {{ Html::navbar_default() }}

    <div class="position-absolute w-100 text-center text-white" style="top: 45%;">
        <h1>{{ trans('front/pages/about.title') }}</h1>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-around py-5">
            <div class="col-10 col-md-6">
                <img class="img-fluid" width="100%" src="https://images.unsplash.com/photo-1559163263-e31c2a5e1895?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="About illustration">
            </div>
            <div class="col-10 col-md-6">
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
                        <p>{{trans('front/pages/about.section0.do.content')}}</p>
                    </div>
                    <div class="tab-pane fade" id="pills-mission" role="tabpanel" aria-labelledby="pills-mission-tab">
                        <h3>{{trans('front/pages/about.section0.mission.title')}}</h3>
                        <p>{{trans('front/pages/about.section0.mission.content')}}</p>
                    </div>
                    <div class="tab-pane fade" id="pills-goal" role="tabpanel" aria-labelledby="pills-goal-tab">
                        <h3>{{trans('front/pages/about.section0.goal.title')}}</h3>
                        <p>{{trans('front/pages/about.section0.goal.content')}}</p>
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
