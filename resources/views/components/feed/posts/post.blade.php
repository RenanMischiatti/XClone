<!-- resources/views/home.blade.php -->
@extends('app')

@section('sectionMid')
    <div class="d-flex flex-column">
        <div class="d-flex p-3 align-items-center">
            <a href="{{ route('index') }}" class="btn-action btn-back me-4">    
                <svg xmlns="http://www.w3.org/2000/svg"  width="28" height="28" fill="white" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                </svg>
                <div class="bg-hover"></div>
            </a>
            <strong class="post-label">
                Post
            </strong>
        </div>

        <div class="post px-2 d-flex flex-column">
            @php($user = $post->user)
            <section class="px-3 d-flex flex-column w-100">
                <div class="w-100 d-flex mb-2">
                    <div class="me-2">
                        @if($user->icon)
                            <img src="{{ asset('storage/' . $user->icon) }}" alt="User Icon" class="icon-class">
                        @else 
                            <div class="user-icon-placeholder">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>

                    <div class="d-flex flex-column ">
                        <strong class="name">{{$user->name}}</strong>
                        <span class="username text-muted">{{"@" . $user->username}}</span>
                    </div>
                </div>

                <main id="content" class="mb-3">
                    {{$post->content}}
                </main>

                <div class="time">{{$post->TwitterFormatted }}</div>
                <hr>
                <section class="d-flex align-items-center justify-content-between w-50 px-2" id="actions">
                    <span class="btn-action comment" onclick="openThread('{{ route('show.post', [$post->id]) }}')">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9l.3-.5z"/></svg>
                        <div class="bg-hover"></div>
                    </span>
                    <span class="btn-action repost" onclick="event.stopPropagation()">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 224c0 17.7 14.3 32 32 32s32-14.3 32-32c0-53 43-96 96-96l160 0 0 32c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l64-64c12.5-12.5 12.5-32.8 0-45.3l-64-64c-9.2-9.2-22.9-11.9-34.9-6.9S320 19.1 320 32l0 32L160 64C71.6 64 0 135.6 0 224zm512 64c0-17.7-14.3-32-32-32s-32 14.3-32 32c0 53-43 96-96 96l-160 0 0-32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9l-64 64c-12.5 12.5-12.5 32.8 0 45.3l64 64c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6l0-32 160 0c88.4 0 160-71.6 160-160z"/></svg>
                        <div class="bg-hover"></div>
                    </span>
                    <span class="btn-action like" onclick="event.stopPropagation()">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>
                        <div class="bg-hover"></div>
                    </span>
                </section>
                <hr>
                @auth
                    <form action="{{route('post.store.comment', [$post->id])}}" id="send-post" method="POST" class="d-flex align-items-start w-100">
                        @csrf
                    
                        @if(auth()->user()->icon)
                            <img src="{{ asset('storage/' . auth()->user()->icon) }}" alt="User Icon" class="icon-class">
                        @else 
                            <div class="user-icon-placeholder">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <div class="w-100 d-flex  align-items-center ps-2">
                            <textarea class="w-100 mb-3" name="content" placeholder="What's happening?" id="input-post"  rows="3"></textarea>
                            
        
                            <div id="buttons" class="w-100 d-flex justify-content-end">
                                <button disabled class="btn btn-primary px-5 py-2" id="postBtn">
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                @endauth
            </section>

        </div>
        <hr>
        <section id="comments" data-route-get-post="{{ route('comments.getComments', [$post->id]) }}">
            @include('components.feed.posts.comments.comments', ['comments' => $post->comments])
        </section>
    </div>
    

@endsection

@push('styles')
    <link href="{{ asset('css/feed.css') }}" rel="stylesheet">
    <link href="{{ asset('css/post.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('js/feed.js') }}"></script>
    <script src="{{ asset('js/post.js') }}"></script>
@endpush
