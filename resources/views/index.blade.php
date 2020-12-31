<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <title>かめたんサーバーWeb</title>
</head>
<body class="bg-light">
@yield("header")
    <div class="jumbotron jumbotron-fluid bg-info" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{asset("images/back_img.png")}});background-size: cover;">
        <div class="container">
            <script>
                if(window.innerWidth < 700) {
                    document.write('<h1 class="display-5 text-light text-center mb-5 mt-5">Welcome to<br />Kametan Server</h1>');
                }else{
                    document.write('<h1 class="display-4 text-light text-center">Welcome to Kametan Server</h1>');
                }
            </script>
            <p class="lead text-light text-center mb-4">mc.kametan.tokyo:19132</p>
        </div>
    </div>
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8 mb-3">
                <h3 class="mb-3">かめたんサーバーって?</h3>
                <p>かめたんサーバーは2015年にMinecraft PocketEdition用サーバーとして始まった逃走中ゲームが遊べるMinecraftのサーバーであり、現在は統合版のMinecraftから参加できます。逃走中ゲームとは、ハンターと逃走者に別れ、ハンターが逃走者を湯構えようと試み、逃走者ハンターから逃げる遊びです。かめたんサーバーでは独自開発しているシステムの、多くの独自アイテムやミッション、その他イベントなどでよりゲームを楽しむことができます。</p>
                <a href="{{route('join')}}" class="btn btn-primary mr-1 text-light">参加方法を見る</a>
                <a href="{{route('rule')}}" class="btn btn-primary mr-1 text-light">ルールをみる</a>
                <a href="{{route('items')}}" class="btn btn-primary text-light">アイテムをみる</a>
            </div>
            <div class="col-md-4">
                <img src="{{asset("images/IMG_5485.JPG")}}" alt="2019年の年越しの集合写真" class="img-fluid" />
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-8 mb-3">
                <h3 class="mb-3">Webでできること</h3>
                <p>Webではサーバーの情報を見ることができます。さらにログインするとより多くの機能を使用できます。ログインボーナスを毎日受け取ることができたり、Webショップではサーバー内の半分以下のメタ(ゲーム内通貨)でアイテムを購入できます。</p>
                <a href="{{route('login')}}" class="btn btn-danger mr-1 text-light">ログイン</a>
                <a href="" class="btn btn-danger text-light">パスワードの設定方法</a>
            </div>
            <div class="col-md-4">
                <img src="{{asset("images/IMG_5485.JPG")}}" alt="2019年の年越しの集合写真" class="img-fluid" />
            </div>
        </div>
    </div>
@yield("footer")
</body>
</html>
