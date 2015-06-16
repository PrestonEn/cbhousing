<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request as Req;
use Input;
use Validator;
use Redirect;
use Request;
use App\Http\Requests\addAddon;
use Intervention\Image\Facades\Image;
use App\Addon;
use DB;
//use App\Property;

class AmenitiesController extends Controller {

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
	public function store(addAddon $request)
	{
		$id = uniqid();
		$input = Request::all();
	    $file = Input::file('image');
		$imageid = uniqid();		
    	$rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
		$destinationPath = 'uploads/addons/'.$id.'_';
        $filename = $file->getClientOriginalName();
        $filename = $id.$filename;
        $upload_success = $file->move($destinationPath, $filename);
        $addon_img = $destinationPath.'/'.$filename;//insert to property model
        //make thumbnail
        $img = Image::make($destinationPath.'/'.$filename);
		$img->fit(200, 200, function ($constraint) {
			$constraint->upsize();
		});    
		$thumpath = $destinationPath.'/'.'th_'.$filename; 
		$property_thumb = $thumpath; 	//insert to property model
		$img->save($thumpath);
		Addon::create(['id'=>$id, 
					   'title'=> $input['title'], 
					   'product_number'=> $input['product_number'],
					   'desc'=>$input['description'], 
					   'image'=>$addon_img, 
					   'thumbnail'=>$thumpath,
					   'price'=>$input['price']]);
		
		session()->flash('added', 'You have added '.$input['title'].' to the amenities database!');
		return redirect('admin/amenities');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$amenity = Addon::findOrFail($id);
		return view('/admin/updateAmenity')->with('amenity', $amenity);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Req $request)
	{
		$amenity=Addon::findOrFail($id);
		$amenity->update($request->all());
		return redirect('/admin/amenities');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
