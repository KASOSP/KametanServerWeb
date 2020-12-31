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
            document.getElementById("search_form").submit();
        }
    </script>
    <title>かめたんサーバーWeb | ユーザー検索</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1 class="mb-3">ユーザー検索</h1>
    <p>サーバーに登録されているユーザーを検索できます</p>

    <div class="row">
        <div class="col-md-9">
            <form class="form" action="{{ route('search') }}" method="POST" id="search_form">
                @csrf
                <div class="form-group row">
                    <label for="username" class="col-sm-4 col-form-label">検索ユーザー名</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('search') is-invalid @enderror" id="search" name="search" value="{{ old('search') }}" required autocomplete="search" autofocus placeholder="検索ユーザー名"/>
                        @error('search')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">オプション</div>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="perfect_equal" id="check">
                            <label class="form-check-label" for="check">
                                完全一致
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button class="g-recaptcha btn btn-primary" data-sitekey="{{config('services.recaptcha_invisible')['site_key']}}" data-callback='onSubmit'>検索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(isset($users))
        @if(count($users) === 0)
            <p>ユーザーが見つかりませんでした</p>
        @else
            @if(count($users) > 10)
                <p>10人以上のデータが見つかりました</p>
            @else
                <p>{{count($users)}}人のデータが見つかりました</p>
            @endif
            <div class="row">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ユーザー名</th>
                        <th scope="col">最終ログイン</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{!! $user->getDisplayName() !!}</th>
                        <td>{{$user->logs()->where('type', \App\Models\UserLog::TYPE_SERVER_LOGIN)->orderByDesc('created_at')->limit(1)->first()->created_at}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endif
</div>
@yield("footer")
</body>
</html>
