<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    Public function category() {
      return $this->belongsTo('App\Category');
    }
}
