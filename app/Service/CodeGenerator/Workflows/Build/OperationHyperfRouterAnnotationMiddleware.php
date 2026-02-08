<?php

namespace App\Service\CodeGenerator\Workflows\Build;

use App\Model\CodeGenerator;

final class OperationHyperfRouterAnnotationMiddleware extends AbstractBuilder
{
    protected string $viewViewTemplate = 'code-generator.operationhyperfrouterannotationmiddleware';

    protected function formatRelativePath(CodeGenerator $codeGenerator): string
    {
        return 'app/Http/Common/Middleware';
    }

    protected function formatFilename(CodeGenerator $codeGenerator): string
    {
        return 'OperationHyperfRouterAnnotationMiddleware.php';
    }
}