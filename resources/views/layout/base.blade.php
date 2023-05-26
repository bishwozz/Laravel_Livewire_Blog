<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />


    <!-- Styles -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">

    <title>Laravel Blog</title>
    @livewireStyles
</head>

<body>
    @include('Page.flash-message')
    <header>
        @include('layout.navbar')
    </header>

    <div id="main">
        {{ $slot }}
    </div>

     <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
        <script src="{{ asset('js/script.js') }}"></script>
    @livewireScripts

</body>

</html>