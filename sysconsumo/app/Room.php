<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name','user_id'];

    public function equipments(){
    	return $this->hasMany('App\Equipment');
    }
}
