@component('mail::message')

@lang('emails/contactToUser.hello') @if(isset($name)) {{ $name }} @endif @lang('emails/contactToUser.content')


@lang('emails/contactToUser.visite_our_site')
@component('mail::button', ['url' => url('/')])
    @lang('emails/contactToUser.link')
@endcomponent

@endcomponent
