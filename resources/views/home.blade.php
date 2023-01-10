@extends('layouts.app')
@section('content')
@include('commons.errors')
<h1>マイページ</h1>
<p>ようこそ、{{ Auth::user()->name }}さん | <a href="{{ route('articles.create') }}">記事を書く</a></p>
<!-- Authクラスにアクセスしている。ファサードという短い記述でアクセス可能にする機能がある。Authはデフォで備わっている。 -->
@include('articles.articles')
@endsection()