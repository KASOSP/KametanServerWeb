<?php
$user = Auth::user();
$cartItems = [];
$cost = 0;
foreach($user->cartItems()->get() as $item){
    $cartItems[] = [
        \App\Http\Controllers\ShopController::$productIdToMcItemId[$item->product_id][0],
        $item->count,
        $item->count*\App\Http\Controllers\ShopController::$productIdToMcItemId[$item->product_id][1]
    ];
    $cost += $item->count*\App\Http\Controllers\ShopController::$productIdToMcItemId[$item->product_id][1];
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <title>かめたんサーバーWeb | ショップ</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1>ショップ</h1>
    <p>サーバー内通貨 「メタ」でサーバー内で使用できるアイテムを購入できます。</p>
    <div class="row">
        <div class="col-md-7">
            <h3 class="mt-4">エメラルド</h3>
            <h3>1個<s>10000メタ</s> <span style="color: red">5000メタ</span></h3>
            <form method="POST" action="{{route('shop')}}">
                @csrf
                <label>
                    <input type="radio" name="count" value="1">
                </label>1個
                <label>
                    <input type="radio" name="count" value="5">
                </label> 5個
                <label>
                    <input type="radio" name="count" value="10">
                </label> 10個
                <label>
                    <input type="radio" name="count" value="20">
                </label> 20個

                <input type="hidden" name="product_id" value="0">

                <input type="submit" class="btn btn-primary pt-0 pb-0 mt-0 mb-0 ml-2" value="カートに入れる" />

            </form>
        </div>
        <div class="col-md-5 mt-3">
            <div class="card">
                <div class="card-header">
                    <h3>カートの中身 {{count($cartItems)}}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <th scope="row">{{$item[0]}}</th>
                                <td>{{$item[1]}}個</td>
                                <td>{{$item[2]}}メタ</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <h4>小計 {{$cost}} メタ</h4>
                </div>
            </div>
        </div>
    </div>

</div>
@yield("footer")
</body>
</html>
