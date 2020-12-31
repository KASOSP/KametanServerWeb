<?php
$history = Auth::user()->logs();
$actions = [
    \App\Models\UserLog::TYPE_SERVER_LOGIN => "MCログイン",
    \App\Models\UserLog::TYPE_SERVER_LOGOUT => "MCログアウト",
    \App\Models\UserLog::TYPE_HOMEPAGE_LOGIN => "HPログイン",
];

$transactions = Auth::user()->moneyTransactions()->orderByDesc('created_at')->limit(50)->get();

$typeToAction = [
    \App\Models\UserMoneyTransaction::TYPE_ACCOUNT_INIT => "初期設定",
    \App\Models\UserMoneyTransaction::TYPE_ITEM_BUY => "アイテム購入",
    \App\Models\UserMoneyTransaction::TYPE_ITEM_USE => "アイテム使用",
    \App\Models\UserMoneyTransaction::TYPE_ITEM_SOBA => "年越しそば",
    \App\Models\UserMoneyTransaction::TYPE_GAME_EVENT => "ゲームイベント",
    \App\Models\UserMoneyTransaction::TYPE_GAME_CLEAR => "ゲームクリア",
    \App\Models\UserMoneyTransaction::TYPE_GAME_CATCH => "捕獲",
    \App\Models\UserMoneyTransaction::TYPE_GAME_SURRENDER => "自首",
    \App\Models\UserMoneyTransaction::TYPE_REFUND => "返金",
    \App\Models\UserMoneyTransaction::TYPE_ADMIN_OPERATION => "管理者の操作",
];
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <title>かめたんサーバーWeb | メタ獲得&使用履歴</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1>メタ獲得&使用履歴</h1>
    @if(count($transactions) === 0)
        <p>現在情報はありません</p>
    @else
        <p>最新50件の情報を表示します</p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">日時(JST)</th>
                <th scope="col">行動</th>
                <th scope="col">金額</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <th scope="row">{{$transaction->created_at}}</th>
                    <td>
                        @if(isset($typeToAction[$transaction->type]))
                            {{$typeToAction[$transaction->type]}}
                        @else
                            不明
                        @endif
                    </td>
                    <td>{{$transaction->amount}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
@yield("footer")
</body>
</html>
