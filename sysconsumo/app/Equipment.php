<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = ['name','amount','time_use','watts','room_id'];
}
