<header>
    {{-- header info --}}
    <div class="khoa-header__info">
        <div class="container-md">
            <div class="header_top">
                <div>
                    <a href="#" class="text-decoration-none text-white">
                        <i class="fa-solid fa-phone "></i>
                        0865 677 010
                    </a>
                </div>

                <div>
                    <a href="#" class="text-decoration-none text-white"><i class="fa-solid fa-map-location-dot"></i>
                        590, CMT8, DISTRICT 3, HCMC
                    </a>
                </div>
                <div class="text-white">
                    <a href="#" class="text-decoration-none text-white"> <i class="fas fa-globe"></i>
                    </a>
                    <a href="#" class="text-decoration-none text-white">VI</a> |
                    <a href="#" class="text-decoration-none text-white">EN</a>
                </div>
            </div>

        </div>
    </div>

    {{-- navbar info --}}
    <nav class="khoa-navbar">
        <div class="container-md">
            <div class="navbar">
                <div class="navbar__logo">
                    <a href="{{ route('user/index') }}" class="logo">
                        <span class="letterB">B</span><span class="letterC">C</span>omputer
                    </a>
                </div>
                <div class="navbar__search">
                    <form class="form__search">
                        <input type="text" name="search" id="" class="search_input"
                            placeholder="Search...">
                        <label for="search" class="search_label"><i class="fas fa-search"></i></label>
                        <button class="btnSearch">All Search</button>
                    </form>

                </div>

                <div class="navbar__icon">

                    {{-- nút giỏ hàng --}}
                    <a href="{{ route('user/cart-items') }}" class="cursor-pointer text-decoration-none text-dark">
                        <div class="icon__cart">
                            @if (Auth::check() && $qtyCart != 0)
                                <p class="cart__number">{{ $qtyCart }}</p>
                            @else
                                <p class="cart__number d-none">0</p>
                            @endif

                            <div class="cart__circle">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                            <div id="add-cart-success">
                            </div>
                        </div>

                    </a>
                    {{-- Nút đăng nhập --}}

                    <a href="{{ route('user/login') }}" class="img__user">

                        @if (Auth::check() || session('user'))
                            <?php $user = Auth::user(); ?>
                            <div class="icon__user">
                                <img src="{{ asset('image/user/' . ($user->image = !null ? $user->image : 'avatar-default.png')) }}"
                                    alt="" class="img-user">
                            </div>
                            <div class="user_info dropdown">
                                <div class="author">Hello!</div>
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $user->fullname }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('user/taikhoan') }}"><i
                                                class="fa-solid fa-user me-1"></i>View account</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-bell me-1"></i>
                                            Notify</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user/order') }}"><i
                                                class="fa-solid fa-box me-1"></i>My
                                            Order</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                                class="fa-solid fa-power-off me-1"></i>Logout</a></li>
                                </ul>
                            </div>
                        @else
                            <div class="icon__user">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        @endif

                    </a>
                </div>
            </div>
        </div>
    </nav>
    {{-- sideBar info --}}
    <div class="khoa-sidebar">
        <div class="container-md">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="category">
                            <img src="{{ asset('image/icon/001-menu.png') }}" width="25" alt="">
                            <div>Categories</div>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 align-items-center">
                                <div class="box_service">
                                    <img src="{{ asset('image/icon/001-hand.png') }}" width="25" alt="">
                                    <a href="#" class="service_title">PAYMENT GUIDE</a>
                                </div>
                            </div>
                            <div class="col-md-4 align-items-center">
                                <div class="box_service ">
                                    <img src="{{ asset('image/icon/002-vehicle.png') }}" width="25" alt="">
                                    <a href="#" class="service_title">WARRANTY POLICY</a>
                                </div>
                            </div>
                            <div class="col-md-4 align-items-center">
                                <div class="box_service">
                                    <img src="{{ asset('image/icon/003-fast-delivery.png') }}" width="25"
                                        alt="">
                                    <a href="#" class="service_title">SHIPPING POLICY</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
