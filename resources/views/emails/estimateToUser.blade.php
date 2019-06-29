@extends('layouts.email')

@section('content')

<section>
    <div>
        <p>{{ trans('front/emails/estimateToUser.content.p_1') }}</p>
        <p>{!! trans('front/emails/estimateToUser.content.p_2', [ 'amount' => $amount, 'devise' => $devise ]) !!}</p>
        <br>
        <p>{{ trans('front/emails/estimateToUser.content.p_3') }}</p>
        <br>
        <p style="text-align: center"><a class="btn-custom-gradient rounded" href="{{url('/')}}" target="_blank">{{ trans('front/emails/estimateToUser.link') }}</a></p>
    </div>
</section>

@endsection
