<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ApartmentProperty extends Model {

	protected $table = 'apartment_postings';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['posting_id',
							'property_id',
							'total',
							'filled'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

}
