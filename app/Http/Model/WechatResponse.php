<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class WechatResponse extends Model
{
    protected $table = 'wechat_response';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'content',
    ];
}
