<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function catagory()
    {
        return $this->belongsToMany('App\MCatagory','mcatagory_media','media_id','mcatagory_id');
    }
    public function company()
    {
        return $this->belongsTo("App\Company");
    }
}
