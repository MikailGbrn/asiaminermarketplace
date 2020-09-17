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
}
