@extends('layouts.auth')

@section('styles')
    <style>
        .bg {
            background-image: url('https://images.unsplash.com/photo-1546146830-2cca9512c68e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1400&q=80');
            background-position: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid vh-100 bg-primary">
    <div class="row justify-content-center vh-100">
        <div class="col-md-9 my-auto">
            <div class="card mx-5 mx-md-0">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col bg d-none d-md-block">
                        </div>
                        <div class="col p-4">
                            <h2 class="text-center pb-3">{{ __('Register') }}</h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10">
                                        <input id="name" type="text" class="form-control rounded @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">

                                    <div class="col-md-10">
                                        <input id="email" type="email" class="form-control rounded @error('email') is-invalid @enderror" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">

                                    <div class="col-md-10">
                                        <input id="password" type="password" class="form-control rounded @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">

                                    <div class="col-md-10">
                                        <input id="password-confirm" type="password" class="form-control rounded" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center text-center mb-0">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary btn-block rounded">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
