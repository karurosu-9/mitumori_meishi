<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- ここに共通のCSSやJavaScriptのリンクなどを追加 -->
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <!-- トップページへのリンクなどを追加 -->
        <div>title</div>
    </header>

    <main>
        @yield('content') <!-- 各ページの個別のコンテンツがここに挿入される -->
    </main>

    <footer>
    </footer>
</body>
</html>
