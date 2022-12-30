<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Http\Response;

class ServiceTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function test_that_avaibleHoursService_endpoint_returns_a_info_response()
    {
        $this->get('api/serviceAvailability?date=2023-01-01&idservice=1');
        $this->assertResponseStatus(200);
        $this->assertEquals(
            '{"info":"Currently the selected service has no hours available!"}', 
            $this->response->getContent()
        );

    }

     /**
     *
     * @return void
     */
    public function test_that_avaibleHoursService_endpoint_returns_a_success_response()
    {
        $this->get('api/serviceAvailability?date=2023-01-02&idservice=2');
        $this->assertResponseStatus(200);
        $this->assertArrayHasKey('hoursAvaibles', $this->response);
    }

       /**
     *
     * @return void
     */
    public function test_that_avaibleHoursService_endpoint_returns_a_bad_response()
    {
        $this->get('api/serviceAvailability?idservice=1');
        $this->assertResponseStatus(400);
    }
}
