<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{
    public function profile(){
    	return view('user.profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){
    	
    	//Handle by user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		$width = Image::make($avatar)->width();
    		$height = Image::make($avatar)->height();
    		Image::make($avatar)->widen(300)->save(public_path('/uploads/avatars/' . $filename));

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('user.profile', array('user' => Auth::user()));
    }
}
