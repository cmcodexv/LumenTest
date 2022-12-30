<?php

declare(strict_types=1);

namespace Src\BoundedContext\Service\Domain\Contracts;

interface ServiceRepositoryContract
{
    public function get($serviceName);
    public function getHoursAvaibles($idservice, $date);
}
