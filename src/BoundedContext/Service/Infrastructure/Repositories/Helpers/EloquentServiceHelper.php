<?php

namespace Src\BoundedContext\service\Infrastructure\Repositories\Helpers;

use Illuminate\Support\Facades\DB;
use DateTime;

class EloquentServiceHelper
{
    /** 
     * @param DateTime $start  
     * @param String $end  
     * 
     * @return array
     */

    public static function get_hours($start, $end)
    {

        //asumiendo que en la última hora ya no se puede reservar
        $newEnd = new DateTime($end);
        $newEnd->modify( '-1 hours' ); // -1 hora
        $stringEnd = $newEnd->format('Y-m-d H:i:s'); //format string
    
        $getHours = DB::select("SELECT hour::time 
        FROM  generate_series ( 
            timestamp '$start', 
            '$stringEnd', 
            '1 hour') hour");

        $hours = [];
        foreach ($getHours as $h => $value) {
            $hours[] = $value->hour;
        }


        return $hours;
    }

    /** 
     * @param int $idservice
     * 
     * @return array
     */

    public static function get_booking_hours($idservice)
    {


        $infoBooking = DB::select("SELECT bookingtime
        FROM booking
        WHERE idservice = $idservice AND isactive = true");

        $hoursBooking = [];
        foreach ($infoBooking as $i => $value) {
            $hoursBooking[] = $value->bookingtime;
        }

        return $hoursBooking;
    }
}
