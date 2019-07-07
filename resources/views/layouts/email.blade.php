<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=ABeeZee|Lato|PT+Sans|Roboto|Roboto+Condensed" rel="stylesheet">

    <!-- Styles | Reset css -->
    <style type="text/css" rel="stylesheet">
        /* http://meyerweb.com/eric/tools/css/reset/ v2.0 | 20110126
        License: none (public domain)
        */
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed, 
        figure, figcaption, footer, header, hgroup, 
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
        /* HTML5 display-role reset for older browsers */
        article, aside, details, figcaption, figure, 
        footer, header, hgroup, menu, nav, section {
            display: block;
        }
        body {
            line-height: 1;
        }
        ol, ul {
            list-style: none;
        }
        blockquote, q {
            quotes: none;
        }
        blockquote:before, blockquote:after,
        q:before, q:after {
            content: '';
            content: none;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
    </style>

    <!-- Styles | Global -->
    <style type="text/css" rel="stylesheet">
        body { width: 100%; font-family: 'ABeeZee', 'Roboto', 'Lato', 'Roboto Condensed', 'PT Sans', sans-serif; line-height: 1.6; }
        section div { padding: 2em; width: 60%; margin-left: auto; margin-right: auto; }
        p, ul li span { font-family: sans-serif; font-weight: 100; }
        a { text-decoration: none; }
        .text-center{ text-align: center; }
        .text-light { color: white; }
        .social-icon { margin: 0 0.5em; }
        .rounded { border-radius: 99px !important; }
        span.bold{ font-weight: bold; }

        .btn-custom-gradient {
            color: white;
            border: 1px solid;
            border-image: linear-gradient(to right top, #1ee6bf, #36e7ac, #4fe798, #67e681, #7fe569);
            background-image: linear-gradient(to right top, #1ee6bf, #36e7ac, #4fe798, #67e681, #7fe569);
        }

        .btn-custom-gradient:hover {
            border: 1px solid;
            border-image: linear-gradient(to right top, #56c7fb, #3eb7fc, #38a5fc, #4892f7, #617ced);
            color: #fff;
            background-image: linear-gradient(to right top, #56c7fb, #3eb7fc, #38a5fc, #4892f7, #617ced);
                color: #fff;
        }

        a.btn-custom-gradient {
            display: inline-block;
            padding: 5px 20px;
        }

        /*
        * Tablet and Mobile device 
        */
        @media only screen and (max-width: 992px) {
            section div { width: 90%; margin-left: auto; margin-right: auto; }
        }
    </style>

    <title>GnG Mail</title>

    @yield('styles')
</head>

<body>
    <!-- Header -->
    <section>
        <div style="background-image: linear-gradient(to right top, #e87bc0, #e16dcb, #d362da, #be5bea, #9e59fd);">
            <a href="{{url('/')}}" target="_blank">
                <h2 class="text-light" style="font-size: 1.6em; font-weight: Boldest;">GnG Web Agency</h2>
            </a>
        </div>
    </section>

    @yield('content')

    <!-- Footer -->
    <section>
        <div class="text-center" style="background-color: #f2f2f2">
            <h4 class="text-center">{{ trans('emails/layout.footer.title') }}</h4>

            <a class="social-icon" href="https://www.facebook.com/GnG-Dev-Agence-420818978521192/"><img src="{{asset('img/icons/facebook-logo.png')}}" width="50" /></a>
            <a class="social-icon" href="#"><img src="{{asset('img/icons/instagram-logo.png')}}" width="50" /></a>
            <a class="social-icon" href="#"><img src="{{asset('img/icons/twitter-logo.png')}}" width="50" /></a>
            
            {!! trans('emails/layout.footer.content', ['url' => url('privacy-policy')]) !!}
        </div>
    </section>
</body>

</html>
