<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'DriveEasy Rentals')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <header class="site-header">
        <div class="container nav">
            <a href="{{ url('/') }}" class="logo">DriveEasy</a>
            <nav>
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/events') }}">Events</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} DriveEasy Rentals. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
