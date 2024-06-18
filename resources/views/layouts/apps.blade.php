<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Notification System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/apps.css') }}">
    <script src="https://kit.fontawesome.com/e19061c169.js" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.dashboard') }}">SNMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}"><i class="fas fa-home"></i></a>
                        <span class="hover-text">Dashboard</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('userprofile') }}"><i class="fas fa-user"></i></a>
                        <span class="hover-text">Profile</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.settings') }}"><i class="fas fa-gear"></i></i></a>
                        <span class="hover-text">Settings</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main role="main" class="container">
        @yield('content')
    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
