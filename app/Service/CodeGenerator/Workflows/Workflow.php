<?php

namespace App\Service\CodeGenerator\Workflows;

use App\Model\CodeGenerator;
use App\Service\CodeGenerator\Workflows\Build\BuilderInterface;
use App\Service\CodeGenerator\Workflows\Build\ControllerBuild;
use App\Service\CodeGenerator\Workflows\Build\FrontendApiBuilder;
use App\Service\CodeGenerator\Workflows\Build\FrontendFormVueBuilder;
use App\Service\CodeGenerator\Workflows\Build\FrontendGetFormItemsTsxBuilder;
use App\Service\CodeGenerator\Workflows\Build\FrontendGetSearchItemsTsxBuilder;
use App\Service\CodeGenerator\Workflows\Build\FrontendGetTableColumnsTsxBuilder;
use App\Service\CodeGenerator\Workflows\Build\FrontendIndexVueBuilder;
use App\Service\CodeGenerator\Workflows\Build\ModelBuilder;
use App\Service\CodeGenerator\Workflows\Build\RepositoryBuilder;
use App\Service\CodeGenerator\Workflows\Build\RequestBuilder;
use App\Service\CodeGenerator\Workflows\Build\ServiceBuilder;
use App\Service\CodeGenerator\Workflows\Strategy\AbstractStrategy;

final class Workflow implements WorkflowInterface
{
    public function __construct(
        private readonly AbstractStrategy $strategy
    ){}

    /**
     * @inheritDoc
     */
    public function doRun(CodeGenerator $codeGenerator): array
    {
        $files = [];

        foreach ($this->strategy->list() as $builder){
            $files[] = $builder->build($codeGenerator);
        }

        return $files;
    }
}