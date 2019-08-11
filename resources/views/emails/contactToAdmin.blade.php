@component('mail::message')

# Notifications d'utilisateur

@lang('emails/contactToAdmin.hello')
    
    @if(isset($name))
        * @lang('emails/contactToAdmin.name', ['name' => $name])
    @endif

    @if(isset($email))
        * @lang('emails/contactToAdmin.email', ['email' => $email])
    @endif

    @if(isset($phone_number))
        * @lang('emails/contactToAdmin.number_phone', ['number_phone' => $phone_number])
    @endif

    @if(isset($subject))
        * @lang('emails/contactToAdmin.subject', ['subject' => $subject])
    @endif

    @if(isset($content))
        * @lang('emails/contactToAdmin.message', ['message' => $content])
    @endif


@lang('emails/contactToAdmin.go_to_admin_space')
@component('mail::button', ['url' => url('/dashboard')])
Cliquez ici
@endcomponent

@endcomponent