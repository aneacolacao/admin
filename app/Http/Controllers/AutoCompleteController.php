<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller {
    
    public function index(){
        return view('autocomplete.index');
   }
    public function autoComplete(Request $request) {
        $query = $request->get('term','');
        
        //esto excluye al autor 
        $proj_m = User::whereHas(
                'roles', function($query) {
                    $query->where('role_id', '=', '1');

        })->whereNotIn('id', [auth()->id(), 0])->where('name','LIKE','%'.$query.'%')->get();

        // $proj_m = User::where('name','LIKE','%'.$query.'%')->orWhere('last_name','LIKE','%'.$query.'%')->get();

   //      $proj_m = User::whereHas(
			// 'roles', function($query) {
			// 	$query->where([
			// 		['role_id', '=', '1'],
			// 		['name', 'LIKE', '%'.$query.'%'],
			// 		['last_name','LIKE','%'.$query.'%']		
			// ]);
			// })->whereNotIn('id', [auth()->id(), 0])->get();        			
        

        $data=array();
        foreach ($proj_m as $proj) {
                $data[]=array('value'=>$proj->name . ' ' . $proj->last_name ,'id'=>$proj->id);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }
    
}
