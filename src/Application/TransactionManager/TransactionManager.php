<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application\TransactionManager;

interface TransactionManager
{
    public function flush();
    public function begin();
    public function commit();
    public function rollback();
    public function transactional(callable $callback, int $attempts = 1);
    public function lock($entity, int $lockMode, $lockVersion = null): void;

    public function isTransactionActive(): bool;
    public function isOpen(): bool;
    public function resetManager(): void;
}
