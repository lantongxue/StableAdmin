<?php

namespace App\Service\CodeGenerator\Workflows\Strategy;

use App\Service\CodeGenerator\Workflows\Build\AbstractBuilder;

abstract class AbstractStrategy
{
    /**
     * @var AbstractBuilder[] $builders
     */
    protected array $builders = [];

    public function list(): array
    {
        return $this->builders;
    }
}