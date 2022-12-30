<?php

declare(strict_types=1);

namespace Src\BoundedContext\Service\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\Service\Application\GetServiceUseCase;
use Src\BoundedContext\Service\Infrastructure\Repositories\EloquentServiceRepository;

final class GetServiceController
{
    private $repository;

    public function __construct(EloquentServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $getServiceUseCase = new GetServiceUseCase($this->repository);
        $service                    = $getServiceUseCase->__invoke($request);

        return $service;
    }
}
