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
    <div class="article-control">
        <a href="{{ route('articles.edit',$article) }}">編集</a>
    </div>
    <div class="return">
        <a href="{{ route('articles.index') }}">ホームに戻る</a>
    </div>
</article>