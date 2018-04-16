<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
        'post_id',
        'user_id',
        'message',
    ];

    public function post()
    {return $this->belongsTo(post::class);}
    public function user()
    {return $this->belongsTo(user::class);}
}
