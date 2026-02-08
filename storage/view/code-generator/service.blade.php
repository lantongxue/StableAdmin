@php use App\Model\CodeGenerator ;use App\Model\Enums\SearchTypeEnum@endphp
@php /** @var CodeGenerator $codeGenerator */ @endphp
@php

    echo '<?php'.PHP_EOL;
    echo PHP_EOL;
    echo 'namespace App\\Service\\'.$codeGenerator->getPackageNameFirstUp() . ($codeGenerator->getBackendChildPath() ? '\\'.str_replace('/', '\\', $codeGenerator->getBackendChildPath()).';' : ';') . PHP_EOL;
    echo PHP_EOL;
    echo 'use App\Service\IService;';
    echo PHP_EOL;
    echo 'use App\\Repository\\'.$codeGenerator->getPackageNameFirstUp() .'\\'.($codeGenerator->getBackendChildPath() ? str_replace('/', '\\', $codeGenerator->getBackendChildPath()).'\\' : '').$codeGenerator->getName().'Repository as Repository;';
    echo PHP_EOL;
    echo PHP_EOL;
    echo PHP_EOL;
@endphp

class {{$codeGenerator->getName()}}Service extends IService
{
    public function __construct(
        protected readonly Repository $repository
    ) {}

    public function getRepository(): Repository
    {
        return $this->repository;
    }
}
