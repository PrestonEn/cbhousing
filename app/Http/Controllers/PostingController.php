<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Redirect;
use Request;
use Session;
use Intervention\Image\Facades\Image;
use App\Http\Requests\addPosting;
use DB;
use Carbon\Carbon;
use App\Posting;
use App\property;

class PostingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$id = uniqid();
		$input = Request::all();


		Posting::create(['id'=>$id, 'title'=> $input['title'], 
						'posted_at'=>Carbon::now(),
						'price'=> $input['price'],
						'property_id' => $input['property_id'],
						'posting_type' => $input['property_type'],
						'available' => $input['available_date']
		]);


		if($input['property_type' ]=='apartment'){
			DB::table('apartment_postings')->insert(
					array('property_id' => $input['property_id'],
						  'posting_id' => $id,
						  'total' => $input['count']
			));
			$property = Property::findOrFail($input['property_id']);
			$property->rooms += $input['count'];
			$property->save();
		}else{
			$property = Property::findOrFail($input['property_id']);
			$property->rooms += 1;
			$property->save();
  	
		}


		$images = Input::file('images');
		foreach ($images as $file) {
		  $imgid = uniqid();		
	      $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
	      $validator = Validator::make(array('file'=> $file), $rules);
	      if($validator->passes()){
	        $destinationPath = 'uploads/'.$input['property_id'].'/'.$id;

	        $filename = $file->getClientOriginalName();
	       

	        $upload_success = $file->move($destinationPath, $filename);
	        
	        $img = Image::make($destinationPath.'/'.$filename);
			$img->fit(450, 450, function ($constraint) {
				$constraint->upsize();
			});    
			$thumpath = $destinationPath.'/'.'th_'.$filename; 
			$property_thumb = $thumpath; 	//insert to property model
			$img->save($thumpath);

	
	        DB::table('posting_images')->insert
	        (
	        	array('id' => $imgid, 
	        		  'location' => $destinationPath.'/', 
	        		  'file_name'=> $filename,
	        		  'posting_id' => $id));
	      
	      }
	    }
	    return redirect('admin/properties/'.$input["property_id"]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['p'] = Posting::findOrFail($id);
		$data['images'] = DB::table('posting_images')->where('posting_id',$id)->get();
		return view('admin/updatePosting')->with('data', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Req $request)
	{
		$posting=Posting::findOrFail($id);
		$posting->update($request->all());
		return redirect('/admin/postings');		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$pid = Posting::findOrFail($id)->property_id;
		Posting::destroy($id);
		return redirect('/admin/properties/'.$pid);		

	}

	public function lockPost($id){

		
	}

}
