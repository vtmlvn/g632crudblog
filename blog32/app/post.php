<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['title', 'content', 'category_id', 'slug'];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function comment(){
        return $this->hasMany(comment::class);
    }
}
