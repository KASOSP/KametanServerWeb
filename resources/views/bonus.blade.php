<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <title>かめたんサーバーWeb | ログインボーナス</title>
    <script>
        function selectBonus(num){
            document.getElementById('select').value = num;
            document.getElementById('form').submit();
        }
    </script>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1>ログインボーナス</h1>

    <h3>一つ選んでください</h3>
    <form method="POST" id="form" action="{{route('bonus')}}">
        @csrf
        <input hidden id="select" name="select" />
    </form>

    <button class="border-0 bg-transparent" onclick="selectBonus(0)"><img alt="プレゼント0" src="{{asset('images/box.png')}}" width="124" height="124"/></button>
    <button class="border-0 bg-transparent" onclick="selectBonus(1)"><img alt="プレゼント1" src="{{asset('images/box.png')}}" width="112" height="112"/></button>
    <button class="border-0 bg-transparent" onclick="selectBonus(2)"><img alt="プレゼント2" src="{{asset('images/box.png')}}" width="100" height="100"/></button>

</div>
@yield("footer")
</body>
</html>
