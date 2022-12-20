<?php

// 最終的に作成したものをどうやって表示するか（URL）を決める　＝　ルーティング

use App\Http\Controllers\ArticleController;
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

Route::get('/articles', [ArticleController::class,'index'])->name('articles.index');
// '/articles'はURL
// [ArticleController::class,'index']は[クラス名 , アクション名（メソッド）]で出来ている。
// name('articles.index')はルート自体の名前を決めているだけ


Route::get('/articles/create', [ArticleController::class,'create'])->name('articles.create');
// /articles/createはURL
// [ArticleController::class,'create'] = ArticleControllerクラスの中のcreate()を（createメソッド）使用する
// ->name('articles.create') = 今後bladeファイルで('articles.create')を書くだけで/article/createのページにアクセス出来る、リクエスト先にできる。ここで設定することで、URLの変更を余儀なくされた場合でもroute('name')はそのままでURL定義を変えるだけで済む。この方が柔軟に対応できる。


Route::post('/articles', [ArticleController::class,'store'])->name('articles.store');
// フォームデータが送られた送信先の送り先URLも定義しておかないと<form action='{{ articles.store }}'が意味なくなっちゃう。使えなくなっちゃう。


Route::get('/article/{article}',[ArticleController::class,'show'])->name('articles.show');
// getはHTTPリクエストメソッドの一つ。”ブラウザ側がサーバーに対してだすお願い”のこと。getは訳すと”このページを頂戴”になる。

// ｛article｝はパスパラメータを受け取るため。
// そのデータの主キーとして設定されている値が入るため、今回は id が入る
// ｛｝はそのままの文字列、つまり/articles/articleになってしまわないようにするため

// パスパラメータとは特定なページ、サイト等を表示するために”パス”に書き込まれる”パラメータ”のこと。決して”渡す”のパスという意味ではない
