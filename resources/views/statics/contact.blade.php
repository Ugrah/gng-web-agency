@extends('layouts.app')

@section('content')
<div style="height: 70vh; background-image: linear-gradient(to right top, rgba(232, 123, 192, 0.9), rgba(225, 109, 203, 0.9), rgba(211, 98, 218, 0.9), rgba(190, 91, 234, 0.9), rgba(158, 89, 253, 0.9)), url('https://images.unsplash.com/photo-1483058712412-4245e9b90334?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60'); background-repeat: no-repeat; background-size: cover; background-position: center center;" class="position-relative">
    @include('blocs.navbar2')

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
                <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Votre nom', 'required' =>'required']) !!}
                    {!! $errors->first('name', '<small class="help-block text-danger">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email', 'required'=> 'email']) !!}
                    {!! $errors->first('email', '<small class="help-block text-danger">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('subject') ? 'has-error' : '' !!}">
                    {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Sujet de votre message', 'required'=> 'required']) !!}
                    {!! $errors->first('subject', '<small class="help-block text-danger">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('text') ? 'has-error' : '' !!}">
                    {!! Form::textarea ('text', null, ['class' => 'form-control', 'placeholder' => 'Votre message', 'required'=> 'required']) !!}
                    {!! $errors->first('text', '<small class="help-block text-danger">:message</small>') !!}
                </div>
                {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-10 col-md-6">
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
        $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(3)').addClass('active');
        $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(3)').addClass('active');
    });
</script>
@endsection
