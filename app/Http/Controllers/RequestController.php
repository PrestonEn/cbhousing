<?php namespace App\Http\Controllers;
use Auth;
use App\Http\Requests\submitRequest;
use DB;
use Mail;
use Request as Req;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Property;
use App\Posting;
use App\Addon;
use App\BookRequest;
use App\RequestCart;
use Illuminate\Http\Request;

class RequestController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */	
	public function indexRequests()
	{
	
		$requests = BookRequest::All();
			$data['requests']=$requests;
		foreach($requests as $request){
			$sum = $request->rent*2;
			$data[$request->id."cart"] = RequestCart::where('request_id',$request->id)->get();
			if($data[$request->id."cart"] != NULL){
				foreach ($data[$request->id."cart"] as $items) {
					$sum=$sum+($items->item_price*$items->quantity);
				}
			}
		}
	}

	


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		if(Auth::user()){
			$data['posting'] = Posting::findOrFail($id);
			$data['property'] = Property::findOrFail($data['posting']->property_id);
			$data['addons'] = Addon::all();

			return view('Booking.checkout')->with('data',$data);
		}else{
			return view('errors.lost');
		}

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(submitRequest $request)
	{
		$user = Auth::user();
		$data = $request->all();
		$posting = Posting::findOrFail($data['posting_id']);
		$title = $posting->title;
		if($posting->locked){
			return redirect('errors/firstComeFirstServer');
		}
		$posting->locked = true;
		$posting->save();
		$sum = $posting->price * 2;
		$booking = BookRequest::create(['user_id'=>$user->id,
								'user_email'=>$user->email,
								'property_id'=>$posting->property_id,
								'posting_id'=>$data['posting_id'],
								'status'=>0,
								'rent'=>$posting->price
								]);

		

		$addons_all = Addon::All();
		
		$addons = null;
		foreach($addons_all as $addon){
			if($data[$addon->id.'_count']>0){
				$addons[$addon->id] = array('id'=>$addon->id, 
											'title'=>$addon->title, 
											'price'=>$addon->price, 
											'pid'=>$addon->product_number, 
											'quant'=>$data[$addon->id.'_count']);
				$sun = $sum+($addon->price*$data[$addon->id.'_count']);
				DB::table('carts')->insert(['request_id'=>$booking->id,
										   'item_name'=>$addons[$addon->id]['title'],
										   'product_number'=>$addons[$addon->id]['pid'],
										   'quantity'=>$data[$addon->id.'_count'],
										   'item_price'=>$addon->price]);

			}
		}

		$outdata['total'] = $sum;
		$outdata['title'] = $title;
		$outdata['addons'] = $addons;
		$outdata['booking'] = $booking;
		$outdata['user'] = $user;



		
		Mail::send('emails.requestSent',['outdata'=>$outdata], 
		
		function($message) use($outdata)
		{
		    $message->to('p.engstrom94@gmail.com', 'test')->subject('yotsdf');
		});	

		Mail::send('emails.userRequested',['outdata'=>$outdata], 
		function($message) use($outdata)
		{
		    $message->to('requests@cbhousing.ca', $outdata['user']->email);
		});	
		return redirect('/properties');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function approve(Req $request, $id)
	{

		$bookReq = BookRequest::findOrFail($id);
		$property =  Property::findOrFail($bookReq->property_id);
		if($property->property_type == 'apartment'){
			
		}
		$bookReq->status = 1;
		$bookReq->save();
		Mail::send('emails.requestAccepted',['email'=>$data['email'],
									 'name'=>$data['name'],
									 'body'=>$data['body']], 
		function($message) use($data)
		{
		    $message->to('requests@cbhousing.ca', $data['name'])->subject($data['name'].' question');
		});	


	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deny(Req $request, $id)
	{
		
		$bookReq = BookRequest::findOrFail($id);
		$bookReq->destroy();
		Mail::send('emails.contact',['email'=>$data['email'],
									 'name'=>$data['name'],
									 'body'=>$data['body']], 
		function($message) use($data)
		{
		    $message->to('requests@cbhousing.ca', $data['name'])->subject($data['name'].' question');
		});	
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

		/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function paid($id)
	{
		
	}
}
