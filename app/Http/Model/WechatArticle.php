<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class WechatArticle extends Model
{
    protected $table = 'wechat_article';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'cover',
        'content',
        'author'
    ];
}
