<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application;

interface QueryBus
{
    public function query(QueryMessage $query, Presenter $presenter) : void;
}