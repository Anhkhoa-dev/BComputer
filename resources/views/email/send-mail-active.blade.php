<div style="width: 500px;margin: 0 auto;padding: 20px;text-align: center;">
    <h2>Hi, {{ $user->fullname }}</h2>
    <div>
        <p>Bạn đã đăng ký thành công tài khoản tại hệ thống của chúng tôi</p>
        <p>Để có thể sử dụng cho các dịch vụ. Vui lòng bấm nút kích hoạt tài khoản để kích hoạt tài khoản </p>
        <a style="padding: 10px 30px; text-align: center; background: #E94560; color: #fff; text-decoration: none; margin: 70px 0;"
            href="{{ route('user/active-account', ['user' => $user->id, 'token' => $user->active_token]) }}">
            Kích hoạt tài khoản
        </a>
    </div>
</div>
