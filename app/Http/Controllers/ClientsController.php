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
        $user_id = $client->user_id;
        $creator = User::find($user_id);

        foreach ($client->get_responsable as $pm) {
            $resp = $pm->pivot->user_id;
        }

        $responsable = User::find($resp);

    	return view('clients.show', compact('client','creator','responsable'));
    }

    public function create(){

        $proj_m = User::all();
    	return view('clients.create', compact('proj_m'));
    }

    public function store(Request $request){
    	
    	//Create a new post using the request data

        $client = new Client(request(['business_name', 'tradename', 'street', 'exterior_num', 'interior_num', 'colony', 'region', 'city', 'zip_code', 'country', 'rfc', 'main_contact', 'main_c_phone', 'main_c_email', 'billing_contact', 'billing_c_phone', 'billing_c_email']));

        auth()->user()->publish($client);

        //Save creator of client as responsable on client_user
        auth()->user()->responsable($client);

        $client->p_managers()->updateExistingPivot(auth()->id(), ['responsable' => 1]);

        //Save project_managers on client_user
        $user_id = $request->input('proj_man');

        $client->p_managers()->attach($user_id);

    	//And then redirect to the homepage

    	return redirect('/');
    }
}
