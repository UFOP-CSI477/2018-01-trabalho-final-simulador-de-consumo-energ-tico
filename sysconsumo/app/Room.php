<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name','user_id'];

    public function equipments(){
    	return $this->hasMany('App\Equipment');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
