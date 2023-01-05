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
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
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
        return view('articles.index', $data);
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
        $article = new Article();
        // インスタンスをここで生成（newが入っていることに注目）。＄articleがフォームに書かれたものを入れる容器の役割を持つ
        // newによってArticleクラスという設計図に合わせて＄articleというモノを作る感じ。
        $data = ['article' => $article];
        // viewに渡してあげるために、$dataに入れてあげる
        // ここの【'article' ＝＞ $article】は連想配列で、keyの’article’で＄articleの中身を呼び出せるようにしている
        return view('articles.create', $data);
        // articlesフォルダのcreateファイルに$dataを渡してあげる
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            // titleの中はこんな条件だよ👉requrired = 必須項目だよ　　｜ = かつ　　max:255 = 文字数のmaxは255文字までだよ
            'body' => 'required'
            // bodyは必須項目だよ
        ]);
        $article = new Article();
        //ここで$articleというモノのガワ（インスタンス）をArticle（）という設計図（クラス）をもとに生成している
        // ここではArticle.php（model）をもとにインスタンスを生成、つまり、インスタンスなんて名前が付いてはいるが$articleの中身はclass Article である。で、下記のプロパティ決めで、Article.phpには影響しない形でclass Articleの中身を拡張しているイメージ。
        $article->user_id = \Auth::id();
        // \Authは使えなかった。代わりに「use Auth.phpの相対パス」をうえに書き込むことでエラーが出なくなった。
        $article->title = $request->title;
        // インスタンス->プロパティ名 = 値
        // $articleというインスタンスのプロパティ$titleに$request（フォームデータ）のname="title"を当てはめる
        $article->body = $request->body;
        // 上でtitleに対してやっていることのbody（本文）バージョン
        $article->save();
        // formのデータを保存する
        // modelクラスにすでにCRUDのためのメソッドが用意されているためわざわざSQLを書く必要がない。



        // 【大事】上記でガワ（インスタンス）を生成され、インスタンス->プロパティ名 = 値でプロパティを決められたモノの総称（＄article）をオブジェクトという



        return redirect(route('articles.index'));
        // コントローラーではreturn view でレスポンスを返すかreturn redirectでリクエストを作り直す
        // 今回はredirectでデータの登録・更新・削除等をしてリクエスト
        //view()はブレードファイルと渡す値や変数などを指定してファイルの内容を表示させる
        //redirect()はURLもしくはあらかじめ作られているルート名を指定し、コントローラーの処理（CRUDのCUD部分） ＋ ブレードファイルの内容を表示させる（CRUDのR部分）
        // 全ての処理を終えた後に表示されるURLは/Articlesになる
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    // Articleクラス（Articleインスタンス）を経由して＄articleを受け取っている
    // 
    {
        $data = ['article' => $article];
        return view('articles.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize($article);
        // 他人（記事を投稿していない人間）の手で勝手に編集できないようにする
        $data = ['article' => $article];
        return view('articles.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    // Requestクラス自体が引数でその中身を使うときは＄request（インスタンス）を使ってね。っていう意味。
    // Articleというクラスを引数としてセットしているけど、＄article（インスタンス）を使ってね。という意味。
    {
        $this->authorize($article);
        // 勝手に更新できないように
        $this->validate($request,[
           'title' => 'required|max:255',
           'body' => 'required' 
        ]);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();
        // ＄articleというインスタンスのプロパティを決めて、modelにあるsave（）を使って保存。
        return redirect(route('articles.show',$article));
        // controllerの処理をしたうえで、route()に紐づいているブレードファイルを表示する
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize($article);
        // 勝手に削除できないように
        $article->delete();
        return redirect(route('articles.index'));
    }

    public function bookmark_articles()
    {
        $articles = \Auth::user()->bookmark_articles()->orderBy('created_at', 'desc')->paginate(10);
        // ログインユーザーがブックマークしたものを日付の降順で並べる。１ページあたり１０件に区切る。
        $data = [
            'articles' => $articles,
            // 連想配列に取得した記事データを格納
            // articlesがキーとなる
        ];
        return view('articles.bookmarks', $data);
    }
}
