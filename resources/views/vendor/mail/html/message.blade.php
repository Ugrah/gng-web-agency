@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img style="max-width:50%" src="img/gng-logo-width-2.png" width="200" alt="Logo GnG Dev" />
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
        <span style="font-size:1.4em">Retrouvez-nous sur</span><br><br>
        <a style="max-width:40px; display:inline-block" href="https://www.facebook.com/GnG-Dev-Agence-420818978521192/" rel="external" target="_blank">![Facebook Logo](img/icons/facebook-logo-2.png)</a>
        <a style="max-width:40px; display:inline-block" href="https://twitter.com/DevGng" rel="external" target="_blank">![Twitter Logo](img/icons/twitter-logo-2.png)</a>
        <a style="max-width:40px; display:inline-block" href="https://www.instagram.com/gngdevinsta/" rel="external" target="_blank">![Instagram Logo](img/icons/instagram-logo-2.png)</a>
        <br><br>
        © {{ date('Y') }} {{ config('infos.name') }}. @lang('All rights reserved.')

        @endcomponent
    @endslot
@endcomponent
