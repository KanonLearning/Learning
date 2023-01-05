@extends('layouts.app')
@section('content')
<article class="article-detail">
    <h1 class="article-title">{{ $article->title }}</h1>
    <!-- 記事のタイトル -->
    <div class="article-info">{{ $article->created_at }}</div>
    <!-- 記事の投稿日時 -->
    <div class="article-body">{!! nl2br(e($article->body)) !!}</div>
    <!-- e（）は入力値をエスケープに処理するための関数。元々はhtmlspecialcharas（）という関数だが、laravelは短くしてくれている（laravelのヘルパー関数という機能の一つ） -->
    <!-- エスケープ処理とは、入力されたものをそのままの文字列として表示させることができる処理のこと””とか’’もエスケープ処理の一つ。これにより、害のあるリンクを無害化できる -->
    <!-- ｛！！ nl2br（） ！！｝は投稿者が入力欄に改行を加えた際に、それを読み取り、改行タグに変換するための関数 -->
    @can('update',$article)
    <!-- 権限のチェック。第一引数＝アクション名、第二引数＝チェックするインスタンス（ガワ） -->
    <div class="article-control">
        <a href="{{ route('articles.edit',$article) }}">編集</a>
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('articles.destroy', $article) }}" method="POST">
        <!-- 削除ボタン。onsubmitで確認のダイアログが出るようにする。confirm（）の第一引数でダイアログに出で来るメッセージを決めている。 -->
            @csrf
            @method('delete')
            <button type="submit">削除</button>
        </form>
        <a href="{{ route('articles.index') }}">ホームに戻る</a>
    </div>
    @endcan
</article>
@endsection