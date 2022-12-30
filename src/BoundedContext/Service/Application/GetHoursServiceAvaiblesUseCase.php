<?php

declare(strict_types=1);

namespace Src\BoundedContext\Service\Application;

use Illuminate\Http\Request;

use Src\BoundedContext\Service\Domain\Contracts\ServiceRepositoryContract;

final class GetHoursServiceAvaiblesUseCase
{
    private $repository;

    public function __construct(ServiceRepositoryContract $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(Request $request)
    {

        $idservice = $request->idservice;
        $date = $request->date;

        if (is_null($date) || empty($date) || is_null($idservice) || empty($idservice)) {
            return response()->json(['error' => 'Please specify the date or the id of the service!'], 400);
        } else {

            $hoursAvaibles = $this->repository->getHoursAvaibles($idservice, $date );

            return $hoursAvaibles;
        }













    }
}
