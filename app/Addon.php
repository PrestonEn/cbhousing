<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model {

	protected $table = 'addons';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','title', 'price', 'product_number' ,'desc', 'thumbnail', 'image'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id'];

}
