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
        <div class="container">
        
            <div class="roomListRoom" style="margin:8em;">
                <div>
                     <a href="/home" class="btn action-button-two"> Back </a>
                 </div>
                 <br>
                <div class="post-detail-image">
                    <img src="" alt="Image"/>
                </div>
                <div class="post-detail-title">
                    <h1 style="font-size:26px;"> {{ $postDetails->title }} </h1>
                </div>
                <br>
                <div class="post-detail-content">
                    <p> {{ $postDetails->content }} </p>
                </div>
                <br>
                <hr>
                
                <div class="post-detail-category">
                    <h2> {{ $postDetails->category->name }} : </h2>
                    <h3 style="float:right">{{ Carbon\Carbon::parse($postDetails->created_at)->ago(); }}</h3>
                    @foreach ( json_decode($postDetails->tag_id) as $tag_id )
                        @php
                            $tag = App\Models\Tag::findOrfail($tag_id);
                        @endphp
                        <span class="tags-css"> {{ ($tag)->name }} </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

     <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
        <script src="{{ asset('js/script.js') }}"></script>
    @livewireScripts
</body>

</html>