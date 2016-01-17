<?php

namespace App\Http\Controllers;

use App\ConsumptionData;
use Illuminate\Http\Request;
use DB;


class ConsumptionDataController extends Controller
{


    public function get($startdate,$enddate)
    {
        return ConsumptionData::where('date' ,'>',$startdate)->where('date' ,'<',$enddate)->get();
    }

    public function store(Request $r)
    {
       $this->validate($r,[
           'date' => 'required',
           'kwh' => 'required',
       ]);
        $data = $r->only(['date','kwh']);
        try
        {
            $consumptiondata = ConsumptionData::create($data);
        }
        catch (\Exception $e)
        {
            throw $e;
        }
        return ['status' => 'success'];

    }
}
