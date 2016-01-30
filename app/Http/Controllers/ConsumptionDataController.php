<?php

namespace App\Http\Controllers;

use App\ConsumptionData;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;


class ConsumptionDataController extends Controller
{


    public function get($startdate = null, $enddate = null)
    {
        if ($startdate == null || $enddate == null) {
            return ( ConsumptionData::all(['id','date','kwh']));
        }
        return ConsumptionData::where('date', '>', $startdate)->where('date', '<', $enddate)->get();
    }

    public function store(Request $r)
    {
        $this->validate($r, [
            'date' => 'required',
            'kwh' => 'required',
        ]);
        $data = $r->only(['date', 'kwh']);
        try {
            ConsumptionData::create($data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return ['status' => 'success'];

    }

    public function count()
    {
        return json_encode(['datapoints'=> ConsumptionData::all()->count()]);
    }

    public function oldest()
    {
        return ConsumptionData::orderBy('date','ASC')->take(1)->get();
    }
    public function latest()
    {
        return ConsumptionData::orderBy('date','DESC')->take(1)->get();
    }


}
