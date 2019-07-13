@extends('layouts.email')

@section('content')

<section>
    <div>
        <p>{{ trans('emails/contactToUser.hello') }} @if(isset($name)) {{ $name }} @endif<br>
        {{ trans('emails/contactToUser.content') }}</p>
        <br>
        <p>{{ trans('emails/contactToUser.visite_our_site') }}</p>
        <p style="text-align: center"><a class="btn-custom-gradient rounded" href="{{url('/contact')}}" target="_blank">{{ trans('emails/contactToUser.link') }}</a></p>
    </div>
</section>

@endsection
