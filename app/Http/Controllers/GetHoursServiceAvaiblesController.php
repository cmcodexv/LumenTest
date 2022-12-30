<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class GetHoursServiceAvaiblesController extends Controller
{
    /**
     * @var \Src\BoundedContext\Service\Infrastructure\GetHoursServiceAvaiblesController
     */

    private $getHoursServiceAvaiblesController;

    public function __construct(\Src\BoundedContext\Service\Infrastructure\GetHoursServiceAvaiblesController $getHoursServiceAvaiblesController)
    {
        $this->getHoursServiceAvaiblesController = $getHoursServiceAvaiblesController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Request $request)
    {
        $hoursService = $this->getHoursServiceAvaiblesController->__invoke($request);
        
        return $hoursService;

    }
}

