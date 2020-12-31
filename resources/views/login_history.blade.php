<?php
$history = Auth::user()->logs();
$actions = [
    \App\Models\UserLog::TYPE_SERVER_LOGIN => "MCログイン",
    \App\Models\UserLog::TYPE_SERVER_LOGOUT => "MCログアウト",
    \App\Models\UserLog::TYPE_HOMEPAGE_LOGIN => "HPログイン",
];

$logs = Auth::user()->logs()->orderByDesc('created_at')->limit(50)->get();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <title>かめたんサーバーWeb | ログイン履歴</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1>ログイン履歴</h1>
    @if(count($logs) === 0)
        <p>現在ログはありません</p>
    @else
        <p>最新50件のログを表示します</p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">日時(JST)</th>
                <th scope="col">行動</th>
                <th scope="col">IPアドレス</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logs as $log)
                <tr>
                    <th scope="row">{{$log->created_at}}</th>
                    <td>
                        @switch($log->type)
                            @case(\App\Models\UserLog::TYPE_SERVER_LOGIN)
                            MCログイン
                            @break
                            @case(\App\Models\UserLog::TYPE_SERVER_LOGOUT)
                            MCログアウト
                            @break
                            @case(\App\Models\UserLog::TYPE_HOMEPAGE_LOGIN)
                            HPログイン
                            @break
                            @default
                            不明
                            @break
                        @endswitch
                    </td>
                    <td>{{$log->ip_address}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
@yield("footer")
</body>
</html>
