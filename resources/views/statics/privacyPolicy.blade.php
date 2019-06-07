@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-around py-5">
            <div class="col-10">
            <h1 class="text-center mb-4">{{trans('front/pages/privacyPolicy.title', ['site_name' => config('infos.name')])}}</h1>
            {!! trans('front/pages/privacyPolicy.content0') !!}

            <h2>{{ trans('front/pages/privacyPolicy.informations') }}</h2>
            {!! trans('front/pages/privacyPolicy.info_content') !!}

            <h2>{{ trans('front/pages/privacyPolicy.data') }}</h2>
            {!! trans('front/pages/privacyPolicy.data_content') !!}

            <h2>{{ trans('front/pages/privacyPolicy.cookies') }}</h2>
            {!! trans('front/pages/privacyPolicy.cookies_content') !!}

            <h2>{{ trans('front/pages/privacyPolicy.service') }}</h2>
            {!! trans('front/pages/privacyPolicy.service_content') !!}

            <h2>{{ trans('front/pages/privacyPolicy.security') }}</h2>
            {!! trans('front/pages/privacyPolicy.security_content') !!}

            <h2>{{ trans('front/pages/privacyPolicy.links') }}</h2>
            {!! trans('front/pages/privacyPolicy.links_content') !!}

            <h2>{{ trans('front/pages/privacyPolicy.children') }}</h2>
            {!! trans('front/pages/privacyPolicy.children_content') !!}

            <h2>{{ trans('front/pages/privacyPolicy.changes') }}</h2>
            {!! trans('front/pages/privacyPolicy.changes_content') !!}

            <h2>{{ trans('front/pages/privacyPolicy.contact_us') }}</h2>
            {!! trans('front/pages/privacyPolicy.contact_us_content') !!}

            </div>
        </div>
    </div>
</section>
@endsection

