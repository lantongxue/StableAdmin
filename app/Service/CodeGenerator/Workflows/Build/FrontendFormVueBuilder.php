<?php

namespace App\Service\CodeGenerator\Workflows\Build;

use App\Model\CodeGenerator;

final class FrontendFormVueBuilder extends AbstractBuilder
{
    protected string $viewViewTemplate = 'code-generator.frontend.form-vue';

    protected function formatRelativePath(CodeGenerator $codeGenerator): string
    {
        return 'web/src/modules/' . $codeGenerator->getPackageName() . '/views/' . ($codeGenerator->getFrontChildPath() ?: $codeGenerator->getName());
    }

    protected function formatFilename(CodeGenerator $codeGenerator): string
    {
        return 'Form.vue';
    }
}