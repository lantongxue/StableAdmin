<?php

namespace App\Service\CodeGenerator\Workflows\Build;

use App\Model\CodeGenerator;

final class SqlBuild extends AbstractBuilder
{
    protected string $viewViewTemplate = 'code-generator.sql';
    protected function formatRelativePath(CodeGenerator $codeGenerator): string
    {
        return 'runtime/sql/'.$codeGenerator->getPackageName();
    }

    protected function formatFilename(CodeGenerator $codeGenerator): string
    {
        return $codeGenerator->getName().'.sql';
    }

}