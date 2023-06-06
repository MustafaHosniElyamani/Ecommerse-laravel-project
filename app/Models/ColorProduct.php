<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{

    protected $table = 'color_product';
    public $timestamps = true;
    protected $fillable = array('color_id', 'product_id');

}
