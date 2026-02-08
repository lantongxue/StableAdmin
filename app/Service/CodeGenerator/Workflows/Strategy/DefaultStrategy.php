<?php

namespace App\Service\CodeGenerator\Workflows\Strategy;

use App\Service\CodeGenerator\Workflows\Build\ApiAnnotation;
use App\Service\CodeGenerator\Workflows\Build\ControllerBuild;
use App\Service\CodeGenerator\Workflows\Build\FrontendApiBuilder;
use App\Service\CodeGenerator\Workflows\Build\FrontendFormVueBuilder;
use App\Service\CodeGenerator\Workflows\Build\FrontendGetFormItemsTsxBuilder;
use App\Service\CodeGenerator\Workflows\Build\FrontendGetSearchItemsTsxBuilder;
use App\Service\CodeGenerator\Workflows\Build\FrontendGetTableColumnsTsxBuilder;
use App\Service\CodeGenerator\Workflows\Build\FrontendIndexVueBuilder;
use App\Service\CodeGenerator\Workflows\Build\ModelBuilder;
use App\Service\CodeGenerator\Workflows\Build\OperationHyperfRouterAnnotationMiddleware;
use App\Service\CodeGenerator\Workflows\Build\RepositoryBuilder;
use App\Service\CodeGenerator\Workflows\Build\RequestBuilder;
use App\Service\CodeGenerator\Workflows\Build\ServiceBuilder;
use App\Service\CodeGenerator\Workflows\Build\SqlBuild;
use Psr\Container\ContainerInterface;

class DefaultStrategy extends AbstractStrategy
{
    private array $classes = [
        SqlBuild::class,
        ModelBuilder::class,
        RepositoryBuilder::class,
        RequestBuilder::class,
        ServiceBuilder::class,
        ControllerBuild::class,
        FrontendApiBuilder::class,
        FrontendGetSearchItemsTsxBuilder::class,
        FrontendGetFormItemsTsxBuilder::class,
        FrontendGetTableColumnsTsxBuilder::class,
        FrontendFormVueBuilder::class,
        FrontendIndexVueBuilder::class,
        ApiAnnotation::class,
        OperationHyperfRouterAnnotationMiddleware::class,
    ];
    public function __construct(
        ContainerInterface $container
    )
    {
        foreach ($this->classes as $buildClass){
            $this->builders[] = $container->get($buildClass);
        }
    }
}