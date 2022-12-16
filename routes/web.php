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

Route::get('/articles',[ArticleController::class,'index'])->name('articles.index');
// '/articles'はURL
// [ArticleController::class,'index']は[クラス名 , アクション名（メソッド）]で出来ている。
// name('articles.index')はルート自体の名前を決めているだけ