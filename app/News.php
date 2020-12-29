<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function company()
    {
        return $this->belongsTo("App\Company");
    }
    public function catagory()
    {
        return $this->belongsToMany('App\MCatagory','catagory_news','news_id','mcatagory_id');
    }
    public function location()
    {
    	return $this->hasMany('App\NewsLocations');
    }
}
