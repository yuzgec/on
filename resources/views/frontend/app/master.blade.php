<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/xhtml">

<head>
    {!! SEO::generate() !!}
    @include('frontend.app.css')
    @yield('customCSS')
</head>

<body class="c-dot hover-cursor">

    @include('frontend.app.header')

    @yield('content')

    @include('frontend.app.footer')

    @include('frontend.app.js')
    @yield('customJS')


</body>
</html>
