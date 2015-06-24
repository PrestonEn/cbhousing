<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request as Req;
use Input;
use Validator;
use Redirect;
use Request;
use App\Http\Requests\addLandlord;
use Intervention\Image\Facades\Image;
use App\Landlord;
use DB;
use Mail;
//use App\Property;

class LandlordController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin/landlords');	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/landlords');	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(addLandlord $request)
	{ 

		$id = uniqid();
		$input = Request::all();
		Landlord::create(['id'=>$id, 'name'=> $input['name'], 'email'=>$input['email'], 'phone'=>$input['phone']]);
		session()->flash('added', 'You have added '.$input['name'].' to the landlords database!');
		return redirect('admin/landlords');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$landlord=Landlord::findOrFail($id);
		return view('/admin/updateLandlord')->with('landlord',$landlord);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Req $request)
	{
		$landlord=Landlord::findOrFail($id);
		$landlord->update($request->all());
		return redirect('/admin/landlords');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Landlord::destroy($id);
		return redirect('/admin/landlords');

	}

}
