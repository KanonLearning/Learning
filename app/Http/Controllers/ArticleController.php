<?php

// コントローラーはその名の通りメソッドなどを使う機能、どのタイミングでどのように扱うのかを明記する場所



// 仲介役、データを追加・読みとり・viewで使えるように整形して送るなどいろんなことができる
//modelに対して行う操作の例、
// all()：全てのデータを取得
// find()：指定したidのレコードを取得
// get()：結果の取得
// where('フィールド名','条件')：指定したフィールド名のカラムから条件にあうものを取得
// where('フィールド名','不等号','条件')：指定したフィールド名のカラムから条件にあうものを取得
// toArray()：配列に変換する
// count()：数を数える、その結果を取得
// max()：最大値を取得
// sum()：合計値を取得
// 
// 
// ※これらはもともとallの持ち物（メソッド）でこの中で指定して操作を行う






namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        // Article（モデルクラス(app\Models\Article.php)）のall()(今回はスタティックメソッド)を呼び出している。
        // Articleクラスに紐づいているテーブルに対して、レコードの全取得を行うSQLを実行
        // 今回はそれの戻り値を$ariclesに代入している
        //
        // 【補足説明】
        //  ・::all()という表記はスタティックメソッドを呼び出すときの書き方。クラス::メソッド名で書く
        //  ・allメソッドによって
        //
        //
        //
        // 【スタティックメソッドの概要】
        //  ・定義時にstaticを付けること
        //  ・アクセス権限が必須
        //
        //
        //
        //
        // 【インスタンスメソッドの概要】
        //　・staticが定義時に不要
        //　・アクセス権限はつけなくていい（つけないならpublic扱い）
        //　・インスタンスに対して呼び出して、インスタンス毎に固有の結果を返す
        //　・インスタンスメソッドはインスタンス->メソッド名()で呼び出す。
        //
        //
        // 【スタティックとインスタンスの違い】
        //　・メソッドづくりの際のstaticの有無
        //　・アクセス権限がつけられるか否か
        //　・
        //
        //
        // 【 インスタンスに関して。その他知識 】
        //  ・クラス定義を書いただけではクラスは使えない。例の$a = new hoge();のようにnewという演算子を使ってインスタンスを生成する
        //  ・クラス定義内に書かれている関数をメソッド（hoge(){処理]みたいなこと）
        //  ・クラス内に書かれている変数のことをプロパティ（$hogehoge = aa ;のようなこと）
        //
        //
        //　-----------------------------------
        //  【例】
        //
        // 　 class hoge{
        //    　・メソッドの宣言
        // 　 　・プロパティの宣言
        //  　}
        //
        // 　 $a = new hoge();
        //    var_dump($a)
        // ------------------------------------
        //
        //
        $data = ['articles' => $articles];
        //上の$articles（記事の一覧データ）を連想配列にして$data変数の中に入れている。今後は$data['articles']で記事の一覧を呼び出せる
        //キーは添字（0とか1とか）の代わりに使う名前。今回はarticlesがキーとなる。
        return view('articles.index' , $data);
        //view()はビューにデータを渡してHTMLを生成する。引数はそれぞれ（'使用するテンプレートファイル今回はarticlesフォルダの中のindex.blade.phpを使う。'　,　'ビューに渡すデータ、今回は記事一覧のデータ'）
        //使用するファイルを示すときは（フォルダ名.使用するbladeファイル（.blade.phpは省略））の形式
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
