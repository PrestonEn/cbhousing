<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'postings';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable=['id',
						'title', 
						'locked', 
						'tenant_id', 
						'price', 
						'posting_type', 
						'property_id', 
						'available'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id'];
}
