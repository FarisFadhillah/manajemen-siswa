<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.admin.partials.head')

    @stack('styles')
</head>

<body>
    <div id="app">
        @include('dashboard.admin.partials.sidebar')

        <div id="main">
            @include('dashboard.admin.partials.header')
            
            @include('partials.flash')

            @yield('content')

            @include('dashboard.admin.partials.footer')
        </div>
    </div>

    @include('dashboard.admin.partials.scripts')

    @stack('scripts')
</body>

</html>
