<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function is_bookmark($articleId)
    {
        return $this->bookmarks()->where('article_id',$articleId)->exists();
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function bookmark_articles()
    {
        return $this->belongsToMany(Article::class, 'bookmarks','user_id','article_id');
        // 引数１＝対象クラス　引数２＝使用テーブル　引数３＝自分側の保持IDをカラムで　引数４＝相手側の保持IDをカラムで
    }

    public function articles(){
        return $this->hasMany(Article::class);
        // 自分が投稿した記事のみをマイページで表示することができる
        // 自分を一、引数に入れたArticleクラスのインスタンスを多とすることで、一が投稿した複数の記事データが$thisと関連付けて取得できる。
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
