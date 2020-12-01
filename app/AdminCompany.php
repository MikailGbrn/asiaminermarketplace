<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminCompany extends Authenticatable
{
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',
        'company_id'
  ];
  protected $hidden = [
       'password', 'remember_token'
  ];
  protected $guard = 'admin-company';
  
  public function setPasswordAttribute($val)
  {
       return $this->attributes['password'] = bcrypt($val);
  }
}
