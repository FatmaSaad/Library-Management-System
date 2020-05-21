<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }
    protected $fillable = array('user_id', 'book_id');

}
