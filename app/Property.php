<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'properties';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
							'id', 
						    'rooms',
						    'title',
						    'distance',
						    'landlord',
						    'thumbnail',
						    'time_to_bus',
						    'landlord_email',
						    'property_type',
						    'description',
						    'posted_at',
						    'amenities',
					    	'address',
						    'image'
						];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id'];
}