<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminCompanies extends Model
{
	protected $table = "admin_companies";
    public function company() 
    {
    	return $this->hasOne("App\Company");
    }
}
