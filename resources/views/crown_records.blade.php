<?php
$history = Auth::user()->logs();
$actions = [
    \App\Models\UserLog::TYPE_SERVER_LOGIN => "MCログイン",
    \App\Models\UserLog::TYPE_SERVER_LOGOUT => "MCログアウト",
    \App\Models\UserLog::TYPE_HOMEPAGE_LOGIN => "HPログイン",
];

$crowns = Auth::user()->crowns()->orderByDesc('created_at')->limit(50)->get();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <title>かめたんサーバーWeb | 王冠授与記録</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1>王冠授与記録</h1>
    @if(count($crowns) === 0)
        <p>現在ログはありません</p>
    @else
        <p>王冠授与の記録です</p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">発行日</th>
                <th scope="col">王冠</th>
                <th scope="col">データ</th>
            </tr>
            </thead>
            <tbody>
            @foreach($crowns as $crown)
                <tr>
                    <th scope="row">{{$crown->created_at}}</th>
                    <td>
                        {!! $crown->getCrownText() !!}
                    </td>
                    <td>{{$crown->data}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
@yield("footer")
</body>
</html>
