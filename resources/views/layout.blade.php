<!doctype html>
<html lang="en">
<head>
{{--   @include("components.head") kiểu cũ--}}
    <x-head/>
</head>
<body>
{{--    @include("components.header") kiểu cũ--}}
<div class="wrapper">

    <!-- Navbar -->
    <x-nav/>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   <x-aside/>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <x-contentHeader/>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
              @yield("Content")
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <x-footer/>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<x-scripts/>
{{--        @include("components.footer") kiểu cũ--}}
</body>
</html>

