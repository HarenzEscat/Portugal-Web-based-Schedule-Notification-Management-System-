<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <Style>
        nav {
            background-color: #333;
            height: 60px;
            border-radius: 5px;
        }

        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            list-style: none;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        nav {
            position: relative;
        }

        nav a {
            display: block;
            padding: 15px;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        nav a:hover {
            background-color: #555;
        }

        nav a:hover:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #fff;
        }
    </Style>
    <header>
        <nav>
            <a href="{{route('home')}}">Home</a>
            <a href="{{route('dashboard')}}">Dashboard</a>
            @if(auth()->check())
                <a href="{{route('logout')}}">Log Out</a>
            @else
                <a href="{{ route('login') }}">Log In</a>
            @endif
        </nav>
    </header>

    @yield('content')
</body>
</html>
