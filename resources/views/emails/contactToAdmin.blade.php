@extends('layouts.email')

@section('styles')

@endsection

@section('content')

<section>
    <div>
        {!! trans('emails/contactToAdmin.hello') !!}
        <ul>
            @if(isset($name))
                {!! trans('emails/contactToAdmin.name', ['name' => $name]) !!}
            @endif

            @if(isset($email))
                {!! trans('emails/contactToAdmin.email', ['email' => $email]) !!}
            @endif

            @if(isset($phone_number))
                {!! trans('emails/contactToAdmin.number_phone', ['number_phone' => $phone_number]) !!}
            @endif

            @if(isset($subject))
                {!! trans('emails/contactToAdmin.subject', ['subject' => $subject]) !!}
            @endif

            @if(isset($content))
                {!! trans('emails/contactToAdmin.message', ['message' => $content]) !!}
            @endif
        </ul>
    </div>
</section>

@endsection
