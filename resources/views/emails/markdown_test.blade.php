@component('mail::message')
# Introduction

The body of your message.
![example](./img/gng-logo-width.png)
<img width="200" alt="portfolio_view" src="{{ asset('img/gng-logo-width.png') }}">
<a href="http://google.com.au/" rel="some text">![Foo](http://www.google.com.au/images/nav_logo7.png)</a>

![alt text][logo]
[logo]: https://github.com/adam-p/markdown-here/raw/master/src/common/images/icon48.png "Logo Title Text 2"


@component('mail::button', ['url' => url('/')])
Cliquez ici
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent
