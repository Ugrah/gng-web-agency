@extends('layouts.app')

@section('content')
<div style="height: 60vh; background-image: linear-gradient(to right top, #e87bc0, #e16dcb, #d362da, #be5bea, #9e59fd);" class="position-relative">

    @include('blocs.navbar2')

</div>

<section class="py-5">
    <div class="container">
        <h2 class="text-dark">Contact Information</h2><br>
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

        </div><br>

        @if(!empty($ok))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                 {{ $ok }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row py-5">
            <div class="col">
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
            <div class="col"> for map</map></div>
        </div>
    </div>
</section>
@endsection



@section('scripts')
<script type="text/javascript">
    $(function() {
        // Navbar active links
        $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(2)').addClass('active');
        $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(2)').addClass('active');
    });
</script>
@endsection
