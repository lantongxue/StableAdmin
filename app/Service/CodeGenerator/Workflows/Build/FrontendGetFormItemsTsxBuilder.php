<?php

namespace App\Service\CodeGenerator\Workflows\Build;

use App\Model\CodeGenerator;

final class FrontendGetFormItemsTsxBuilder extends AbstractBuilder
{
    protected string $viewViewTemplate = 'code-generator.frontend.getFormItems-tsx';

    protected function formatRelativePath(CodeGenerator $codeGenerator): string
    {
        return 'web/src/modules/' . $codeGenerator->getPackageName() . '/views/' . ($codeGenerator->getFrontChildPath() ?: $codeGenerator->getName()) . '/components';
    }

    protected function formatFilename(CodeGenerator $codeGenerator): string
    {
        return 'GetFormItems.tsx';
    }
}