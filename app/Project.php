<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";
    public function picture()
    {
        return $this->hasMany('App\ProjectPicture');
    }
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    public function product()
    {
        return $this->belongsToMany('App\Product', 'product_project', 'project_id', 'product_id');
    }
    public function location()
    {
        return $this->hasOne('App\ProjectLocation');
    }

}
