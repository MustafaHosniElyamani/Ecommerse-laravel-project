<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    protected $table = 'Colors';
    public $timestamps = true;
    protected $fillable = array('name');

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }

}
