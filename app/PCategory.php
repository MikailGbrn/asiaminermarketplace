<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PCategory extends Model
{
   	protected $table = 'pcategories';
    public function product()
    {
        return $this->belongsToMany('App\Product','product_categories','product_id','pcategory_id');
    }
}
