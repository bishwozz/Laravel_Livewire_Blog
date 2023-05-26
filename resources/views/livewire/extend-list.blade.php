@if (count($posts) > 0)
    @foreach ($posts as $post)
        <div class="roomListRoom">
            <div class="col-md-8 mb-2">

                @if($addPost)
                    @include('livewire.create')
                @endif
                @if($updatePost)
                    @include('livewire.update')
                @endif
            </div>
            @if(!$addPost && !$updatePost)
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
                    <a href="/post/{{ $post->id }}/details">{{ $post->title }}</a>
                </div>
                <div>
                @if($post->image)
                    <img src="{{ asset('storage/'.$post->image) }}" alt="Image" height="200px" style="object-fit: cover;">
                @else
                    <img src="{{ asset('images/noImage.png') }}" alt="Default Image" height="200px" style="object-fit: cover;">
                @endif
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
                        <a style="float:right; background-color:red; color:black !important; margin-right:1em;" wire:click="deletePost({{$post->id}})" class="btn action-button-two"> Delete </a>

                        <a style="float:right; background-color:yellow; color:black !important; margin-right:1em;" wire:click="editPost({{$post->id}})" class="btn action-button-two"> Edit </a>
                    @endif
                </div>
            @endif
        </div>
    @endforeach
@else
    <tr>
        <p style="text-align:center">
            No Posts Found.
        </p>
    </tr>
@endif
