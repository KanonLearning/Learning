<!-- 画面の見える部分を形成 -->

@extends('layouts.app')
@section('content')
<p><a href="{{ route('articles.create') }}">記事を書く</a></p>
<!-- articlesフォルダのcreateファイルで作成したページに遷移 -->

@foreach ($articles as $article)
<!-- ＜？php ？＞がなくてもphpの処理を書きたいときは@〇〇で開始。@end〇〇で終了 -->

<article class="article-item">
<!-- articleクラスでは意味的に関連しているコンテンツを載せるときに使う。sectionよりもさらに限定的なもの。ちな、articleの中にsectionを作るのも可能 -->
<div class="ariticle-title">
    <a href="{{ route('articles.show',$article) }}">{{ $article->title }}</a>
    <!-- ルート名articles.showでRoute：：get（’/article/｛article｝’,【ArticleController::class,’show’】）を参照している。これで特定の投稿の詳細ページのURLを生成できる。 -->
    <!-- ＄articleはforeachでつくった投稿一つ一つのデータが入っているインスタンスのこと。その中の主キーであるidを取得してURLに埋め込んでいる -->
</div>
<div class="ariticle-body">{{ $article->body }}</div>
<!-- アロー演算子でプロパティ（変数）やメソッド（関数）にアクセス出来る。$articleの中に収納されているtitle・bodyのみ抽出 -->
</article>
@endforeach
@endsection()