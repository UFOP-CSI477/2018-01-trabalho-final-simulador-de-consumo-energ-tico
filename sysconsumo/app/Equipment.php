<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = ['name','amount','time_use','watts','room_id'];
    protected $table = 'equipments';

    public function room(){
    	return $this->belongsTo('App\Room');
    }
}
