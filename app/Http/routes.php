<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('',function(){
   return View('latestday');
});

$app->get('stats',function(){
   return View('stats');
});




















// API

$app->get('consumptiondata/all','ConsumptionDataController@get');
$app->get('consumptiondata/{startdate}/{enddate}','ConsumptionDataController@get');
$app->get('consumptiondata/count','ConsumptionDataController@count');
$app->get('consumptiondata/oldest','ConsumptionDataController@oldest');
$app->get('consumptiondata/latest','ConsumptionDataController@latest');

$app->post('consumptiondata','ConsumptionDataController@store');
