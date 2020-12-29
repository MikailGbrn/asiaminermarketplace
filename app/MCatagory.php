<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCatagory extends Model
{
    protected $table = "mcatagory";
    public function media()
    {
        return $this->belongsToMany('App\Media','mcatagory_media','media_id','mcatagory_id');
    }
    public function news()
    {
        return $this->belongsToMany('App\News','catagory_news','news_id','mcatagory_id');
    }
}
