<!-- Modal Respost -->
<form action="{{route('post.store.retweet')}}" method="POST" class="modal fade" id="modal-repost" tabindex="-1" aria-hidden="true" style="background: #5b708366">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background: #000000">
      <div class="modal-header d-flex justify-content-start border-0">
        <button type="button" class="btn-close m-0 p-0" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="d-flex w-100">
              <input type="hidden" name="repost" value="1">
              @csrf
          
              @if(auth()->user()->icon)
                  <img src="{{ asset('storage/' . auth()->user()->icon) }}" alt="User Icon" class="icon-class">
              @else 
                  <div class="user-icon-placeholder">
                      {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                  </div>
              @endif
              <div class="w-100 p-2">
                  <textarea class="" name="content" placeholder="Add a comment" id="input-post"  rows="2"></textarea>

              </div>
          </div>

          <div class="ps-5">
            <div class="content">
              
              
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-light">Post</button>
      </div>
    </div>
  </div>
</form>