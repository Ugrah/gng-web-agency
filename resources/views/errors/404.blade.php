@extends('layouts.app')



@section('content')
<section class="py-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-12 col-md-7 text-center text-md-left px-5 px-sm-0">
                <h3 class="display-1 text-center">404</h3>
                <h2 class="px-5">{!! trans('front/pages/404.title') !!}</h2>
                <p class="px-5">{!! trans('front/pages/404.content') !!}</p>

                <div class="px-5 py-4">
                    {!! Html::go_to_home(url('/'), 'Revenir à l\'accueil') !!}
                </div>
                

            </div>

            <div class="col-12 col-md-5 text-center px-5 px-sm-0">
                <img src="https://via.placeholder.com/250/72a8ff/ffffff?Text=404" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>
@endsection

