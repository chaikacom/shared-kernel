<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application\TransactionManager;

interface TransactionManager
{
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
    public function lock($entity, int $lockMode, $lockVersion = null): void;
}
