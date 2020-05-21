<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body', 'user_id', 'book_id',
    ];
    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
