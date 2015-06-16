<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCart extends Model {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'carts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
							'request_id',
							'item_name',
							'product_number',
							'item_price',
							'quantity'
						];

}	
