<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class GetServiceController extends Controller
{
    /**
     * @var \Src\BoundedContext\Service\Infrastructure\GetServiceController
     */

    private $getServiceController;

    public function __construct(\Src\BoundedContext\Service\Infrastructure\GetServiceController $getServiceController)
    {
        $this->getServiceController = $getServiceController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Request $request)
    {
        $service = $this->getServiceController->__invoke($request);
        
        return $service;

    }
}





