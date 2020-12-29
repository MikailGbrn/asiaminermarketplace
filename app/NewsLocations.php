<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLocations extends Model
{	
	protected $table = 'news_locations';
    protected $fillable = ['news_id','city','province'];
}


 ?>