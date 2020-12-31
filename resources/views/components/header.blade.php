@section("header")
    <?php
    $pages = [
        //[PageName, PageUrl, IsLoginNeeded, Icon(optional)]
        ['参加方法', '/join', false, 'fas fa-play'],
        ['ルール', '/rule', false, 'fas fa-book-open'],

        ['アイテム', '/items', false, 'fab fa-apple'],
        ['禁止事項', '/prohibited', false, 'fas fa-ban'],
        ['利用規約', '/tos', false, 'fas fa-user-secret'],
        ['ユーザー検索', '/search', false, 'fas fa-search'],
        ['ショップ', '/shop', true, 'fas fa-store'],
        [
            'その他',
            [
                ['接続情報', '/connect', false],
                ['PrivacyPolice', '/privacy', false],
                ['サポート', '/support', false],
                ['マイページ', '/mypage', true, 'fas fa-user'],
                ['ログインボーナス', '/bonus', true],
                ['ログイン履歴', '/history/login', true],
                ['メタ獲得&使用履歴', '/history/money', true],
                ['ゲーム履歴', '/history/game', true],
                ['ログアウト', '/logout', true],
            ],
            false, 'fab fa-elementor'
        ]
    ];

    $user = \Illuminate\Support\Facades\Auth::user();
    $isLoggedIn = (bool) $user;

    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="/">かめたんサーバー</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @foreach($pages as $index => $page)
                    @if(!$page[2] or $isLoggedIn)
                        @if(is_string($page[1]))
                            <li class="nav-item @if ( !request()->is($page[1]) ) active @endif">
                                <a href="{{$page[1]}}" class="nav-link">@if(isset($page[3])) <i class="{{$page[3]}}"></i> @endif{{$page[0]}}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenu{{$index}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(isset($page[3])) <i class="{{$page[3]}}"></i> @endif{{$page[0]}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenu{{$index}}">
                                    @foreach($page[1] as $item)
                                        @if(!$item[2] or $isLoggedIn)
                                            <a class="dropdown-item" href="{{$item[1]}}">@if(isset($item[3])) <i class="{{$item[3]}}"></i> @endif{{$item[0]}}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @endif
                    @endif
                @endforeach
            </ul>
            @if($isLoggedIn)
                <a href="{{route('mypage')}}" class="nav-link navbar-text ml-auto text-white">{{$user->username}}さん</a>
            @else
                <a href='{{route("login")}}' class='nav-link navbar-text ml-auto @if ( !request()->is("login") ) text-white @endif'>ログイン</a>
            @endif
        </div>
    </nav>

@endsection
