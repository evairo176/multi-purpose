<!DOCTYPE html>
<html lang="en">

<head>
    @Include('includes.styles')
    @stack('styles')
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @Include('includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @Include('includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')

                    {{isset($slot)? $slot : null}}
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @Include('includes.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @livewireScripts
    @Include('includes.scripts')
    @stack('scripts')

</body>

</html>