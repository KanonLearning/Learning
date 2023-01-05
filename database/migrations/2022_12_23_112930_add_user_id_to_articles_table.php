<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            // テーブルに追加する名前と設定の定義、biginteger=桁数の多い整数型を指定、user_id=カラム名、unsigned（）=正の数＋符号なし、
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // foreign=外部キー、reference=参照カラムの指定、onDelete('cascade')=連鎖的にそのユーザーを参照している記事も一緒に消える
            // 外部キーとは例えば売上テーブルと商品テーブルがあったとして同じカラムである商品名とかを指定できる。そうすることで、商品テーブルに無い名前の者は売り上げテーブルに載せられないようにするとかができる。管理するうえでかなり楽になるが、これが原因でテーブルが消せない時もある。
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    // ロールバック時に実行されル処理
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('article_user_id_foreign');
            // 外部キーの制約がついてるカラムを消すために、まず外部キーから取り除く
            $table->dropColumn('user_id');
            // その後にカラムの削除
        });
    }
};
