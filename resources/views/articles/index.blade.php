<!-- 画面の見える部分を形成 -->

<!-- !+EnterでHTMLのテンプレートを作成-->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/main.css">
    <!-- cssファイルの読み込み -->
    <title>Document</title>
</head>
<body>
    <header>
        <div class="title">タイトルを入れるとこ</div>
    </header>
    <!-- mainタグはココが一番伝えたいところで、重要なところというのを示す。前あまり使ってなかった気がするのでメモ -->
    <main class="main-cotents">
        <!-- ＜？php ？＞がなくてもphpの処理を書きたいときは@〇〇で開始。@end〇〇で終了 -->
        @foreach ($articles as $article)
        <!-- articleクラスでは意味的に関連しているコンテンツを載せるときに使う。sectionよりもさらに限定的なもの。ちな、articleの中にsectionを作るのも可能 -->
        <article class="article-item">
            <!-- アロー演算子でプロパティ（変数）やメソッド（関数）にアクセス出来る。$articleの中に収納されているtitle・bodyのみ抽出 -->
            <div class="ariticle-title">{{ $article->title }}</div>
            <div class="ariticle-body">{{ $article->body }}</div>
        </article>
        @endforeach
    </main>
    <footer>
        <!-- &copyと記述するとCopyrightマーク（著作権）の©が表示される -->
        &copy; Laravel8 入門
    </footer>
</body>
</html>