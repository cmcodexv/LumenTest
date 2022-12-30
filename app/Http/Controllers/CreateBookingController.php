<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateBookingController extends Controller
{
    /**
     * @var \Src\BoundedContext\Booking\Infrastructure\CreateBookingController
     */
    private $createBookingController;

    public function __construct(\Src\BoundedContext\Booking\Infrastructure\CreateBookingController $createBookingController)
    {
        $this->createBookingController = $createBookingController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $newBooking = $this->createBookingController->__invoke($request);

        return $newBooking;
    }
}
