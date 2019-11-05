<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application;

interface TransactionManager
{
    const 
        LOCK_MODE_NONE = 0,
        LOCK_MODE_OPTIMISTIC = 1,
        LOCK_MODE_PESSIMISTIC_READ = 2,
        LOCK_MODE_PESSIMISTIC_WRITE = 4
    ;
        
    public function flush();
    public function begin();
    public function commit();
    public function rollback();
    public function lock($entity, $lockMode, $lockVersion = null): void;

    public function transactional(callable $callback, int $attempts = 1);
    
    public function isTransactionActive(): bool;
    public function isOpen(): bool;
    public function resetManager(): void;
}
