<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        
        return view('home', compact('clients'));
    }

    // public function index(Request $request)
    //   {
    //     $request->user()->authorizeRoles(['master', 'project_m']);
    //     return view('home');
    //   }
}
