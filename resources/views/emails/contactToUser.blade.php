@extends('layouts.email')

@section('styles')

@endsection

@section('content')

<section>
    <div>
        <p>{{ trans('front/emails/contactToUser.hello') }} @if(isset($name)) {{ $name }} @endif<br>
        {{ trans('front/emails/contactToUser.content') }}</p>
        <br>
        <p>{{ trans('front/emails/contactToUser.visite_our_site') }}</p>
        <p style="text-align: center"><a class="btn-custom-gradient rounded" href="{{url('/')}}" target="_blank">{{ trans('front/emails/contactToUser.link') }}</a></p>
    </div>
</section>

@endsection
