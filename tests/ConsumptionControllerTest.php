<?php

use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Traits\DatabaseMigrations;


class ConsumptionControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_that_i_can_store_a_new_piece_of_consumptionData()
    {
        $data['date'] = (new DateTime())->format('Y-m-d H:i:s');
        $data['kwh'] = 2.50;
       $this->post('/consumptiondata/',
           [
                'date' => $data['date'],
                'kwh' => $data['kwh'],
           ])
       ->seeJson(['status' => 'success'])
           ->seeInDatabase('consumption_datas',$data);
    }

    public function test_that_i_can_get_all_consumptionData_as_json()
    {
        $this->get('/consumptiondata/all')->seeJson();
    }
}
