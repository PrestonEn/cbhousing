<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'requests';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
							'user_id',
							'user_email',
							'posting_id',
							'property_id',
							'status',
							'rent',
							'move_in',
							'move_in',
							'json_receipt' 
						];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id','status',
							'total',
							'json_receipt' ];
}	