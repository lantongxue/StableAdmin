<?php

namespace App\Service\CodeGenerator\Workflows\Build;

use App\Model\CodeGenerator;

final class RepositoryBuilder extends AbstractBuilder
{
    protected string $viewViewTemplate = 'code-generator.repository';

    protected function formatRelativePath(CodeGenerator $codeGenerator): string
    {
        return 'app/Repository/' . $codeGenerator->getPackageNameFirstUp() . ($codeGenerator->getBackendChildPath() ? '/' . $codeGenerator->getBackendChildPath() : '');
    }

    protected function formatFilename(CodeGenerator $codeGenerator): string
    {
        return $codeGenerator->getName().'Repository.php';
    }

}