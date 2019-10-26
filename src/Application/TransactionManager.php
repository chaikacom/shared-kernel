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
    /**
     * @param callable $func The function to execute transactionally.
     * @return mixed The non-empty value returned from the closure or true instead
     * @throws \Exception
     */
    public function transactional($func);
    public function isTransactionActive(): bool;
    public function isOpen(): bool;
    public function lock($entity, $lockMode, $lockVersion = null): void;
}
