<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function address()
    {
        return $this->hasMany('App\CAddress');
    }
    public function media()
    {
        return $this->hasMany('App\Media');
    }
    public function product()
    {
        return $this->hasMany('App\Product');
    }
    public function news()
    {
        return $this->hasMany('App\News');
    }
    public function project()
    {
        return $this->hasMany('App\Project');
    }
    public function admin()
    {
        return $this->hasOne('App\AdminCompany');
    }
    public function catagory()
    {
        return $this->belongsTo('App\CCatagory');
    }
}
