<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin/dashboard') }}" class="brand-link">
        <img src="{{ asset('image/logo02.png') }}" alt="BComputer logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BComputer</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-box"></i>
                        <p>
                            Product Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin/product') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product Image</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Address shop</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-gear"></i>
                        <p>
                            System Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin/order') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin/supplier') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('admin/account') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Account</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/supplier') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Supplier</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin/category') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/banner') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/brand') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brands</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Address shop</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('admin/userAddress') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Address Account</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin/voucher') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Voucher</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
