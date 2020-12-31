<?php
$items = [
    ["エメラルド", 10000, "逃走者", "数秒間早く走れるようになる"],
    ["うさぎのあし", 10000, "逃走者", "数秒間高くジャンプできる"],
    ["エクレア", 10000, "逃走者", "透明になれる", asset('images/items/ekurea.png')],
    ["網鉄砲", 10000, "逃走者", "網が出てハンターを妨害できる", asset('images/items/net_gun.png')],
    ["冷凍銃", 10000, "逃走者", "ハンターを数秒間動けなくできる", asset('images/items/ice_gun.png')],

];

$colors = ["success", "danger", "warning", "info"];
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <title>かめたんサーバーWeb | アイテム</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1>アイテム</h1>
    <p>サーバー内で使用できるアイテムです</p>
    {{-- モバイル版で横に並び切らないから変更
    <table class="table">
        <thead>
        <tr>
            <th scope="col">アイテム</th>
            <th scope="col">価格</th>
            <th scope="col">使用可能</th>
            <th scope="col">効果</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $index => $item)
            <tr class="table-{{$colors[$index % 4]}}">
                <th scope="row">@if(isset($item[4]))<img src="{{$item[4]}}" alt="{{$item[0]}}の画像" class="bg-info"> @endif{{$item[0]}}</th>
                <td>{{$item[1]}}ﾒﾀ</td>
                <td>{{$item[2]}}</td>
                <td>{{$item[3]}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    --}}
    <div class="accordion" id="accordion">
        @foreach($items as $index => $item)
            <div class="card">
                <div class="card-header" id="heading{{$index}}">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$index}}" aria-expanded="@if($index==0) true @else false @endif" aria-controls="collapse{{$index}}">
                            @if(isset($item[4]))<img src="{{$item[4]}}" alt="{{$item[0]}}の画像" class="bg-info"> @endif{{$item[0]}}
                        </button>
                    </h5>
                </div>
                <div id="collapse{{$index}}" class="collapse @if($index==0) show @endif" aria-labelledby="heading{{$index}}" data-parent="#accordion">
                    <div class="card-body">
                        <p>サーバー内価格:{{$item[1]}}ﾒﾀ, 使用可能:{{$item[2]}}</p>
                        <p>{{$item[3]}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@yield("footer")
</body>
</html>
