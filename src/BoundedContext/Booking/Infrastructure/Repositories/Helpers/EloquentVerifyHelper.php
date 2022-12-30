<?php

namespace Src\BoundedContext\Booking\Infrastructure\Repositories\Helpers;

use Illuminate\Support\Facades\DB;
use App\Booking;
use App\Schedule;

class EloquentVerifyHelper
{
    /** 
     * @param object $request  
     * 
     * @return boolean 
     */

    public static function verify_service($request)
    {

        $verifyService = Schedule::select('service.idservice', 'schedule.day', DB::raw('CONCAT(schedule.starttime ,\' - \', schedule.endtime) AS avaibleschedule'))
            ->join('service', 'schedule.idservice', '=', 'service.idservice')
            ->where([
                ['service.idservice', '=', $request->idservice],
                ['service.isactive', '=', 'true'],
                ['schedule.isactive', '=', 'true'],
                ['schedule.day', '=', $request->bookingday],
                ['schedule.starttime', '<', $request->bookingtime],
                ['schedule.endtime', '>', $request->bookingtime]
            ])
            ->first();

        if (is_object($verifyService)) return true;

        return false;
    }

    /** 
     * @param object $request  
     * 
     * @return boolean 
     */

    public static function verify_booking($request)
    {

        $infoBooking = Booking::select('booking.bookingday', 'booking.bookingtime')
            ->where([
                ['booking.idservice', '=', $request->idservice],
                ['booking.bookingtime', '=', $request->bookingtime],
                ['booking.isactive', '=', 'true'],
            ])
            ->first();

        if (is_null($infoBooking)) return true;

        return false;
    }
}
