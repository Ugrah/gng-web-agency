@extends('layouts.admin')

@section('content')

<div class="container-fluid p-4">
    <!-- Page notification -->
    @if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Productions : '). $production->name }}</h1>
        <a id="submit-form" href="{{ route('production.edit', ['production' => $production->id]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="far fa-edit fa-sm text-white-50"></i> {{  __('Edit Production') }}</a>
    </div>

    <div class="row">
        <img class="px-3 mx-auto w-100 mb-4" src="{{asset('uploads/productions/'.$production->image_name)}}" class="img-fluid" alt="Responsive image">
    </div>

    <div class="row">
        <div class="col col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                {{ __('Details') }}
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ __('Type') }} <span class="float-right">{{ $production->type }}</span></li>
                    <li class="list-group-item">{{ __('Author') }} <span class="float-right">{{ $production->author }}</span></li>
                    <li class="list-group-item">{{ __('Url') }} <span class="float-right"> <a href="{{ $production->url }}" target="_blank">{{ $production->url }}</a></span></li>
                    <li class="list-group-item">{{ __('Released') }} <span class="float-right"> <a href="{{ $production->url }}" target="_blank">{{ $production->created_at }}</a></span></li>
                </ul>
            </div>
        </div>
        </div>
        <div class="col col-md-8 mb-4">
        <div class="card">
            <div class="card-header">
                {{ __('Screenshots') }}
            </div>
            <div class="card-body">

                <div id="carouselScreenshots" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach(json_decode($production->screenshots, true) as $key => $img_name)
                            <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
                            <img src="{{asset('uploads/productions/screenshots/'.$img_name)}}" class="d-block w-100" alt="">
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
    </div>

    <div class="row">
        <div class="col">
        <div class="card">
            <div class="card-header">
                {{ __('Description English') }}
            </div>
            <div class="card-body">{{ $production->description_en }}</div>
        </div>
        </div>
        <div class="col">
        <div class="card">
            <div class="card-header">
                {{ __('Description English') }}
            </div>
            <div class="card-body">{{ $production->description_fr }}</div>
        </div>
        </div>
    </div>
    
</div>

@endsection

@section('scripts')

  <script type="text/javascript">
      $(function() {
        // Aside active link
        $('#mySidebar ul.navbar-nav > li.nav-item > a.nav-link:eq(1)').addClass('active');

        // Dismissible alert
        if($('div.alert-success').css('display') === 'block'){
            setTimeout(function() { 
                $('div.alert-success').fadeOut('slow');
            }, 5000);
        }
      });
  </script>
@endsection
