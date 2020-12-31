<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onSubmit(token) {
            document.getElementById("login_form").submit();
        }
    </script>
    <title>かめたんサーバーWeb | ログイン</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1 class="mb-3">ログイン</h1>
    <p>ログインすることにより、<a href="{{route('tos')}}">利用規約</a>に同意したものとみなします</p>

    <div class="row">
        <div class="col-md-9">
            <form class="form" action="{{ route('login') }}" method="POST" id="login_form">
                @csrf
                <div class="form-group row">
                    <label for="username" class="col-sm-4 col-form-label">ユーザー名</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="ユーザー名"/>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">パスワード</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="パスワードを入力"/>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button class="g-recaptcha btn btn-primary" data-sitekey="{{config('services.recaptcha_invisible')['site_key']}}" data-callback='onSubmit'>ログイン</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@yield("footer")
</body>
</html>
