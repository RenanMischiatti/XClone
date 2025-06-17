<section id="menu">
    <nav class="h-100">
        <span id="logo">
            <a href="{{route('index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-twitter-x" viewBox="0 0 16 16">
                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                </svg>
            </a>
        </span>
        <span>
            <a href="{{route('index')}}" data-auth="{{auth()->check() ? 1 : 0}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                </svg>
                Home
            </a>
        </span>
        <span>
            <a href="" data-auth="{{auth()->check() ? 1 : 0}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
                Explore
            </a>
        </span>
        <span>
            <a class="navLink" href="" data-auth="{{auth()->check() ? 1 : 0}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-bell" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                </svg>
                Notifications
            </a>
        </span>
        <span>
            <a class="navLink" href="" data-auth="{{auth()->check() ? 1 : 0}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                </svg>
                Messages
            </a>
        </span>
        <span>
            <a class="navLink" href="" data-auth="{{auth()->check() ? 1 : 0}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
                {{auth()->check() ? "Profile" : "Sign in"}}
            </a>
        </span>
        @auth
            <span>
                <a class="navLink" href="{{route('logout')}}" data-auth="{{auth()->check() ? 1 : 0}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                        <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/>
                    </svg>
                    Logout
                </a>
            </span>
        @endauth
        
        <button class="btn btn-primary mt-4" id="createPostBtn">
            Post 
        </button>

        @auth  
            <div class="mt-auto mb-4 d-flex align-items-center" style="padding: 15px">
                @if(auth()->user()->icon)
                    <img src="{{ asset('storage/' . auth()->user()->icon) }}" alt="User Icon" class="icon-class">
                @else 
                    <div class="user-icon-placeholder">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
                <div class="ms-3 d-flex flex-column">
                    <div class="bold">{{ auth()->user()->name }}</div>
                    <div class="text-muted" style="font-size: 14px">{{ "@" . auth()->user()->username }}</div>
                </div>
            </div>
        @endauth
    
  
        
    </nav>
</section>

@include('components.modalSignIn')

@push('styles')
    <link href="{{asset('css/menu.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{asset('js/menu.js')}}"></script>
@endpush