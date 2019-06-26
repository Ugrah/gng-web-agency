@extends('layouts.email')

@section('styles')

@endsection

@section('content')

<section>
    <div>
        {!! trans('emails/estimateToAdmin.content', ['amount' => number_format($amount, 2, $decimalSeparator, $numberSeparator)]) !!}
        <p style="text-align: center"><a class="btn-custom-gradient rounded" href="{{url('/dashboard')}}" target="_blank">{{ trans('emails/estimateToAdmin.button') }}</a></p>
    </div>
</section>

@endsection
