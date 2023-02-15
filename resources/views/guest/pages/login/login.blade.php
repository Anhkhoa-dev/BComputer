@include('guest.elements.head')
@section('title')
    Login Acount | BComputer
@stop
<div class="khoa-login">
    <div class="container">
        <div class="row">
            <div class="login_nen">
                <div class="box_login">
                    <h1 class="text-center mb-4 logo"><span class="letterB">B</span><span class="letterC">C</span>omputer
                    </h1>
                    @error('errorMsg')
                        <span class="errorMsg">{{ $message }}</span>
                    @enderror
                    <form action="{{ URL('process') }}" method="post" class="form_login">
                        @csrf
                        {{-- @method('post') --}}

                        <div class="form_group mb-1">
                            <input type="text" name="email" placeholder="Enter your email" class="input_control"
                                autocomplete="on" autofocus value="{{ old('email') }}" />
                            <label for="userName" class="icon_user"><i class="fa-solid fa-envelope"></i></label>
                            <label class="success_check"><i class="fa-solid fa-circle-check"></i></label>
                            <label class="error_check"><i class="fa-solid fa-circle-exclamation"></i></label>
                            @error('email')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form_group mb-2">
                            <input type="password" name="password" placeholder="Password" class="input_control"
                                autocomplete="on" />
                            <label for="password" class="icon_pass"><i class="fa-solid fa-lock"></i></label>
                            <label class="success_check"><i class="fa-solid fa-circle-check"></i></label>
                            <label class="error_check"><i class="fa-solid fa-circle-exclamation"></i></label>
                            @error('password')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="check_box mb-3">
                            {{-- <div>
                                <input type="checkbox" name="remember"><label for="remember">Remember login.</label>
                            </div> --}}
                            <div class="float-right">
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>
                        <div class="mb-2">
                            <button class="btnLogin">SIGN IN</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <p>Chưa có tài khoản. <a href="{{ route('user/dang-ky') }}">Đăng ký</a></p>
                    </div>
                    @include('guest.pages.login.hinh-thuc-dang-nhap-khac')
                    <a href="{{ route('user/index') }}" class=" text-decoration-none text-dark"><i
                            class="fa-solid fa-chevron-left"></i>
                        Back to home
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@include('guest.elements.footer-link')
