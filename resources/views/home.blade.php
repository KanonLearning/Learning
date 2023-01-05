@extends('layouts.app')
@section('content')
@include('commons.errors')
<h1>マイページ</h1>
<p>ようこそ、{{ \Authuser()->name }}さん | <a href="{{ route('articles.index') }}">記事一覧へ</a></p>
<!-- Authクラスにアクセスしている。ファサードという短い記述でアクセス可能にする機能がある。Authはデフォで備わっている。 -->
include('artices.articles')
@endsection()