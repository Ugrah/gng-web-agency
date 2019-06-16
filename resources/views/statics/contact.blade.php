@extends('layouts.app')

@section('content')
<div style="height: 70vh; background-image: linear-gradient(to right top, rgba(232, 123, 192, 0.9), rgba(225, 109, 203, 0.9), rgba(211, 98, 218, 0.9), rgba(190, 91, 234, 0.9), rgba(158, 89, 253, 0.9)), url('https://images.unsplash.com/photo-1483058712412-4245e9b90334?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60'); background-repeat: no-repeat; background-size: cover; background-position: center center;" class="position-relative">
    {{ Html::navbar_default() }}


    <div class="position-absolute w-100 text-center text-white" style="top: 45%;">
        <h1>{{ trans('front/pages/contact.title') }}</h1>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <h2>Contact Information</h2><br>
        <div class="row">
            <div class="col">
                <p>adresse</p>
            </div>
            <div class="col">
                <p>telephone</p>
            </div>
            <div class="col">
                <p>email</p>
            </div>
            <div class="col">
                <p>website</p>
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

        <div class="row justify-content-around py-5">
            <div class="col-10 col-md-6">
                
                {!! Form::open(['url' => 'contact']) !!}
                
                    {!! Form::control('text', $errors, 'name', ['class' => 'form-control rounded', 'placeholder' => 'Votre nom', 'required' =>'required']) !!}

                    {!! Form::control('text', $errors, 'email', ['class' => 'form-control rounded', 'placeholder' => 'Votre email', 'required'=> 'required']) !!}

                    {!! Form::control('text', $errors, 'subject', ['class' => 'form-control rounded', 'placeholder' => 'Sujet de votre message', 'required'=> 'required']) !!}

                    {!! Form::control('textarea', $errors, 'content', ['class' => 'form-control rounded-soft', 'placeholder' => 'Votre message', 'required'=> 'required']) !!}

                    {!! Form::button_submit('Envoyer !') !!}

                {!! Form::close() !!}

            </div>
            <div class="col-10 col-md-6">
                <map>for map</map>
            </div>
        </div>
    </div>

    {{ Html::navbar_fixed() }}
</section>
@endsection



@section('scripts')
<script type="text/javascript">
    $(function() {
        // Navbar active links
        $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(3)').addClass('active');
        $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(3)').addClass('active');
    });
</script>
@endsection
