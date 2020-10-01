<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function catagory()
    {
        return $this->belongsToMany('App\MCatagory','mcatagory_media','mcatagory_id','media_id');
    }
    public function company()
    {
        return $this->belongsTo("App\Company");
    }
}
