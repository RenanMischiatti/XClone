<!-- resources/views/home.blade.php -->
@extends('app')

@section('sectionMid')
    <div class="d-flex flex-column">
        <div class="d-flex p-3 align-items-center">
            <a href="{{ $urlPrevious }}" class="btn-action btn-back me-4">    
                <svg xmlns="http://www.w3.org/2000/svg"  width="28" height="28" fill="white" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                </svg>
                <div class="bg-hover"></div>
            </a>
            <strong class="post-label">
                Post
            </strong>
        </div>

        <div class="post px-2 d-flex flex-column" id="mainPost">
            @php($user = $post->user)
            <section class="px-3 d-flex flex-column w-100 pb-2">
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
                <x-actions-post :post="$post"/>
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
        <hr class="m-0">
        <section id="comments" data-route-get-post="{{ route('comments.getThread', [$post->id]) }}">
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
