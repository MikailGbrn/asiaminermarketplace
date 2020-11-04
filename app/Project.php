<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function picture()
    {
        return $this->hasMany('App\ProjectPicture');
    }
    public function company()
    {
        return $this->belongsTo('App\Company');
    }


}
