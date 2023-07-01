<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">

    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="" sizes="16x16" type="image/png" />
    <link rel="icon" href="" sizes="32x32" type="image/png" />
    <link rel="icon" href="" sizes="48x48" type="image/png" />
    <link rel="icon" href="" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head" class="head">
        <h1><a href="/top"><img src="{{ asset('/images/main_logo.png') }}" alt="アイコン"></a></h1>
        <nav class="nav">
                    <p class="has-child"><a href="#">{{session()->get('username')}}さん</a></p><img class="profile-img" src="images/dawn.png">
                <ul class="dropdown_lists">
                    <li class="dropdown__list"><a href="/top">ホーム</a></li>
                    <li class="dropdown__list"><a href="/profile">プロフィール</a></li>
                    <li class="dropdown__list"><a href="/login">ログアウト</a></li>
                </ul>
         </nav>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{session()->get('username')}}さんの</p>
                <div class="follow">
                <p>フォロー数</p>
                <p>{{ $follows }}名</p>
                </div>
                <p class="btn"><a href="/followList">フォローリスト</a></p>
                <div class="follow">
                <p>フォロワー数</p>
                <p>{{ $followers}}名</p>
                </div>
                <p class="btn"><a href="/followerList">フォロワーリスト</a></p>
            </div>
            <p class="user-btn btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
    <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/5-1-1/js/5-1-1.js"></script>
    <script src="/js/style.js"></script>
</body>
</html>