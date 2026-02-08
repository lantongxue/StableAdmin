<?php

namespace App\Service\CodeGenerator\Workflows\Build;

use App\Model\CodeGenerator;

final class ServiceBuilder extends AbstractBuilder
{
    protected string $viewViewTemplate = 'code-generator.service';

    protected function formatRelativePath(CodeGenerator $codeGenerator): string
    {
        return 'app/Service/' . $codeGenerator->getPackageNameFirstUp() . ($codeGenerator->getBackendChildPath() ? '/' . $codeGenerator->getBackendChildPath() : '');
    }

    protected function formatFilename(CodeGenerator $codeGenerator): string
    {
        return $codeGenerator->getName().'Service.php';
    }

}