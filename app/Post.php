<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category() { //qui hai la FK
        return $this->belongsTo(Category::class);//indichi a chi appartiene

    }
}