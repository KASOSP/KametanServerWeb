<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <title>かめたんサーバーWeb | ゲーム履歴</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1>ゲーム履歴</h1>
</div>
@yield("footer")
</body>
</html>
