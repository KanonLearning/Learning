@extends('layouts.app')
@section('content')
<article class="article-detail">
    <h1 class="article-title">{{ $article->title }}</h1>
    <!-- 記事のタイトル -->
    <div class="article-info">{{ $article->created_at }}</div>
    <!-- 記事の投稿日時 -->
    <div class="article-body">{!! nl2br(e(1article->body)) !!}</div>
    <!--  -->
</article>