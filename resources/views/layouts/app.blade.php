<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- BEGIN: CSS Assets-->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="/dist/css/app.css"/>
    @livewireStyles
    <!-- END: CSS Assets-->
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />--}}
    {{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />--}}
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />--}}
    {{--    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />--}}
    {{--    <script src="https://cdn.tailwindcss.com"></script>--}}
    {{--    <script>--}}
    {{--        tailwind.config = {--}}
    {{--            theme: {--}}
    {{--                extend: {--}}
    {{--                    fontFamily: {--}}
    {{--                        sans: ['Inter', 'sans-serif'],--}}
    {{--                    },--}}
    {{--                }--}}
    {{--            }--}}
    {{--        }--}}
    {{--    </script>--}}
    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet'/>
</head>
<!-- END: Head -->
<body class="main">
{{--<x-jet-banner/>--}}

@livewire('navigation-menu')

<!-- Page Content -->
<main>
    {{ $slot }}
</main>

@stack('modals')
@livewireScripts
<!-- BEGIN: JS Assets-->
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
<script src="/dist/js/app.js"></script>
<!-- END: JS Assets-->
{{--<script src="https://api.mapbox.com/geocoding/v5/mapbox.places/Los%20Angeles.json?access_token=pk.eyJ1IjoidmloZXQiLCJhIjoiY2w1M3Y4djVtMDdoZzNlcGIzbWFleXo2MCJ9.VnxA8zfJdeYV8abHiWQ2wQ--}}
{{--" type="text/javascript"></script>--}}
{{--<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>--}}
{{--<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>--}}
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('alert', ({detail: {type, message}}) => {
        Toast.fire({
            icon: type,
            title: message
        })
    })
</script>
</body>
</html>
