<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function catagory()
    {
        return $this->belongsTo('App\CCatagory');
    }
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
