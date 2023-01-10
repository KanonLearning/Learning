<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            // 整数にするためのbigInteger、正数のみにするためのunsigned
            $table->bigInteger('article_id')->unsigned();
            $table->timestamps();
            // created_atとupdated_at

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // user_idカラムを外部キーに設定　usersテーブルのidカラムを参照　削除時は参照しているブックマーク(bookmarks)も一緒に削除する
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            // 外部キーの設定と連鎖的に削除する処理の指定
            $table->unique(['user_id','article_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
};
