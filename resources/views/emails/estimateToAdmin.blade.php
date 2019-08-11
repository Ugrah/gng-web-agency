@component('mail::message')

@lang('emails/estimateToAdmin.content', ['amount' => number_format($estimatedPrice->amount, 2, $decimalSeparator, $numberSeparator), 'devise' => $estimatedPrice->devise])

@lang('emails/contactToAdmin.go_to_admin_space')
@component('mail::button', ['url' => url('/dashboard')])
    @lang('emails/estimateToAdmin.button')
@endcomponent

@endcomponent