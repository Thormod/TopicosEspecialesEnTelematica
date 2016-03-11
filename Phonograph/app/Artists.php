<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Artists extends Model {

	//
	protected $fillable = ['name','image'];

	public function files(){
    	return $this->hasMany('App\File');
  }

}
