<?php namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Request as Req;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Property;
use App\User;
use App\Posting;
use App\Landlord;
use App\Addon;
use App\BookRequest;
use App\RequestCart;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;


class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('/admin/adminHome');
	}

	public function requests()
	{

		$data['requests'] = BookRequest::All();
		foreach ($data['requests'] as $request) {
			$cart = RequestCart::where('request_id',$request->id)->get();
			if($cart == []){}
			else{
				$data[$request->id]=$cart;
			}
		}
		return view('/admin/requests')->with('data', $data);
	}

	public function postings()
	{
		$postings = Posting::All(); 
		return view('/admin/postings');
	}

	public function users()
	{
		$users = User::All();
		return view('/admin/users')->with('users', $users);
	}

	public function landlords()
	{

		$landlords = Landlord::All();
		return view('/admin/landlords')->with('landlords', $landlords);
	}

	public function properties()
	{
		$properties = Property::All();
		$landlords = Landlord::All();
		$data['p'] = $properties;
		$data['l'] = $landlords;

		return view('/admin/properties')->with('data', $data);
	}

	public function show_property($id)
	{
		// get property with given id
		$data['property_id'] = $id;
		$data['property'] = Property::find($id);

		if(is_null($data['property'])){
			abort(404);
		}
		$data['rooms']  =  Posting::where('property_id','=',$id)->get();

		foreach($data['rooms'] as $room){
			$data[$room->id] = DB::table('posting_images')
							   ->where('posting_id',$room->id)->get();
		}

		return view('admin.viewproperty')->with('data',$data);
	}
	
	public function show_posting($id)
	{
		// get property with given id
		$data['posting_id'] = $id;
		$data['posting'] = Posting::find($id);

		$data['images'] = DB::table('posting_images')->where('posting_id','=',$id)->get();
		if(is_null($data['property'])){
			abort(404);
		}
		$data['rooms']  =  Posting::where('posting_id','=',$id)->get();
		 
		return view('admin.viewposting')->with('data',$data);
	}

	public function amenities()
	{
		$addons = Addon::All();
		
		return view('/admin/amenities')->with('addons', $addons);
	}

	public function addPropertyImg($id){
		$files = Input::file('images');
	    // Making counting of uploaded images
	    $flag = false;

		foreach ($files as $file) {
		    	# code...
		
		$imageid = uniqid();
	    $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
	    $validator = Validator::make(array('file'=> $file), $rules);
	    if ($validator->fails())
			{
			    return redirect('admin/updateProperty/'.$id);			}
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
				$img->fit(300, 300, function ($constraint) {
					$constraint->upsize();
				});    
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
		return redirect('/admin/properties/'.$id);
	}

	public function addPostingImg($id){
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
				$img->fit(300, 300, function ($constraint) {
					$constraint->upsize();
				});    
				$thumpath = $destinationPath.'/'.'th_'.$filename; 
				$property_thumb = $thumpath; 	//insert to property model
				$img->save($thumpath);
				if(!$flag){
		        	$vala =$property_img;
		        	$valb = $thumpath;
		        }
				DB::table('posting_images')->insert
		        (
		        	array('id' => $imageid, 
		        		  'location' => $destinationPath.'/', 
		        		  'file_name'=> $filename,
		        		  'posting_id' => $id)
		        );
		    }
		}
		return redirect('/admin/updatePosting/'.$id);
	}

}
