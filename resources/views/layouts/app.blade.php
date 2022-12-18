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
</head>
<body>
    <header>
        <a href="/" class="title">ミニブログ</a>
    </header>
    <main class="main-contents">
    <!-- mainタグはココが一番伝えたいところで、重要なところというのを示す。前あまり使ってなかった気がするのでメモ -->
        @yield('content')
        <!-- ここにbladeファイルで書き加えられた内容が埋め込まれてHTMLが生成される -->
    </main>
    <footer>
        &copy; Laravel8 入門から開発実践まで
    </footer>
</body>
</html>