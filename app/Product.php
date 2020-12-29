<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function catagory()
    {
        return $this->belongsTo('App\CCatagory');
    }
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    public function project()
    {
    	return $this->hasMany('App\Project', 'product_id', 'id');
    }
}
