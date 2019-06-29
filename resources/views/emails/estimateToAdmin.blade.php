@extends('layouts.email')

@section('styles')

@endsection

@section('content')

<section>
    <div>
        {!! trans('emails/estimateToAdmin.content', ['amount' => number_format($estimatedPrice->amount, 2, $decimalSeparator, $numberSeparator), 'devise' => $estimatedPrice->devise]) !!}
        <p style="text-align: center"><a class="btn-custom-gradient rounded" href="{{url('/dashboard')}}" target="_blank">{{ trans('emails/estimateToAdmin.button') }}</a></p>
    </div>
</section>

@endsection
