<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'eld'];
    
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
