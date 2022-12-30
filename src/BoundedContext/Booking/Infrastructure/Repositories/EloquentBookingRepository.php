<?php

declare(strict_types=1);

namespace Src\BoundedContext\Booking\Infrastructure\Repositories;

use App\Booking;
use \Carbon\Carbon;
use Src\BoundedContext\Booking\Domain\Contracts\BookingRepositoryContract;
use Src\BoundedContext\Booking\Infrastructure\Repositories\Helpers\EloquentVerifyHelper as VerifyHelper;


final class EloquentBookingRepository implements BookingRepositoryContract
{

    public function save($request)
    {

        $verifyService = VerifyHelper::verify_service($request);
        $verifyBooking = VerifyHelper::verify_booking($request);

        if ($verifyService && $verifyBooking) {
            try {
                $booking = new Booking();
                $booking->idservice = $request->idservice;
                $booking->customername = $request->customername;
                $booking->customeremail = $request->customeremail;
                $booking->bookingday = $request->bookingday;
                $booking->bookingtime = $request->bookingtime;
                $booking->bookingprice = $request->bookingprice;
                $booking->isactive = true;
                $booking->creationdate = Carbon::now();
                $booking->save();

                return response()->json(['success' => 'Booking has been created successfully!', 'Booking' => $booking], 201);
            } catch (\Exception $ex) {
                return $ex;
            }
        } else {
            return response()->json(['error' => 'The service is not available on the requested date and time!'], 409);
        }
    }
}
