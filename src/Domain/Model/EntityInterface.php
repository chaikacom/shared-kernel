<?php

namespace Chaika\SharedKernel\Domain\Model;

use Chaika\SharedKernel\Domain\Model\Identity\BaseId;

interface EntityInterface
{
    public function id(): BaseId;
}