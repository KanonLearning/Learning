<?php

// コントローラーとDBの間にいる
// 一つのテーブルに一つのmodelがある 
// DBのデータを捜査する実装の機能とビジネスロジックを持つ

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
        // 記事の投稿者に関するデータをArticleインスタンス（＄this）に関連付けて取得できる
    }
}
