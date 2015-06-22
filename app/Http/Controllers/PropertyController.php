<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request as Req;
use Illuminate\Pagination\PaginationServiceProvider;
use Input;
use Validator;
use Redirect;
use Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\addProperty;
use DB;
use Carbon\Carbon;
use App\Property;
use App\Landlord;
use App\Posting;
use App\ApartmentProperty;


class PropertyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Property::paginate(12);

		foreach ($pages as $house) {
			if($house->property_type == 'apartment'){
				$apts = ApartmentProperty::where('property_id','=',$house->id)->get();
				$count = 0;
				foreach ($apts as $apt) {
					$count += ($apt->total - $apt->filled);
				}
				$data[$house->id] = $count;
			}else{
				$data[$house->id] = $house->rooms;
			}
		}
		$data['pages'] = $pages;
		
		return view('/postings')->with('data',$data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		$data['property'] = Property::findOrFail($id);
		$data['property_images'] = DB::table('property_images')->where('property_id',$id)->get();
		$data['rooms'] = DB::table('postings')->where('property_id',$id)->get();
		if(array_key_exists('rooms', $data)){
			foreach ($data['rooms'] as $room) {
				$data[$room->id] = DB::table('posting_images')->where('posting_id',$room->id)->get();
			}
		}
		
		return view('singlelisting')->with('data', $data);		
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(addProperty $request)
	{

		$id = uniqid();
		$input = Request::all();
		Property::create(['id'=>$id, 'title'=> $input['title'], 'landlord_email'=>$input['email'], 'address'=>$input['address'],
						 'description'=>$input['description'], 'amenities'=>$input['amenities'], 'posted_at'=>Carbon::now(),
						  'property_type'=>$input['property_type'], 'time_to_bus'=>$input['time'], 'distance'=>$input['distance']]);
		mkdir("uploads/".$id);
	    // getting all of the post data
	    $files = Input::file('images');
	    // Making counting of uploaded images
	    $flag = false;

	    foreach ($files as $file) {
	    	# code...
	    
	    	$imageid = uniqid();
	    			      $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
      $validator = Validator::make(array('file'=> $file), $rules);
      if($validator->passes()){
	    	$rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'

	        		$destinationPath = 'uploads/'.$id.'_';
			        $filename = $file->getClientOriginalName();
			        $filename = $id.$filename;
			        $upload_success = $file->move($destinationPath, $filename);
			        $property_img = $destinationPath.'/'.$filename;//insert to property model
			        if(!$flag){
			        	$val =$property_img;
			        }
			        //make thumbnail
			        $img = Image::make($destinationPath.'/'.$filename);
					$img->resize(450, 450);    
					$thumpath = $destinationPath.'/'.'th_'.$filename; 
					$property_thumb = $thumpath; 	//insert to property model
					$img->save($thumpath);
					if(!$flag){
			        	$vala =$property_img;
			        	$valb = $thumpath;
			        }
					DB::table('property_images')->insert
			        (
			        	array('id' => $imageid, 
			        		  'location' => $destinationPath.'/', 
			        		  'file_name'=> $filename,
			        		  'property_id' => $id)
			        );
			    }
			}

	   

			        DB::table('properties')->where('id',$id)
			        ->update(['image'=>$vala, 'thumbnail'=>$valb]);

	    return redirect('admin/properties/'.$id); 
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		
		$data['p'] = Property::findOrFail($id);
		$data['l'] = Landlord::All();
		$data['images'] = DB::table('property_images')->where('property_id','=',$id)->get();
		
		return view('admin/updateProperty')->with('data', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Req $request)
	{
		$property=Property::findOrFail($id);
		$property->update($request->all());
		return redirect('/admin/properties');	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	Property::destroy($id);
	return redirect('/admin/properties');	
	}

}
