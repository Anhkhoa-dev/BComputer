@include('admin.elements.head')


    

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('admin.elements.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.elements.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @yield('admin-main')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @include('admin.elements.footer')
