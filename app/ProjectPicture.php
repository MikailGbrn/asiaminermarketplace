<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPicture extends Model
{
    public $timestamps = false;
    protected $table = "project_picture";
    protected $fillable = ['photo'];
}
