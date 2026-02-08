<?php

namespace App\Service\CodeGenerator\Workflows\Build;

use App\Model\CodeGenerator;

final class ControllerBuild extends AbstractBuilder
{
    protected string $viewViewTemplate = 'code-generator.controller';

    protected function formatRelativePath(CodeGenerator $codeGenerator): string
    {
        return 'app/Http/Admin/Controller/'.$codeGenerator->getPackageNameFirstUp(). ($codeGenerator->getBackendChildPath() ? '/'.$codeGenerator->getBackendChildPath() : '');
    }

    protected function formatFilename(CodeGenerator $codeGenerator): string
    {
        return $codeGenerator->getName().'Controller.php';
    }
}