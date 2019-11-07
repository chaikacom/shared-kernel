<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application\Presenter;

// FIXME:
class PresenterAsIs implements Presenter
{
    private $data;

    public function present($data)
    {
        $this->data = $data;
    }

    public function data()
    {
        return $this->data;
    }
}