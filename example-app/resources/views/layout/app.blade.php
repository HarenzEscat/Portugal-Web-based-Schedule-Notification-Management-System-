<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{route('home')}}">Home</a>
            <a href="{{route('dashboard')}}">Dashboard</a>
            @if(auth()->check())
                <a href="{{route('logout')}}">Log Out</a>
            @else
                <a href="{{ route('login') }}">Log In</a>
                <a href="{{ route('registration') }}">Register</a>

            @endif
        </nav>
    </header>

    @yield('content')
</body>
</html>
