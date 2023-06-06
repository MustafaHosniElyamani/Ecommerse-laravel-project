<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{

    protected $table = 'product_size';
    public $timestamps = true;
    protected $fillable = array('product_id', 'size_id');

}
