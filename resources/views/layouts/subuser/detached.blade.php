<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true" data-sidenav-size="{{ $sidenav ?? 'default' }}">

<head>
    @include('layouts.subuser/title-meta', ['title' => $title])
    @yield('css')
    @include('layouts.subuser/head-css')
    @vite(['resources/js/hyper-head.js','resources/js/hyper-config.js'])
</head>

<body>
@yield('preloader')
<!-- Begin page -->
<div class="wrapper">

    @include('layouts.subuser/topbar')
    @include('layouts.subuser/left-sidebar')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container -->

        </div>
        <!-- content -->

        @include('layouts.subuser/footer')
    </div>

</div>
<!-- END wrapper -->
@yield('modal')

@include('layouts.subuser/right-sidebar')

@include('layouts.subuser/footer-scripts')

@vite(['resources/js/hyper-main.js','resources/js/hyper-layout.js'])

</body>
</html>
