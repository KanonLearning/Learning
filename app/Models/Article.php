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
}
