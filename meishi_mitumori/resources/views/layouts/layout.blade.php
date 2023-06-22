<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- ここに共通のCSSやJavaScriptのリンクなどを追加 -->
    <link href="{{ asset('css/pages/layout.css') }}" rel="stylesheet">
    
</head>
<body>
    <header>
        <!-- トップページへのリンクなどを追加 -->
        <div><h1>title</h1></div>
    </header>

    <main>
        @yield('content') <!-- 各ページの個別のコンテンツがここに挿入される -->
    </main>

    <footer>
    </footer>
</body>
</html>
