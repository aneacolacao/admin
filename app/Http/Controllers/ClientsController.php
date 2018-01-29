<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Client;
use App\User;
use Session;
use Log;
use Illuminate\Http\Request;

class ClientsController extends Controller
{   
    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
    	return view('clients.index');
    }

    public function show($id){

        $client = Client::findOrFail($id);
        $user_id = $client->user_id;
        $creator = User::find($user_id);

        foreach ($client->get_responsable as $pm) {
            $resp = $pm->pivot->user_id;
        }

        $responsable = User::find($resp);

        $projects = $client->get_proj_ms;

    	return view('clients.show', compact('client','creator','responsable', 'projects'));
    }

    public function create(){

        $proj_m = User::whereHas(
                'roles', function($query) {
                    $query->where('role_id', '=', '1');

        })->whereNotIn('id', [auth()->id(), 0])->get();

        // echo $proj_m;
        // $proj_m = array();
        // $p_m = User::all();
        // echo(auth()->id());
        // echo('voy por las project');
        // foreach ($p_m as $pm) {
        //     if($pm->hasRole('project_m'))
        //         {

        //             array_push($proj_m, $pm);
        //             echo ($pm->id);
        //         }
        // }
    	return view('clients.create', compact('proj_m'));
    }

    public function store(Request $request){

        // Validate data

        $rules = [
            'tradename' => 'required|max:50',
            'business_name' => 'required',
            'rfc' => 'sometimes|nullable|max:15|alpha_num',
            'street' => 'required',
            'exterior_num' => 'required|max:10',
            'interior_num' => 'sometimes|nullable|max:10',
            'colony' => 'required',
            'region' => 'required',
            'city' => 'required|max:20',
            'zip_code' => 'required|max:5',
            'country' => 'required',
            'main_contact' => 'required|max:50',
            'main_c_phone' => 'required|numeric|digits_between:8,12',
            'main_c_email' => 'required|email',
            'billing_contact' => 'required|max:50',
            'billing_c_phone' =>'required|numeric|digits_between:8,12',
            'billing_c_email' =>'required|email',
            'comments' => 'sometimes|nullable|max:1000'
        ];
    	
        $niceNames = [
            'tradename' => 'Cliente',
            'business_name' => 'Razón Social',
            'rfc' => 'R.F.C.',
            'street' => 'Calle',
            'exterior_num' => 'No. Exterior',
            'interior_num' => 'Interior',
            'colony' => 'Colonia',
            'region' => 'Estado / Delegación',
            'city' => 'Ciudad',
            'zip_code' => 'Código Postal',
            'country' => 'País',
            'main_contact' => 'Contacto',
            'main_c_phone' => 'Teléfono - Contacto',
            'main_c_email' => 'E-mail - Contacto',
            'billing_contact' => 'Contacto Facturación',
            'billing_c_phone' =>'Teléfono - Facturación',
            'billing_c_email' =>'E-mail - Facturación',
        ]; 
        $this->validate($request, $rules, [], $niceNames);

    	//Create a new post using the request data

        $client = new Client(request(['tradename', 'business_name', 'rfc', 'street', 'exterior_num', 'interior_num', 'colony', 'region', 'city', 'zip_code', 'country', 'main_contact', 'main_c_phone', 'main_c_email', 'billing_contact', 'billing_c_phone', 'billing_c_email', 'comments']));

        auth()->user()->publish($client);

        //Save creator of client as responsable on client_user
        auth()->user()->responsable($client);

        $client->p_managers()->updateExistingPivot(auth()->id(), ['responsable' => 1]);

        //Save project_managers on client_user

        $proj_a = $request->input('proj_a');
        $proj_b = $request->input('proj_b');


        $client->p_managers()->attach([$proj_a, $proj_b]);

    	//And then redirect to the homepage
        Session::flash('flash_message', '¡Cliente añadido exitosamente!');

         return redirect()->route('clientes.show', $client);
    	// return redirect()->back();
    }

    public function edit(ClientRequest $request, $id){

        $client = Client::findOrFail($id);
        $user_id = $client->user_id;
        $creator = User::find($user_id);

        foreach ($client->get_responsable as $pm) {
            $resp = $pm->pivot->user_id;
        }

        $responsable = User::find($resp);

        // $proj_m = User::whereHas(
        //         'roles', function($query) {
        //             $query->where('role_id', '=', '1');

        // })->whereNotIn('id', [auth()->id(), 0])->get();

        $accounts = Client::findOrFail($id)->load('get_proj_ms')->get();
        
        $projects = $client->get_proj_ms;
        
        Log::info('Projectos.' . print_r($accounts));
        dd($accounts);
        // // dd($projects);

        // $proj_a = $projects[0];
        // $proj_b = $projects[1];
        // $proj_a = User::find($projects[0]->id);
        // $proj_b = User::find($projects[1]->id);
        // echo $proj_a;
        // echo $proj_b;

        return view('clients.edit', compact('client', 'proj_a', 'proj_b', 'responsable', 'creator'));
    }

    public  function update(ClientRequest $request, $id){
        $client = Client::findOrFail($id);

            // Validate data

        $rules = [
            'tradename' => 'required|max:50',
            'business_name' => 'required',
            'rfc' => 'sometimes|nullable|max:15|alpha_num',
            'street' => 'required',
            'exterior_num' => 'required|max:10',
            'interior_num' => 'sometimes|nullable|max:10',
            'colony' => 'required',
            'region' => 'required',
            'city' => 'required|max:20',
            'zip_code' => 'required|max:5',
            'country' => 'required',
            'main_contact' => 'required|max:50',
            'main_c_phone' => 'required|numeric|digits_between:8,12',
            'main_c_email' => 'required|email',
            'billing_contact' => 'required|max:50',
            'billing_c_phone' =>'required|numeric|digits_between:8,12',
            'billing_c_email' =>'required|email',
            'comments' => 'sometimes|nullable|max:1000'
        ];
        
        $niceNames = [
            'tradename' => 'Cliente',
            'business_name' => 'Razón Social',
            'rfc' => 'R.F.C.',
            'street' => 'Calle',
            'exterior_num' => 'No. Exterior',
            'interior_num' => 'Interior',
            'colony' => 'Colonia',
            'region' => 'Estado / Delegación',
            'city' => 'Ciudad',
            'zip_code' => 'Código Postal',
            'country' => 'País',
            'main_contact' => 'Contacto',
            'main_c_phone' => 'Teléfono - Contacto',
            'main_c_email' => 'E-mail - Contacto',
            'billing_contact' => 'Contacto Facturación',
            'billing_c_phone' =>'Teléfono - Facturación',
            'billing_c_email' =>'E-mail - Facturación',
        ]; 
        $this->validate($request, $rules, [], $niceNames);


        $client_up = request(['business_name', 'tradename', 'street', 'exterior_num', 'interior_num', 'colony', 'region', 'city', 'zip_code', 'country', 'rfc', 'main_contact', 'main_c_phone', 'main_c_email', 'billing_contact', 'billing_c_phone', 'billing_c_email']);

        // Get proj_m saved on intermediate table
        $projects = $client->get_proj_ms;
        
        $proj_a_saved = $projects[0]->id;
        Log::info('User A saved.' . $proj_a_saved);
        $proj_b_saved = $projects[1]->id;
        Log::info('User B saved.' . $proj_b_saved);
        // $proj_a = User::find($projects[0]->id);
        // $proj_b = User::find($projects[1]->id);

        //Update project_managers on client_user

        $proj_a = $request->input('proj_a');
        Log::info('User A new.' . $proj_a);
        $proj_b = $request->input('proj_b');
        Log::info('User B new.' . $proj_b);

        if( $proj_a_saved != $proj_a){
            Log::info('soy diferente al project a guardado');
            $client->p_managers()->detach($proj_a_saved);
            $client->p_managers()->attach($proj_a);    
        }
        if( $proj_b_saved != $proj_b){
            Log::info('soy diferente al project b guardado');
            $client->p_managers()->detach($proj_b_saved);
            $client->p_managers()->attach($proj_b);    
        }
        // $client->p_managers()->attach([$proj_a, $proj_b]);

        $client->fill($client_up)->save();

        Session::flash('flash_message', '¡Cliente actualizado exitosamente!');

        return redirect()->route('clientes.show', $client);
        // return redirect()->back();
    }

    // public function preguntar($id){

    //     $clientDelete = Client::findOrFail($id);

    //     return view('clients.show', compact('clientDelete'));
    // }

    // public function delete($id){
    //     $client = Client::findOrFail($id);
    //     $client -> delete();

    //     return redirect('/');
    // }
}
