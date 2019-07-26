@extends('layouts.app')

@section('content')

{{ Html::navbar_fixed_2() }}
<br><br><br>
<!-- Page Heading -->
<div class="container-fluid gradient-blue p-2 p-md-5">
    <div class="d-sm-flex align-items-center justify-content-between px-5 my-4">
        <h1 class="px-1 px-md-5 mb-0 text-gray-800">{{ config('infos.name'). ' : '. $production->name }}</h1>
        
    </div>
</div>


<section class="py-2 py-md-5">
    <div class="container mt-2 mt-md-5">
        <div class="row justify-content-center rounded-soft">
            <div class="col col-11 col-md-8 mb-4">
                <div class="card lazy-rounded shadow mb-4 position-relative item-main-image">
                    <img class="lazy-rounded  w-100" src="{{asset(config('images.productions').'/'.$production->image_name)}}" class="img-fluid" alt="Responsive image">

                    <button class="position-absolute lazy-rounded h-100 w-100 my-auto text-center gradient-blue show-item-link">
                        <a style="top:45%" target="_blank" href="{{ route('live.preview.production', ['id' => $production->id]) }}" class="btn btn-light position-relative py-2 px-4">{{ __('View preview') }}</a>
                    </button>
                </div>

                <div class="card lazy-rounded mb-4">
                    <div class="card-header">
                        {{ __('Description') }}
                    </div>
                    <div class="card-body">{{ $production->getDescription() }}</div>
                </div>

                <div class="card lazy-rounded mb-4">
                    <div class="card-header">
                        {{ __('Screenshots') }}
                    </div>
                    <div class="card-body">

                        <div id="carouselScreenshots" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach(json_decode($production->screenshots, true) as $key => $img_name)
                                    <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
                                    <img src="{{asset(config('images.screenshots').'/'.$img_name)}}" class="d-block w-100" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselScreenshots" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselScreenshots" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col col-11 col-md-4">
                <!-- Card to button -->
                <div class="card lazy-rounded mb-4">
                    <div class="card-body px-3 py-2">
                        <a target="_blank" href="{{ route('live.preview.production', ['id' => $production->id]) }}" class="btn btn-primary btn-block gradient-blue my-3">{{ __('Live preview') }}</a>
                        <a target="_blank" href="{{ url($production->url) }}" class="btn btn-light btn-block my-3">{{ __('Visite website') }}</a>
                    </div>
                </div>

                <div class="card lazy-rounded mb-4">
                    <div class="card-header">
                        {{ __('Details') }}
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ __('Type') }} <span class="float-right">{{ $production->type }}</span></li>
                            <li class="list-group-item">{{ __('Author') }} <span class="float-right">{{ $production->author }}</span></li>
                            <li class="list-group-item">{{ __('First Released') }} <span class="float-right">{{ $production->created_at }}</span></li>
                        </ul>
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
        // $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(5)').addClass('active text-muet');
        // $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(5)').addClass('active');

        //Item production hover link effect
        $('div.item-main-image')
            .mouseenter(function(){
                $(this).children('button.show-item-link').addClass('animate')
            }).mouseleave(function(){
                $(this).children('button.show-item-link').removeClass('animate')
            });
        
        $('#fixedNavbar').remove();
    });
</script>
@endsection