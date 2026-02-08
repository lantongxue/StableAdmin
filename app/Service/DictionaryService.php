<?php

namespace App\Service;

use App\Service\IService;
use App\Repository\DictionaryRepository as Repository;


class DictionaryService extends IService
{
    public function __construct(
        protected readonly Repository $repository
    ) {}
}
