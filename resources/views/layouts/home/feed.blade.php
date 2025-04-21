<section class="h-100" id="feed">
    <div class="radio-inputs border-bottom-default">
        <label class="radio">
            <input type="radio" name="radio" checked="">
            <span class="name"><span>For You</span></span>
        </label>

        <label class="radio">
            <input type="radio" name="radio">
            <span class="name"><span>Following</span></span>
        </label>
    </div>

    @auth
        <section id="area-post" class="w-100 d-flex flex-column px-4 py-3">
            <form action="{{route('post.store')}}" id="send-post" method="POST" class="d-flex align-items-start w-100">
                @csrf
            
                @if(auth()->user()->icon)
                    <img src="{{ asset('storage/' . auth()->user()->icon) }}" alt="User Icon" class="icon-class">
                @else 
                    <div class="user-icon-placeholder">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
                <div class="w-100 p-2">
                    <textarea class="" name="content" placeholder="What's happening?" id="input-post"  rows="2"></textarea>
                    <hr>

                    <div id="buttons" class="w-100 d-flex justify-content-end">
                        <button disabled class="btn btn-primary px-5 py-2" id="postBtn">
                            Post
                        </button>
                    </div>
                </div>
            </form>

        </section>
        <hr class="mt-0">
    @endauth

    <main id="posts" data-getPostRoute="{{route('post.getPost')}}">

        
    </main>
</section>


@push('styles')
    <link href="{{asset('css/feed.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{asset('js/feed.js')}}"></script>
@endpush