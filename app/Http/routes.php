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

$app->get('/', function () use ($app) {
    $description = "API created by Lasse Gøransson to able access to energi Fyn data more conveniently";
    return $app->version().'<br>'.$description;
});


$app->get('consumptiondata/{startdate}/{enddate}','ConsumptionDataController@get');
$app->post('consumptiondata','ConsumptionDataController@store');
