<?php

declare(strict_types=1);

namespace App\Service\CodeGenerator\Workflows\Build;

use App\Model\CodeGenerator;

class FrontendGetTableColumnsTsxBuilder extends AbstractBuilder
{
    protected string $viewViewTemplate = 'code-generator.frontend.getTableColumns-tsx';

    protected function formatRelativePath(CodeGenerator $codeGenerator): string
    {
        return 'web/src/modules/' . $codeGenerator->getPackageName() . '/views/' . ($codeGenerator->getFrontChildPath() ?: $codeGenerator->getName()) . '/components';
    }

    protected function formatFilename(CodeGenerator $codeGenerator): string
    {
        return 'GetTableColumns.tsx';
    }
}
