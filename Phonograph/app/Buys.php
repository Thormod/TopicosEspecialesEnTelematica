<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Buys extends Model {

	//
	protected $table = 'buys';
	protected $fillable = ['buyed_by','file_id'];

  public function user(){
  	return $this->belongsTo('App\User');
  }
  public function files(){
  	return $this->hasMany('App\Files');
  }

}
