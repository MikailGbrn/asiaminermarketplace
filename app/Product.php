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
    	return $this->belongsToMany('App\Project', 'product_project', 'product_id', 'project_id');
    }
    public function picture()
    {
        return $this->hasMany('App\ProductPicture');
    }
    public function category()
    {
        return $this->belongsToMany('App\PCategory','product_categories','product_id','pcategory_id');
    }
}
