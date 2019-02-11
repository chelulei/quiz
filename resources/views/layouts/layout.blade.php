<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>

<body>
<!-- Topbar -->
@include('partials.top')
<!-- END Topbar -->
<!-- Topbar -->
@include('partials.top')
<!-- END Topbar -->

<!-- Main container -->
<main class="main-content bg-gray min-vh-100">
    @yield('content')
</main>
<!-- END Main container -->
<!-- Footer -->
@include('partials.footer')
<!-- END Footer -->
<!-- Scripts -->
@include('partials.scripts')
</body>
</html>