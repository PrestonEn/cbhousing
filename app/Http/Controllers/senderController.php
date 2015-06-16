<?php namespace App\Http\Controllers;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Http\Request;

class senderController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function contactUs(Request $request)
	{
		$data['email'] = $request->input('email');
		$data['name'] = $request->input('name');
		$data['body'] = $request->input('body');
		
		Mail::send('emails.contact',['email'=>$data['email'],
									 'name'=>$data['name'],
									 'body'=>$data['body']], 
		function($message) use($data)
		{
		    $message->to('requests@cbhousing.ca', $data['name'])->subject($data['name'].' question');
		});	
		session()->flash('message', 'Your message has been sent! Watch for a reply form @cbhousing.ca!');
		session()->flash('title', 'Thanks for the email!');

		return redirect('/#contact');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postingRequest()
	{
		
	}


}
