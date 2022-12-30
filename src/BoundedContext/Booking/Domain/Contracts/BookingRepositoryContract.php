<?php

declare(strict_types=1);

namespace Src\BoundedContext\Booking\Domain\Contracts;
use Illuminate\Http\Request;

interface BookingRepositoryContract
{
    public function save(Request $request);
}
