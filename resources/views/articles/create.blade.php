@extends('layouts.app')
@section('content') 
@include('commons.errors')
<form action="{{ route('articles.store') }}" method="post">
<!-- route()はweb.phpで設定したnameを()内に記述することでそのページにアクセス（データを飛ばしたり、ページ遷移したりできる）できる -->
<!-- ｛｛｝｝はHTMLの記述の中にPHPのスクリプトを混ぜたいときに使える -->
<!-- method属性はどの方式で送るかを決める。今回はformタグ内のデータをarticlesフォルダのstore.blade.phpに”どの方式で送るのか”ということ -->
    @include('articles.form')
    <button type="submit">投稿する</button>
    <!-- ここのボタンを押すことでformのデータをarticles.storeに送れる -->
    <a href="{{ route('articles.index') }}">キャンセル</a>
    <!-- キャンセルを押すとarticlesフォルダのindexファイルで作成しているページに戻る -->
</form>
@endsection()
<!-- ＠section（）から＠endsection（）間の内容がlayoutsの＠yieldに送り込まれる -->