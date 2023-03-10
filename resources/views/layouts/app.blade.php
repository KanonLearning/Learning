<!-- プログラミングでは同じことは繰り返し書かないという原則がある。そのために共通部分を書き出して、簡単に呼び出せるようにする仕組みがある。これを「Don't Repeat Yourself」の頭文字を都ってDRY原則という。 -->


<!-- !+EnterでHTMLのテンプレートを作成-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- 'resources/css/app.css'からのcss読み込み -->
</head>
<body>
    <header>
        <a href="/" class="title">ミニブログ</a>
        <nav class="tab">
            <ul>
                @if (Auth::check())
                <!-- もしログインが完了できていれば、マイページと記事検索画面の表示、ログインできていなければやり直し。という処理 -->
                <li><a href="{{ route('home') }}" class="tab-item{{ Request::is('home') ? 'active' : '' }}">マイページ</a></li>
                <!-- マイページの作成 -->
                <li><a href="{{ route('articles.index') }}" class="tab-item{{ Request::is('articles') ? 'active' : '' }}">記事検索</a></li>
                <!-- 記事検索のフォーム -->
                <li class="nav-item"><a class="nav-link tab-item{{ Request::is('bookmarks') ? ' active' : ''}}" href="{{ route('bookmarks') }}">ブックマーク</a></li>
                <li>
                   <form action="{{ route('logout') }}" method="POST" on-submit="return confirm('ログアウトしますか？')">
                    @csrf
                    <button type="submit">ログアウト</button>
                   </form> 
                </li>
                @else
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link tab-item{{ Request::is('login') ? ' active' : ''}}" href="{{ route('login') }}">ログイン</a></li>
                    <!-- ログイン済みじゃないときは、ログイン画面へのリンクを表示 -->
                <li class="nav-item"><a class="nav-link tab-item{{ Request::is('register') ? ' active' : ''}}" href="{{ route('register') }}">会員登録</a></li>
                <!-- ログイン済みであるときは、会員登録画面へのリンクを表示 -->
                </ul>
                @endif
            </ul>
        </nav>
    </header>
    <main class="main-contents">
    <!-- mainタグはココが一番伝えたいところで、重要なところというのを示す。前あまり使ってなかった気がするのでメモ -->
        @yield('content')
        <!-- ここにbladeファイルで書き加えられた内容が埋め込まれてHTMLが生成される -->
    </main>
    <footer>
        &copy; Laravel8 入門から開発実践まで
    </footer>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>