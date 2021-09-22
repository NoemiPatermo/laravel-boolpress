<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   public function post() {  //NON ha la FK quindi useremo hasMany
    return $this->hasMany(Post::class);
   } 

}
