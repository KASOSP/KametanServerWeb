<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <title>かめたんサーバーWeb | マイページ</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1>{!!Auth::user()->getDisplayName()!!} さんのマイページ</h1>
    <p>マイページでは自分のステータスなどを確認できます</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">項目</th>
            <th scope="col">データ</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">逃走成功回数</th>
            <td>100回</td>
        </tr>
        <tr>
            <th scope="row">見出しセル</th>
            <td>データセル</td>
        </tr>
        <tr>
            <th scope="row">見出しセル</th>
            <td>データセル</td>
        </tr>
        </tbody>
    </table>
</div>
@yield("footer")
</body>
</html>
