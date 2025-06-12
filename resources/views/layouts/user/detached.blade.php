<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true" data-sidenav-size="{{ $sidenav ?? 'default' }}">

<head>
    @include('layouts.shared/user/title-meta', ['title' => $title])
    @yield('css')
    @include('layouts.shared/user/head-css')
    @vite(['resources/js/hyper-head.js','resources/js/hyper-config.js'])
</head>

<body>
@yield('preloader')
<!-- Begin page -->
<div class="wrapper">

    @include('layouts.shared/user/topbar')
    @include('layouts.shared/user/left-sidebar')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container -->

        </div>
        <!-- content -->

        @include('layouts.shared/user/footer')
    </div>

</div>
<!-- END wrapper -->
@yield('modal')

@include('layouts.shared/user/right-sidebar')

@include('layouts.shared/user/footer-scripts')

@vite(['resources/js/hyper-main.js','resources/js/hyper-layout.js'])

</body>
</html>
