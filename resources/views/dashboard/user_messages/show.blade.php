@extends('layouts.admin')

@section('content')

  <div class="container-fluid p-4">
    <!-- Page notification -->
    @if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! session('ok') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Subject : {{ $message->subject }}</h1>
        <a id="submit-form" href="{{route('production.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> {{  __('Reply') }}</a>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-11 col-md-8 mb-4">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Message content') }}
                    </div>
                    <div class="card-body">
                        {{ $message->content }}
                    </div>
                </div>
            </div>
            <div class="col col-11 col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('User details') }}
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ __('User Name') }} <span class="float-right">{{ $message->name }}</span></li>
                            <li class="list-group-item">{{ __('e-Mail') }} <span class="float-right">{{ $message->email }}</span></li>
                            <li class="list-group-item">{{ __('Country') }} <span class="float-right">{{ $arr_ip->country }}</span></li>
                            <li class="list-group-item">{{ __('Ville') }} <span class="float-right">{{ $arr_ip->city }}</span></li>
                            <li class="list-group-item">{{ __('Phone Number') }} <span class="float-right">{{ $message->phone_number }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col mb-4">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Formulaire de réponse aministrateur') }}
                    </div>
                    <div class="card-body">
                        {!! Form::model($message, ['route' => ['user-message.reply', $message->id], 'id' => 'admin-reply-form', 'method' => 'post', 'class' => 'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('recipient') ? ' has-error' : '' }}">
                                <label for="recipient" class="control-label">Email</label>
                                <input id="recipient" type="email" class="form-control" name="recipient" value="{{ $message->email }}" readonly>

                                @if ($errors->has('recipient'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('recipient') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="message" class="control-label">Email</label>
                                <textarea id="message" class="form-control" name="message">{{ old('message') }}</textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        {!! Form::close() !!}                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    

  </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function() {
            // Aside active link
            //$('#mySidebar ul.navbar-nav > li.nav-item > a.nav-link:eq(1)').addClass('active');
        });
    </script>
@endsection