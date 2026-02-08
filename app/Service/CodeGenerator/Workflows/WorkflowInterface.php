<?php

namespace App\Service\CodeGenerator\Workflows;

use App\Model\CodeGenerator;
use Symfony\Component\Finder\SplFileInfo;

interface WorkflowInterface
{
    /**
     * @return SplFileInfo[]
     */
    public function doRun(CodeGenerator $codeGenerator): array;
}