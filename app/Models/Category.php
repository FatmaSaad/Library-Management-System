<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = true;

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = array('name');
}
