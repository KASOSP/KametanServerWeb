<?php
$user = \Illuminate\Support\Facades\Auth::user();
$isLoggedIn = (bool) $user;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>かめたんサーバーWeb | サポート</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1>サポート</h1>
    <p>運営グループにサポートを要求することができます</p>
    <form method="POST">
        @csrf
        <div class="form-group row">
            <label for="username" class="col-md-3 col-form-label">ユーザー名</label>
            <div class="col-md-9">
                <input type="text" name="username" class="form-control" id="username" placeholder="ユーザー名を入力" @if($isLoggedIn) value="{{$user->username}}" readonly @endif>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label">メールアドレス(必須)</label>
            <div class="col-md-9">
                <input required type="email" name="email" class="form-control" id="email" placeholder="メールアドレスを入力">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-3">オプション</div>
            <div class="col-md-9">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="not_required_reply" id="check">
                    <label class="form-check-label" for="check">
                        返信を必要としない
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-md-3 col-form-label">内容(必須)</label>
            <div class="col-md-9">
                <textarea required class="form-control" name="content" id="content" rows="5"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-md-3 col-form-label">reCaptcha</label>
            <div class="col-md-9">
                <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha_visible')['site_key']}}"></div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-9">
                <button type="submit" class="btn btn-primary">送信</button>
            </div>
        </div>
    </form>
</div>
@yield("footer")
</body>
</html>
