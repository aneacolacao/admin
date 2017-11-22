<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    //Creator of client
    public function creatorr(){
    	return $this->belongsTo('App\User');
    }

    //Projects manager assigned to client
    public function p_managers(){
    	return $this->belongsToMany('App\User')
    				->withTimestamps()
    				->withPivot('responsable');
    }

    //Get responsable of client
    public function get_responsable(){
    	return $this->belongsToMany('App\User')
    				->wherePivot('responsable', 1);
	}

	//Get projects of client
    public function get_proj_ms(){
    	return $this->belongsToMany('App\User')
    				->wherePivot('responsable', 0);
	}
}

