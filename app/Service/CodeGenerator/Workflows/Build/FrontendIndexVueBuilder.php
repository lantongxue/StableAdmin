<?php

namespace App\Service\CodeGenerator\Workflows\Build;

use App\Model\CodeGenerator;

final class FrontendIndexVueBuilder extends AbstractBuilder
{
    protected string $viewViewTemplate = 'code-generator.frontend.index-vue';

    protected function formatRelativePath(CodeGenerator $codeGenerator): string
    {
        return 'web/src/modules/' . $codeGenerator->getPackageName() . '/views/' . ($codeGenerator->getFrontChildPath() ?: $codeGenerator->getName());
    }

    protected function formatFilename(CodeGenerator $codeGenerator): string
    {
        return 'Index.vue';
    }
}