<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model {

	protected $table = 'files';
	protected $fillable = ['created_by', 'genre_id', 'name', 'file_path', 'cover', 'price'];

	public function artist(){
    	return $this->belongsTo('App\Artists');
  }

}
