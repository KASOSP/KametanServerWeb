<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.common_head')
@include('components.footer')
@include('components.header')
<head>
    @yield("common_head")
    <title>かめたんサーバーWeb | 404 not found</title>
</head>
<body class="bg-light">
@yield("header")
<div class="container mt-4">
    <h1>404 not found</h1>
    <p>現在のサーバーにはお探しのページが見つかりませんでした。以下の方法をお試しください</p>

    <ul>
        <li>Githubで本サイトの変更履歴を見る(https://github.com/KASOSP/KametanServerWeb)</li>
        <li>本サイトの管理人に問い合わせる(https://kametan.tokyo/support)</li>
    </ul>

    <p>2015年から2020年に運用されていた古いホームページをお探しの場合</p>
    <ul>
        <li>かめたんサーバーWebアーカイブを探す(https://archive.kametan.tokyo)</li>
    </ul>
</div>
@yield("footer")
</body>
</html>
