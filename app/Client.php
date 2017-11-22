<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    //Creator of client
    public function creator(){
    	return $this->belongsTo('App\User');
    }

    //Projects manager assigned to client
    public function p_manager(){
    	return $this->belongsToMany('App\User');
    }
}

