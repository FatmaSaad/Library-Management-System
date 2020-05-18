<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    protected $fillable = array('user_id', 'book_id');

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
