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
        <section id="area-post" class="w-100 d-flex">
            <div>
                @if(auth()->user()->icon)
                    <img src="{{ asset('storage/' . auth()->user()->icon) }}" alt="User Icon" class="icon-class">
                @else 
                    <div class="user-icon-placeholder">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
            </div>
            <div>

            </div>

        </section>
    @endauth


</section>


@push('styles')
    <link href="{{asset('css/feed.css')}}" rel="stylesheet">
@endpush