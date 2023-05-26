<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
        @include('livewire.blog-post')
    </div>

     <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
        <script src="{{ asset('js/script.js') }}"></script>
    @livewireScripts
</body>

</html>