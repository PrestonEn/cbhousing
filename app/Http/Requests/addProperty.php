<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class addProperty extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title'=> 'required',
			'email' => 'required|email|exists:landlords,email',
			'images[]' => 'image',
			'address' => 'required',
			'description' => 'required',
			'amenities' => 'required',
			'distance' => 'required',
			'time' => 'required'
			];
	}

}
