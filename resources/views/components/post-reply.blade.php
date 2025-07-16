@php
    $user = $post->user;
@endphp

<div class="d-flex flex-column w-100">
    <header class="d-flex w-100 align-items-center">
        <div class="me-2">
            @if($user->icon)
                <img src="{{ asset('storage/' . $user->icon) }}" alt="User Icon" class="icon-class">
            @else 
                <div class="user-icon-placeholder">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
        </div>
        <strong class="name">{{$user->name}}</strong>
        <span class="username text-muted ms-2">{{"@" . $user->username}}</span>
        <div class="time"><strong class="mx-2">·</strong>{{$post->time_ago }}</div>
    </header>

    <main class="content mt-1">
        {{$post->content}}
    </main>

</div>