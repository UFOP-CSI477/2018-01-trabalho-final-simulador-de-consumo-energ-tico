<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = ['name','uf','tarifa'];
    public $timestamps = true;
}
