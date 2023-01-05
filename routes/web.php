<?php

// 最終的に作成したものをどうやって表示するか（URL）を決める　＝　ルーティング

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    //グルーピングをするためにRoute::groupという書き方をしている、ログインしている人しかホームも記事全般も見れないようにしている。
    Route::get('/home', [HomeController::class,'index'])->name('home');
    Route::resource('/articles', ArticleController::class);
    Route::post('/articles/{article}/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
    // ブックマークの登録
    Route::delete('/articles/{article}/unbookmark', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    // ブックマークの解除
    Route::get('/bookmarks', [ArticleController::class, 'bookmark_articles'])->name('bookmarks');
    // ブックマークした記事の一覧を表示
});

//

// 特定のものを除外する場合
// Route::resource('/articles',ArticleController::class,['except' => ['特定のメソッド']]);

// 使うモノだけを残す場合
// Route::resource('/articles',ArticleController::class, ['only' => ['特定のメソッドA','特定のメソッドB']);

// resource（）で下記のルーティング（CRUDするための基本的な７つ）を全て行える。

// 👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇

// Route::get('/articles', [ArticleController::class,'index'])->name('articles.index');
// // '/articles'はURL
// // [ArticleController::class,'index']は[クラス名 , アクション名（メソッド）]で出来ている。
// // name('articles.index')はルート自体の名前を決めているだけ


// Route::get('/articles/create', [ArticleController::class,'create'])->name('articles.create');
// // /articles/createはURL
// // [ArticleController::class,'create'] = ArticleControllerクラスの中のcreate()を（createメソッド）使用する
// // ->name('articles.create') = 今後bladeファイルで('articles.create')を書くだけで/article/createのページにアクセス出来る、リクエスト先にできる。ここで設定することで、URLの変更を余儀なくされた場合でもroute('name')はそのままでURL定義を変えるだけで済む。この方が柔軟に対応できる。


// Route::post('/articles', [ArticleController::class,'store'])->name('articles.store');
// // フォームデータが送られた送信先の送り先URLも定義しておかないと<form action='{{ route（’articles.store’） }}'が意味なくなっちゃう。使えなくなっちゃう。


// Route::get('/article/{article}', [ArticleController::class,'show'])->name('articles.show');
// // getはHTTPリクエストメソッドの一つ。”ブラウザ側がサーバーに対してだすお願い”のこと。getは訳すと”このページを頂戴”になる。

// // ｛article｝はパスパラメータを受け取るため。
// // そのデータの主キーとして設定されている値が入るため、今回は id が入る
// // ｛｝はそのままの文字列、つまり/articles/articleになってしまわないようにするため

// // パスパラメータとは特定なページ、サイト等を表示するために”パス”に書き込まれる”パラメータ”のこと。決して”渡す”のパスという意味ではない
// Route::get('/articles/{article}/edit',[ArticleController::class,'edit'])->name('articles.edit');
// // 編集画面の表示
// Route::patch('/articles/{article}',[ArticleController::class,'update'])->name('articles.update');
// // 編集内容を使ってアップデートする
// Route::delete('/articles/{article}', [ArticleController::class,'destroy'])->name('articles.destroy');
