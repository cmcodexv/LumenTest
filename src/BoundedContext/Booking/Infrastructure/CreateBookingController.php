<?php

declare(strict_types=1);

namespace Src\BoundedContext\Booking\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\Booking\Application\CreateBookingUseCase;
use Src\BoundedContext\Booking\Infrastructure\Repositories\EloquentBookingRepository;

final class CreateBookingController
{
    private $repository;

    public function __construct(EloquentBookingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $createBookingUseCase = new CreateBookingUseCase($this->repository);
        $booking                    = $createBookingUseCase->__invoke($request);

        return $booking;
    }
}
