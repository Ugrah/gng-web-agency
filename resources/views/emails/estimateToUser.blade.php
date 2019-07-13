@extends('layouts.email')

@section('content')

<section>
    <div>
        <p>{{ trans('emails/estimateToUser.content.p_1') }}</p>
        <p>{!! trans('emails/estimateToUser.content.p_2', ['amount' => number_format($estimatedPrice->amount, 2, $decimalSeparator, $numberSeparator), 'devise' => $estimatedPrice->devise]) !!}</p>
        <br>
        <p>{{ trans('emails/estimateToUser.content.p_3') }}</p>
        <br>
        <p style="text-align: center"><a class="btn-custom-gradient rounded" href="{{url('/contact')}}" target="_blank">{{ trans('emails/estimateToUser.link') }}</a></p>
    </div>
</section>

@endsection
