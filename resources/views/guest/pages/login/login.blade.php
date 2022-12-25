@include('guest.elements.head')
@section('title')
    <title>Login | BComputer</title>
@stop
<div class="khoa-login">
    <div class="container">
        <div class="row">
            <div class="login_nen">
                <div class="box_login">
                    <h1 class="text-center mb-4"><span class="logoB">B</span><span class="logoC">C</span>omputer</h1>
                     <form action="#" method="post" class="form_login">
                        <div class="form_group mb-1">
                            <input type="text" name="userName" placeholder="Email or Phone" class="input_control" autocomplete="on" />
                            <label for="userName" class="icon_user"><i class="fa-solid fa-user"></i></label>
                            <label  class="success_check"><i class="fa-solid fa-circle-check"></i></label>
                            <label class="error_check"><i class="fa-solid fa-circle-exclamation"></i></label>
                            <span class="errorMsg">User can be not blank!</span>
                        </div>
                        <div class="form_group mb-2">
                            <input type="password" name="password" placeholder="Password" class="input_control" autocomplete="on" />
                            <label for="password" class="icon_pass"><i class="fa-solid fa-lock"></i></label>
                            <label class="success_check"><i class="fa-solid fa-circle-check"></i></label>
                            <label class="error_check"><i class="fa-solid fa-circle-exclamation"></i></label>
                            <span class="errorMsg">Password can be not blank!</span>
                        </div>
                        <div class="check_box mb-3">
                            <div>
                                <input type="checkbox" name="remember"><label for="remember">Remember login.</label>
                            </div>
                            <div>
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btnLogin">SIGN IN</button>
                        </div>
                     </form>
                     <div>
                        <hr>
                        <p class="social_title">Sign in with Social</p>
                     </div>
                     
                    <div class="login_socical">
                        <a href="#" class="text-decoration-none text-dark">
                            <div class="social_facebook">
                                <img src="{{ asset('image/icon/002-facebook.png') }}" width="30" alt="">
                                <div>Facebook login</div>
                            </div>
                        </a>
                        <a href="#" class="text-decoration-none text-dark">
                            <div class="social_google">
                                <img src="{{ asset('image/icon/001-google.png') }}" width="30" alt="">
                                <div>Google login</div>
                            </div>
                        </a>
                        
                        
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('user/index') }}" class="back_home"><i class="fa-solid fa-chevron-left"></i> Back to home
                        </a>
                        <a href="#" class="signup">Sign up  <i class="fa-solid fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@include('guest.elements.footer-link')