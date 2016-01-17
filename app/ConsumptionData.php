<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsumptionData extends Model
{
    protected $fillable = ['date','kwh'];
}