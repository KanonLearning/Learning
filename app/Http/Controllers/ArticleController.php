<?php

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
        //  ・インスタンスメソッドはインスタンス->メソッド名()で呼び出す。
        // 
        // 
        // 
        // 【インスタンスメソッドの概要】
        //  ・staticが定義時に不要
        //  ・アクセス権限はつけなくていい（つけないならpublic扱い）
        //  ・インスタンスに対して呼び出して、インスタンス毎に固有の結果を返す
        // 
        // 
        // 【スタティックとインスタンスの違い】
        // 
        // 
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
        return view('articles.index , $data');
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
