    @include('guest.elements.head')

    @if (session('toast_message'))
        <div id="toast-message" data-message="{{ session('toast_message') }}"></div>
    @endif
    @if (session('alert_top'))
        <div id="alert-top" data-message="{{ session('alert_top') }}"></div>
    @endif
    @if (Auth::check())
        <?php $user = Auth::user(); ?>
        <?php $totalCart = session()->get('totalCart'); ?>
        <input type="hidden" id="session-user" data-id="{{ $user->id }}">
    @endif
    {{--  include trang header --}}
    @include('guest.elements.header')

    @yield('user-contents')

    {{--  include trang footer --}}
    @include('guest.elements.footer')


    @include('guest.elements.footer-link')
