<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application\MessageBus;

class Options
{
    public const PRIORITY_LOW = 'low';
    public const PRIORITY_NORMAL = 'normal';
    public const PRIORITY_HIGH = 'high';

    private ?string $queue = null;
    private ?int $delay = null;
    private string $priority = self::PRIORITY_NORMAL;
    private ?int $timeToLive = null;

    /**
     * @return string|null
     */
    public function queue(): ?string
    {
        return $this->queue;
    }

    /**
     * @param string|null $queue
     */
    public function setQueue(?string $queue): self
    {
        $this->queue = $queue;
        return $this;
    }

    /**
     * @return int|null
     */
    public function delay(): ?int
    {
        return $this->delay;
    }

    /**
     * @param int|null $delay
     */
    public function setDelay(?int $delay): self
    {
        $this->delay = $delay;
        return $this;
    }

    /**
     * @return string
     */
    public function priority(): string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): self
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return int|null
     */
    public function timeToLive(): ?int
    {
        return $this->timeToLive;
    }

    /**
     * @param int|null $timeToLive
     */
    public function setTimeToLive(?int $timeToLive): self
    {
        $this->timeToLive = $timeToLive;
        return $this;
    }
}