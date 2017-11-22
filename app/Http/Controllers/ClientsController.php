<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;

class ClientsController extends Controller
{   
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){
    	return view('clients.index');
    }

    public function show($id){

        $client = Client::find($id);
        

    	return view('clients.show', compact('client'));
    }

    public function create(){

        $proj_m = User::all();
    	return view('clients.create', compact('proj_m'));
    }

    public function store(){
    	
    	//Create a new post using the request data

        auth()->user()->publish(
    	   	new Client(request(['business_name', 'tradename', 'street', 'exterior_num', 'interior_num', 'colony', 'region', 'city', 'zip_code', 'country', 'rfc', 'main_contact', 'main_c_phone', 'main_c_email', 'billing_contact', 'billing_c_phone', 'billing_c_email']))
    	);



    	//And then redirect to the homepage

    	return redirect('/');
    }
}
