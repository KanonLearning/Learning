@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('articles.update',$article) }}" method="POST">
    <!-- HTMLにおいてmethodにはpostかgetしか指定できない -->
    @method('patch')
    <!-- これによって隠しパラメータとして裏で＿method=patchというPATCHメソッドを送っている。 -->
    <!-- patchメソッドは更新のためのメソッド -->
    @include('articles.form')
    <button type="submit">更新する</button>
    <a href="{{ route('articles.show',$article) }}">キャンセル</a>
    <a href="{{ route('articles.index') }}">ホームに戻る</a>
</form>
@endsection()