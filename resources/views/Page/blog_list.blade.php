@foreach ($posts as $post)
<div class="roomListRoom">
    <div class="roomListRoom__header">
        <a href="#" class="roomListRoom__author">
            <div class="avatar avatar--small">
                <img src="{{ asset('images/avatar.svg') }}" />
            </div>
            <span>@ {{ $post->user->name }}</span>
        </a>
        <div class="roomListRoom__actions">
            <span> {{ Carbon\Carbon::parse($post->created_at)->ago(); }}</span>
        </div>
    </div>
    <div class="roomListRoom__content">
        <a href="/home/post/{{ $post->id }}/details">{{ $post->title }}</a>
    </div>
    <div>
        <img src="{{ asset('storage/app/'.$post->image) }}" alt="Image">
    </div>
    <div class="roomListRoom__meta">
        <a href="#" class="roomListRoom__joined">
            
            @foreach ( json_decode($post->tag_id) as $tag_id )
                @php
                    $tag = App\Models\Tag::findOrfail($tag_id);
                @endphp
                <p class="tags-css"> {{ ($tag)->name }} </p>
                
            @endforeach
        </a>
        <p class="roomListRoom__topic"> {{ $post->category->name }} </p>
       
       
    </div>
    <div class="roomListRoom__meta"> 
        @if ($current_user == $post->user_id)
            <a style="float:right; background-color:red; color:black !important; margin-right:1em;" href="/home" class="btn action-button-two"> Delete </a>
            <a style="float:right; background-color:yellow; color:black !important; margin-right:1em;" href="/post/{{ $post->id }}/edit" class="btn action-button-two"> Edit </a>
        @endif
    </div>
</div>
@endforeach
