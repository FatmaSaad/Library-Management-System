<?php

namespace App;
// use App\Category;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    public $timestamps = true;

    protected $hidden = ['updated_at'];
    protected $fillable = array('name', 'description', 'category_id', 'price', 'quantity', 'auther', 'image');
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function rates()
    {
        return $this->hasMany('App\Rate');
    }
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
