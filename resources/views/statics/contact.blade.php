@extends('layouts.app')

@section('content')
<div style="height: 70vh; background-image: linear-gradient(to right top, rgba(232, 123, 192, 0.9), rgba(225, 109, 203, 0.9), rgba(211, 98, 218, 0.9), rgba(190, 91, 234, 0.9), rgba(158, 89, 253, 0.9)), url('img/bg/bg-contact.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;" class="position-relative">
    {{ Html::navbar_default() }}

    <div class="position-absolute w-100 text-center text-white" style="top: 45%;">
        <h1>{{ trans('front/pages/contact.title') }}</h1>
    </div>
</div>

@if(!empty($ok))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ $ok }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<section class="py-5">
    <div class="container">
        <h2 class="text-center display-4 px-2 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.1s">{{trans('front/pages/contact.section0.title')}}</h2><br>
        <div class="row justify-content-center text-center wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
            <div class="col">
                <div class="card bg-light p-2 mb-3 border-0" style="min-width: 16rem;">
                    <div class="card-body">
                        <span class="fa-stack mb-4">
                            <i class="fas fa-phone fa-3x fa-stack-1x text-primary"></i>
                        </span>
                        <p class="text-card">
                            @foreach(config('infos.phones') as $numberPhone)
                                <a class="btn btn-link" href="tel:{{$numberPhone}}">{{$numberPhone}}</a>
                            @endforeach
                        </p> 
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card bg-light p-2 mb-3 border-0" style="min-width: 16rem;">
                    <div class="card-body">
                        <span class="fa-stack mb-4">
                            <i class="far fa-envelope fa-3x fa-stack-1x text-primary"></i>
                        </span>
                        <p class="text-card">
                            @foreach(config('infos.emails') as $email)
                                <a class="btn btn-link" href="mailto:{{$email}}">{{$email}}</a>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card bg-light p-2 mb-3 border-0" style="min-width: 16rem;">
                    <div class="card-body">
                        <span class="fa-stack mb-4">
                            <i class="fas fa-map-marker-alt fa-3x fa-stack-1x text-primary"></i><br>
                        </span>
                        <p class="card-text">{{config('infos.address')}}</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row justify-content-around py-5">
            <div class="col-10 col-md-6 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.1s">
                
                {!! Form::open(['url' => 'contact']) !!}
                
                    {!! Form::control('text', $errors, 'name', ['class' => 'form-control rounded', 'placeholder' => trans('front/pages/contact.form.placeholder.name'), 'required' =>'required']) !!}

                    {!! Form::control('email', $errors, 'email', ['class' => 'form-control rounded', 'placeholder' => trans('front/pages/contact.form.placeholder.email'), 'required'=> 'required']) !!}

                    {!! Form::control('tel', $errors, 'phone_number', ['class' => 'form-control rounded', 'placeholder' => trans('front/pages/contact.form.placeholder.number_phone')]) !!}

                    {!! Form::control('text', $errors, 'subject', ['class' => 'form-control rounded', 'placeholder' => trans('front/pages/contact.form.placeholder.subject'), 'required'=> 'required']) !!}

                    {!! Form::control('textarea', $errors, 'content', ['class' => 'form-control rounded-soft', 'placeholder' => trans('front/pages/contact.form.placeholder.message'), 'required'=> 'required']) !!}

                    {!! Form::button_submit(trans('front/pages/contact.form.send_button')) !!}

                {!! Form::close() !!}

            </div>
            <div class="col-10 col-md-6 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
                <!-- <map>for map</map> -->
            </div>
        </div>
    </div>
</section>
@endsection



@section('scripts')
<script type="text/javascript">
    $(function() {
        // Navbar active links
        $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(5)').addClass('active');
        $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(5)').addClass('active');

        // Dismissible alert
        if($('div.alert-success').css('display') === 'block'){
            setTimeout(function() { 
                $('div.alert-success').fadeOut('slow');
            }, 5000);
        }
    });
</script>
@endsection
