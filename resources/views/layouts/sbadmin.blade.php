<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Warung Kopi Admin</title>
    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Sidebar -->
    @include('partials.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- Navbar -->
            @include('partials.navbar')
            <!-- Main Content -->
            <div class="container-fluid mt-4">
                @yield('content')
            </div>
        </div>
        @include('partials.footer')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>
</body>
</html>