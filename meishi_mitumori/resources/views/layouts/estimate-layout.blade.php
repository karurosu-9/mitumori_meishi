<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link href="{{ asset('css/pages/estimate-layout.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <div>
            <h1>title</h1>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
    </footer>
</body>

</html>
