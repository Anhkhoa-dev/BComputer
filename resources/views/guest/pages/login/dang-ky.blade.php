@include('guest.elements.head')
@section('title')
    Register Acount | BComputer
@endsection

<div class="khoa-login">
    <div class="container">
        <div class="row">
            <div class="login_nen">
                <div class="box_login">
                    <h1 class="text-center mb-4">Register Acount</h1>
                    {{-- @error('errorMsg')
                            <span class="errorMsg">{{$message}}</span> 
                        @enderror --}}
                    <form action="{{ url('postRegister') }}" method="post" class="form_login">
                        @csrf
                        {{-- @method('put') --}}
                        <div class="form_group">
                            <input type="text" name="email" placeholder="Enter your email" class="input_control"
                                autocomplete="on" value="{{ old('email') }}" />
                            <label for="userName" class="icon_user"><i class="fa-solid fa-envelope"></i></label>
                            <label class="success_check"><i class="fa-solid fa-circle-check"></i></label>
                            <label class="error_check"><i class="fa-solid fa-circle-exclamation"></i></label>
                            @error('email')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form_group">
                            <input type="text" name="fullname" value="{{ old('fullname') }}"
                                placeholder="Enter your fullname" class="input_control" autocomplete="on" />
                            <label for="userName" class="icon_user"><i class="fa-solid fa-user"></i></label>
                            <label class="success_check"><i class="fa-solid fa-circle-check"></i></label>
                            <label class="error_check"><i class="fa-solid fa-circle-exclamation"></i></label>
                            @error('fullname')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form_group">
                            <input type="password" name="password" value="{{ old('password') }}"
                                placeholder="Enter your password" class="input_control" autocomplete="on" />
                            <label for="password" class="icon_pass"><i class="fa-solid fa-lock"></i></label>
                            <label class="success_check"><i class="fa-solid fa-circle-check"></i></label>
                            <label class="error_check"><i class="fa-solid fa-circle-exclamation"></i></label>
                            @error('password')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form_group">
                            <input type="password" name="cpassword" value="{{ old('cpassword') }}"
                                placeholder="Enter passwrd confirm" class="input_control" autocomplete="on" />
                            <label for="password" class="icon_pass"><i class="fa-solid fa-lock"></i></label>
                            <label class="success_check"><i class="fa-solid fa-circle-check"></i></label>
                            <label class="error_check"><i class="fa-solid fa-circle-exclamation"></i></label>
                            @error('cpassword')
                                <span class="errorMsg">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <button class="btnLogin">Đăng ký</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <p>Đã có tài khoản. <a href="{{ route('user/login') }}">Đăng nhập</a></p>
                    </div>

                    {{-- @include('guest.pages.login.hinh-thuc-dang-nhap-khac') --}}
                    <div class="d-flex justify-content-between mt-5">
                        <a href="{{ route('user/index') }}" class="back_home"><i class="fa-solid fa-chevron-left"></i>
                            Back to home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@include('guest.elements.footer-link')
