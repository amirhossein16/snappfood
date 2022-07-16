<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- BEGIN: CSS Assets-->
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="dist/css/app.css"/>
    <!-- END: CSS Assets-->

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<!-- END: Head -->

<body class="login">
<div class="container sm:px-10">
    {{ $slot }}

    <!-- BEGIN: Dark Mode Switcher-->
    <div data-url="login-dark-login.html"
         class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 left-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 ml-10 ">
        <div class="ml-4 text-gray-700 dark:text-gray-300 ">حالت تیره</div>
        <div class="dark-mode-switcher__toggle border "></div>
    </div>
    <!-- END: Dark Mode Switcher-->
</div>

<!-- BEGIN: JS Assets-->
<script src="dist/js/app.js "></script>
<!-- END: JS Assets-->
</body>
</html>
