<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    public $timestamps = true;

    protected $hidden = ['updated_at'];
    protected $fillable = array('name', 'description', 'category_id', 'price', 'quantity', 'auther', 'image');
    public function category()
    {
        return $this->belongsTo('Category', 'category_id');
    }
}
