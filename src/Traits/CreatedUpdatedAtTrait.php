<?php

namespace Chaika\SharedKernel\Traits;

trait CreatedUpdatedAtTrait
{
    protected $createdAt;
    protected $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function createdAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function updatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
}