<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Http\Response;

class BookingTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function test_that_create_booking_endpoint_returns_a_bad_request_response()
    {
        $this->post('api/booking', [
            "idservice" => 3,
            "customername" => "Carlos",
            "customeremail" => "carlos@gmail.com",
            "bookingday" => "2023/01/03",
            "bookingtime" => "17:00"
        ]);
        $this->assertResponseStatus(400);
        $this->assertEquals(
            '{"error":"Something is wrong, please complete the fields!"}',
            $this->response->getContent()
        );
    }

    /**
     *
     * @return void
     */
    public function test_that_create_booking_endpoint_returns_a_success_response()
    {

        $this->post('api/booking', [
            "idservice" => 3,
            "customername" => "Carlos",
            "customeremail" => "carlos@gmail.com",
            "bookingday" => "2023/01/03",
            "bookingtime" => "17:00",
            "bookingprice" => 180.00
        ]);
        $this->assertResponseStatus(201);
        $this->assertArrayHasKey('success', $this->response);
    }

    /**
     *
     * @return void
     */
    public function test_that_create_existing_booking_endpoint_returns_a_conflict_response()
    {
        $this->post('api/booking', [
            "idservice" => 3,
            "customername" => "Carlos",
            "customeremail" => "carlos@gmail.com",
            "bookingday" => "2023/01/03",
            "bookingtime" => "17:00",
            "bookingprice" => 180.00
        ]);
        $this->assertResponseStatus(409);
        $this->assertEquals(
            '{"error":"The service is not available on the requested date and time!"}',
            $this->response->getContent()
        );
    }
}
