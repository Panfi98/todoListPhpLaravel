<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>

<body>
    <h1>@yield('title')</h1>
    <div>
        @if (session()->has('success'))
            <div>{{session('success')}}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
