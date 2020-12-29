<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLocations extends Model
{	
	protected $table = 'project_locations';
    protected $fillable = ['project_id','city','province'];
}


 ?>