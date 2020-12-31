<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <title>かめたんサーバーWeb | 接続情報</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1>接続情報</h1>
</div>
@yield("footer")
</body>
</html>
