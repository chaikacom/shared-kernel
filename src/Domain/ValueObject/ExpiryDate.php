<?php

namespace Chaika\SharedKernel\Domain\ValueObject;

class ExpiryDate
{
    private $expiresAt;

    private function __construct(\DateTime $expiresAt)
    {
        $this->expiresAt = $expiresAt;
    }

    public static function create(\DateTime $expiresAt)
    {
        return new self($expiresAt);
    }

    public static function createByMonthAndYear(int $month, int $year)
    {
        $date = \DateTime::createFromFormat('Y-n-d H:i:s', $year.'-'.$month.'-01 23:59:59');
        $date->modify('last day of this month');

        return new self($date);
    }

    public function when(): \DateTime
    {
        return $this->expiresAt;
    }

    public function isExpired(): bool
    {
        if ($this->expiresAt) {
            return $this->expiresAt < (new \DateTime());
        }

        return false;
    }

    public function isExpiryInCurrentMonth()
    {
        return $this->when()->format('Y-m') === (new \DateTime())->format('Y-m');
    }

    public function daysLeft(): int
    {
        $current = new \DateTime();
        $diff = $current->diff($this->expiresAt)->format("%r%a");
        return intval($diff);
    }
}
