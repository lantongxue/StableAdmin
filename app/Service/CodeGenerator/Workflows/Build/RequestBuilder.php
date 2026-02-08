<?php

namespace App\Service\CodeGenerator\Workflows\Build;

use App\Model\CodeGenerator;

final class RequestBuilder extends AbstractBuilder
{
    protected string $viewViewTemplate = 'code-generator.request';

    protected function formatRelativePath(CodeGenerator $codeGenerator): string
    {
        return 'app/Http/Admin/Request/' . $codeGenerator->getPackageNameFirstUp() . ($codeGenerator->getBackendChildPath() ? '/' . $codeGenerator->getBackendChildPath() : '');
    }

    protected function formatFilename(CodeGenerator $codeGenerator): string
    {
        return $codeGenerator->getName().'Request.php';
    }

}