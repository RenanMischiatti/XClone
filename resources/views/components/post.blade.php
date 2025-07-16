@props(['post'])

@php
    $user = $post->user;
@endphp

<div class="post px-4 pt-3 pb-2 d-flex" onclick="openThread('{{ route('show.post', [$post->id]) }}')">
    
    <section class="area-icon">
            @if($user->icon)
                <img src="{{ asset('storage/' . $user->icon) }}" alt="User Icon" class="icon-class">
            @else 
                <div class="user-icon-placeholder">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
    </section>
    <section class="ps-3 d-flex flex-column w-100">
        <div class="d-flex w-100 align-items-center">
            <strong class="name">{{$user->name}}</strong>
            <span class="username text-muted ms-2">{{"@" . $user->username}}</span>
            <div class="time"><strong class="mx-2">·</strong>{{$post->time_ago }}</div>
        </div>

        <main class="content">
            {{$post->content}}
        </main>

        @if ($post->reply_id)
            
            <section class="post-reply">
                {{-- post-reply.blade.php --}}
                <x-post :post="$post->reply_post" :reply="true" />
            </section>
        @endif

        <x-actions-post :post="$post"/>
    </section>
</div>
<hr class="m-0">