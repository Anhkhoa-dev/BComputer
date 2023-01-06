<div class="khoa-tk-sidebar">
    <a href="{{ route('user/taikhoan') }}" class="sidebar-link @yield('acc-info-active')">
        <i class="fa-solid fa-user">  </i> 
        <div class="sidebar-title">Account information</div>
    </a>
    <a href="#" class="sidebar-link @yield('acc-notify-active')">
        <i class="fa-solid fa-bell">  </i> 
        <div class="sidebar-title">Notify</div>
        <div class="not-seen-qty number-bage">1</div>
    </a>
    <a href="#" class="sidebar-link @yield('acc-order-active')">
        <i class="fa-solid fa-box"> </i>
        <div class="sidebar-title">Manager order  </div>
        <div class="processing-qty number-bage">0</div>
    </a>
    <a href="{{ route('user/address') }}" class="sidebar-link @yield('acc-address-active')">
        <i class="fa-solid fa-map-marked">  </i> 
        <div class="sidebar-title">Manager address</div>
    </a>
    <a href="#" class="sidebar-link @yield('acc-like-active')">
        <i class="fa-solid fa-heart">  </i> 
        <div class="sidebar-title">Product like</div>
    </a>
    <a href="#" class="sidebar-link @yield('acc-info-voucher')">
        <i class="fa-solid fa-ticket-alt">  </i> 
        <div class="sidebar-title">Manager voucher</div>
    </a>
    <hr>
    <a href="#" class="sidebar-link">
        <i class="fa-solid fa-power-off">  </i> 
        <div class="sidebar-title">Logout</div>
    </a>
</div>