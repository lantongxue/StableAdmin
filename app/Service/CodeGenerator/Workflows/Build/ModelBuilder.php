<?php

namespace App\Service\CodeGenerator\Workflows\Build;

use App\Model\CodeGenerator;

final class ModelBuilder extends AbstractBuilder
{

    protected string $viewViewTemplate = 'code-generator.model';

    protected function formatRelativePath(CodeGenerator $codeGenerator): string
    {
        return 'app/Model/' . $codeGenerator->getPackageNameFirstUp() . ($codeGenerator->getBackendChildPath() ? '/' . $codeGenerator->getBackendChildPath() : '');
    }

    protected function formatFilename(CodeGenerator $codeGenerator): string
    {
        return $codeGenerator->getName().'.php';
    }

}