<?php

declare(strict_types=1);

namespace Src\BoundedContext\Service\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\Service\Application\GetHoursServiceAvaiblesUseCase;
use Src\BoundedContext\Service\Infrastructure\Repositories\EloquentServiceRepository;

final class GetHoursServiceAvaiblesController
{
    private $repository;

    public function __construct(EloquentServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $getHoursServiceAvaibles = new GetHoursServiceAvaiblesUseCase($this->repository);
        $service                    = $getHoursServiceAvaibles->__invoke($request);

        return $service;
    }
}
