<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['eld', 'title', 'price'];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    // protected $dispatchesEvents = [
    //     'created' => ProductCreate::class,
    //     'updated' => ProductUpdate::class,
    // ];
}
