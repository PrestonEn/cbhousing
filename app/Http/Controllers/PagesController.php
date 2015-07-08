<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return view('welcome');
	}

	public function contact() {
		return view('footer');
	}

	public function about() {
		return view('about');
	}

	public function loyalty() {
		return view('loyalty');
	}

}
