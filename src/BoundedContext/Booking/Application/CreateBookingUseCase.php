<?php

declare(strict_types=1);

namespace Src\BoundedContext\Booking\Application;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


use Src\BoundedContext\Booking\Domain\Contracts\BookingRepositoryContract;

final class CreateBookingUseCase
{
    private $repository;

    public function __construct(BookingRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idservice' => 'required',
            'customername' => 'required',
            'customeremail' => 'required',
            'bookingday' => 'required',
            'bookingtime' => 'required',
            'bookingprice' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Something is wrong, please complete the fields!'], 400);
        } else {

            $newBooking = $this->repository->save($request);
            return $newBooking;
        }
    }
}
