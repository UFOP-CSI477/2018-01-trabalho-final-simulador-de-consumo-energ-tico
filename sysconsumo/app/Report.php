<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['date','watts','spend','user_id','distr_id'];
}
