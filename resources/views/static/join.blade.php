<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <title>かめたんサーバーWeb | 参加方法</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1>参加方法</h1>
    <p>スマホ版, Windows10版の参加方法は以下の動画をご覧ください</p>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/4xQexjw-kGs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@yield("footer")
</body>
</html>
