<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{
    public $timestamps = false;
    protected $table = "product_pictures";
    protected $fillable = ['photo'];
}
