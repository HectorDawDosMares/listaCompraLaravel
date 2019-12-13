<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function users() {
        return $this->belongsToMany('App\User','producto_user')->withTimestamps();
    }
}
