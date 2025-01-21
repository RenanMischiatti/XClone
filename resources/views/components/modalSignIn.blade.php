<!-- Modal Sign In -->
<div class="modal fade" id="modalSignIn" tabindex="-1" aria-labelledby="modalSignInLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
       
        <div id="divSignIn">
            <h5 class="text-center my-1">Login</h5>
            <form class="form" method="POST" action="{{route('login')}}">
                @csrf
                <div class="input-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="">
                </div>
                <div class="input-group mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="">
                    <div class="forgot">
                        <a rel="noopener noreferrer" href="#">Forgot Password ?</a>
                    </div>
                </div>
                <button class="sign text-white btn btn-primary">Sign In</button>
            </form>
            <p class="signup mt-3">Don't have an account?
                <a rel="noopener noreferrer" href="#" id="changeSignUp" class="">Sign Up</a>
            </p>
        </div>

        <div id="divSignUp" style="display: none;">
            <h5 class="text-center my-1">Register</h5>
            <form class="form" method="POST" action="{{route('register')}}">
                @csrf
                <div class="input-group mb-3">
                    <label for="fullName">Full Name</label>
                    <input type="text" name="fullName" id="fullName" placeholder="">
                </div>

                <div class="input-group mb-3">
                    <label for="usernameSignUp">Username</label>
                    <input type="text" name="username" id="usernameSignUp" placeholder="">
                </div>
                <div class="input-group mb-4">
                    <label for="passwordSignUp">Password</label>
                    <input type="password" name="password" id="passwordSignUp" placeholder="">
                    <div class="forgot">
                        <a rel="noopener noreferrer" href="#">Forgot Password ?</a>
                    </div>
                </div>
                <button class="sign text-white btn btn-primary" type="submit">Sign Up</button>
            </form>
            <p class="signup mt-3">Already have an account?
                <a rel="noopener noreferrer" href="#" id="changeSignIn" class="">Sign In</a>
            </p>
        </div>

    </div>
    </div>
</div>
</div>


@push('styles')
    <link href="{{asset('css/moodalSignIn.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{asset('js/modalSignIn.js')}}"></script>
@endpush