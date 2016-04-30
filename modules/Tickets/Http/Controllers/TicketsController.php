<?php namespace Modules\Tickets\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class TicketsController extends Controller {
	
	public function index()
	{
		return view('Tickets::index');
	}
	
}