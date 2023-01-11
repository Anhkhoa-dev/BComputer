    @include('guest.elements.head')
    {{--  include trang header --}}
    @include('guest.elements.header')

    @yield('user-contents')

    {{--  include trang footer --}}
    @include('guest.elements.footer')


    @include('guest.elements.footer-link')
