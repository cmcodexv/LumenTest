<?php

declare(strict_types=1);

namespace Src\BoundedContext\Service\Infrastructure\Repositories;

use App\Schedule as EloquentScheduleModel;
use App\Booking as EloquentBookingModel;
use Illuminate\Support\Facades\DB;
use Src\BoundedContext\Service\Domain\Contracts\ServiceRepositoryContract;
use Src\BoundedContext\Service\Infrastructure\Repositories\Helpers\EloquentServiceHelper as ServiceHelper;
use stdClass;


final class EloquentServiceRepository implements ServiceRepositoryContract
{
    private $eloquentScheduleModel;

    public function __construct()
    {
        $this->eloquentScheduleModel = new EloquentScheduleModel;
        $this->eloquentBookingModel = new EloquentBookingModel;
    }

    public function get($selectName)
    {
        try {
            $service = $this->eloquentScheduleModel->select('service.idservice', $selectName, 'schedule.day', DB::raw('CONCAT(schedule.starttime ,\' - \', schedule.endtime) AS avaibleschedule'))
                ->join('service', 'schedule.idservice', '=', 'service.idservice')
                ->where([
                    ['service.isactive', '=', 'true'],
                    ['schedule.isactive', '=', 'true']
                ])
                ->get();

            return $service;
        } catch (\Exception $ex) {
            return $ex;
        }
    }

    public function getHoursAvaibles($idservice, $date)
    {
        try {

            $infoService = $this->eloquentScheduleModel->select('service.idservice', 'schedule.day', 'schedule.starttime', 'schedule.endtime')
                ->join('service', 'schedule.idservice', '=', 'service.idservice')
                ->where([
                    ['service.idservice', '=', $idservice],
                    ['schedule.day', '=', $date],
                    ['service.isactive', '=', 'true'],
                    ['schedule.isactive', '=', 'true']
                ])
                ->first();

            if (!$infoService)
                return response()->json(['error' => 'The selected service is not available on the requested date!'], 400);

            $start = $infoService->day . ' ' . $infoService->starttime;
            $end = $infoService->day . ' ' . $infoService->endtime;


            $hoursAvaible = ServiceHelper::get_hours($start, $end);
            $hoursBooking = ServiceHelper::get_booking_hours($idservice);

            $resp =  array_diff($hoursAvaible, $hoursBooking);
            if (count($resp) === 0)
                return response()->json(['info' => 'Currently the selected service has no hours available!'], 200);

            $objInfo = new stdClass();
            $objInfo->hoursAvaibles = $resp;
            return response()->json($objInfo, 200);
        } catch (\Exception $ex) {
            return $ex;
        }
    }
}
