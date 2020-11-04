<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CAddress extends Model
{
    protected $fillable = ['company_id','address','city','province'];
}
