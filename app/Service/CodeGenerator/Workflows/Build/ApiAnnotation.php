<?php

namespace App\Service\CodeGenerator\Workflows\Build;

use App\Model\CodeGenerator;

final class ApiAnnotation extends AbstractBuilder
{
    protected string $viewViewTemplate = 'code-generator.apiname';

    protected function formatRelativePath(CodeGenerator $codeGenerator): string
    {
        return 'app/Annotation/';
    }

    protected function formatFilename(CodeGenerator $codeGenerator): string
    {
        return 'ApiName.php';
    }
}