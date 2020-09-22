<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCatagory extends Model
{
    protected $table = "mcatagory";
    public function media()
    {
        return $this->belongsToMany('App\Media','mcatagory_media','mcatagory_id','media_id');
    }
}
