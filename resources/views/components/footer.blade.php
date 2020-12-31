@section("footer")
    <?php

    $user = \Illuminate\Support\Facades\Auth::user();
    $isLoggedIn = (bool) $user;
    ?>
    <footer class="footer">
        <hr/>
        <div class="container">
            <div class="row">
                <div class="col-md">
                </div>
                <div class="col-md">
                    <h6 class="text-center">
                        @if($isLoggedIn)
                            <a class="btn" href="{{route('logout')}}">
                                ログアウト
                            </a>
                        @else
                            <a class="btn" href="{{route('login')}}">
                                ログイン
                            </a>
                        @endif
                    </h6>
                </div>
                <div class="col-md">
                    <h6 class="text-center">
                        <a class="btn" href="{{route('tos')}}">
                            利用規約
                        </a>
                    </h6>
                </div>
                <div class="col-md">
                    <h6 class="text-center">
                        <a class="btn" href="{{route('privacy')}}">
                        PrivacyPolicy
                        </a>
                    </h6>
                </div>
                <div class="col-md">
                    <h6 class="text-center">
                        <a class="btn" href="{{route('support')}}">
                        サポート
                        </a>
                    </h6>
                </div>
                <div class="col-md">

                </div>
            </div>
            <!--<h6 class="text-center">Copyright ©︎ 2015-2020 KametanServer All rights reserved.</h6>-->
            <h6 class="text-center">©︎ 2015-2020 KametanServer</h6>
        </div>
    </footer>
@endsection
