<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    public $timestamps = true;

    protected $hidden = ['updated_at'];
    protected $fillable = array('name', 'description', 'category_id', 'price', 'quantity', 'auther', 'image');
    public $with=['category'];
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function rates()
    {
        return $this->hasMany('App\Models\Rate');
    }
    // public function getUserFavouriteAttribute()
    // {
    //     $current_user_id = 0;
    //     if (auth('jwt')->check() || auth()->check()) {
    //         $current_user_id = auth('jwt')->user()->id ?? auth('web')->user()->id;
    //     }
    //     $user_favourites = $this->favourites->pluck('id');

    //     return $user_favourites->contains($current_user_id);
    //     //  return $this->morphMany('App\Models\Image', 'model');
    // }

}
