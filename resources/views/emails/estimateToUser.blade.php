@component('mail::message')

@lang('emails/estimateToUser.content.p_1')
@lang('emails/estimateToUser.content.p_2', ['amount' => number_format($estimatedPrice->amount, 2, $decimalSeparator, $numberSeparator), 'devise' => $estimatedPrice->devise])
@lang('emails/estimateToUser.content.p_3')

@lang('emails/estimateToUser.visite_our_site')
@component('mail::button', ['url' => url('/')])
    @lang('emails/estimateToUser.link')
@endcomponent

@endcomponent