<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application\MessageBus;

use Chaika\SharedKernel\Application\Presenter\Presenter;

interface QueryBus
{
    public function query(QueryMessage $query, Presenter $presenter) : void;
}