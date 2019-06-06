<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=ABeeZee|Lato|PT+Sans|Roboto|Roboto+Condensed" rel="stylesheet">

    <!-- Styles -->
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


    <style type="text/css" rel="stylesheet">
        body { width: 100%; font-family: 'ABeeZee', 'Roboto', 'Lato', 'Roboto Condensed', 'PT Sans', sans-serif; line-height: 1.6; }
        section div { padding: 2em; width: 60%; margin-left: auto; margin-right: auto; }
        p { font-family: sans-serif; font-weight: 100; }
        a { text-decoration: none; }
        .text-center{ text-align: center; }
        .text-light { color: white; }
        .social-icon { margin: 0 0.5em; }

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
            <h4 class="text-center">Retrouvez-nous sur</h4>

            <a class="social-icon" href="#"><img src="{{asset('img/icons/facebook-logo.png')}}" width="50" /></a>
            <a class="social-icon" href="#"><img src="{{asset('img/icons/instagram-logo.png')}}" width="50" /></a>
            <a class="social-icon" href="#"><img src="{{asset('img/icons/twitter-logo.png')}}" width="50" /></a>
            
            <p style="font-size: 0.8rem">Si vous avez une question ou souhaitez simplement nous dire bonjour, n'hésitez pas à répondre directement à cet email</p>
            <p style="font-size: 0.8rem">Pour plus d’informations sur la gestion de vos données et vos droits, consultez notre <a href="{{url('privacy-policy')}}" target="_blank"> politique de confidentialité</a>.</p>
        </div>
    </section>
</body>

</html>
