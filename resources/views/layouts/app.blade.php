<!DOCTYPE html>
<html lang="en">

<head>
    @Include('includes.styles')
    @stack('styles')
    @livewireStyles
    <style>
        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
        */
        /*.navbar .navbar-item.navbar-dropdown {
            margin-left: auto;
        }*/
        .layout-px-spacing {
            min-height: calc(100vh - 140px) !important;
        }
    </style>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<body class="sidebar-noneoverflow">


    @Include('includes.navbar')
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @Include('includes.sidebar')

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">


                <!-- CONTENT AREA -->


                <div class="row layout-top-spacing">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

                        @yield('content')
                        {{isset($slot)? $slot : null}}

                    </div>

                </div>


                <!-- CONTENT AREA -->

            </div>
            @Include('includes.footer')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    @Include('includes.scripts')
</body>

</html>