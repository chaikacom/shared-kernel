<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application\TransactionManager;

final class LockMode
{
    const
        LOCK_MODE_NONE = 0,
        LOCK_MODE_OPTIMISTIC = 1,
        LOCK_MODE_PESSIMISTIC_READ = 2,
        LOCK_MODE_PESSIMISTIC_WRITE = 4
    ;
}
