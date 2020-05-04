<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function rates()
    {
        return $this->hasMany('App\Rate');
    }
    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }
    public function lease()
    {
        return $this->belongsToMany('App\User', 'leases', 'book_id','user_id');
    }
}
