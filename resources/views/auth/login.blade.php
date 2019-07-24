@extends('layouts.auth')

@section('styles')
    <style>
        .bg {
            background-image: url('https://images.unsplash.com/photo-1496171367470-9ed9a91ea931?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80');
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
                            <h2 class="text-center pb-3">{{ __('Welcome back !') }}</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row justify-content-center">

                                    <div class="col-md-10">
                                        <input id="identity" type="text" class="form-control rounded @error('identity') is-invalid @enderror" name="identity" value="{{ old('identity') }}" placeholder="{{ __('E-Mail Address or Username') }}" required autocomplete="identity" autofocus>

                                        @error('identity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">

                                    <div class="col-md-10">
                                        <input id="password" type="password" class="form-control rounded @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center text-center mb-0">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary btn-block rounded">
                                            {{ __('Login') }}
                                        </button>

                                        <hr>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
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
