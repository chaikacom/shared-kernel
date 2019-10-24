<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application;

interface Presenter
{
    public function present($data);
    public function data();
}