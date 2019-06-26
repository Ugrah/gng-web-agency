@extends('layouts.app')

@section('content')
<div style="height: 70vh; background-image: linear-gradient(to right top, rgba(232, 123, 192, 0.9), rgba(225, 109, 203, 0.9), rgba(211, 98, 218, 0.9), rgba(190, 91, 234, 0.9), rgba(158, 89, 253, 0.9)), url('https://images.unsplash.com/photo-1483058712412-4245e9b90334?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60'); background-repeat: no-repeat; background-size: cover; background-position: center center;" class="position-relative">
    {{ Html::navbar_default() }}


    <div class="position-absolute w-100 text-center text-white" style="top: 45%;">
        <h1>{{ trans('front/pages/contact.title') }}</h1>
    </div>
</div>

@if(!empty($ok))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                            <a class="btn btn-link" href="tel:+212645717187">+212 6 45 71 71 87</a>
                            <a class="btn btn-link" href="tel:+212645717187">+212 6 45 71 71 87</a>
                            <a class="btn btn-link" href="tel:+212645717187">+212 6 45 71 71 87</a>
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
                            <a class="btn btn-link" href="mailto:contact@gngdev.com">contact@gngdev.com</a>
                            <a class="btn btn-link" href="mailto:infos@gngdev.com">infos@gngdev.com</a>
                            <a class="btn btn-link" href="mailto:recrutement@gngdev.com">recrutement@gngdev.com</a>
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
                        <p class="card-text">203 Fake St. Mountain View, San Francisco, California, USA</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row justify-content-around py-5">
            <div class="col-10 col-md-6 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.1s">
                
                {!! Form::open(['url' => 'contact']) !!}
                
                    {!! Form::control('text', $errors, 'name', ['class' => 'form-control rounded', 'placeholder' => trans('front/pages/contact.form.placeholder.name'), 'required' =>'required']) !!}

                    {!! Form::control('email', $errors, 'email', ['class' => 'form-control rounded', 'placeholder' => trans('front/pages/contact.form.placeholder.email'), 'required'=> 'required']) !!}

                    {!! Form::control('tel', $errors, 'phoneNumber', ['class' => 'form-control rounded', 'placeholder' => trans('front/pages/contact.form.placeholder.number_phone')]) !!}

                    {!! Form::control('text', $errors, 'subject', ['class' => 'form-control rounded', 'placeholder' => trans('front/pages/contact.form.placeholder.subject'), 'required'=> 'required']) !!}

                    {!! Form::control('textarea', $errors, 'content', ['class' => 'form-control rounded-soft', 'placeholder' => trans('front/pages/contact.form.placeholder.message'), 'required'=> 'required']) !!}

                    {!! Form::button_submit(trans('front/pages/contact.form.send_button')) !!}

                {!! Form::close() !!}

            </div>
            <div class="col-10 col-md-6 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
                <map>for map</map>
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
