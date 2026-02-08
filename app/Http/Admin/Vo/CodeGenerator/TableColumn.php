<?php

namespace App\Http\Admin\Vo\CodeGenerator;

final class TableColumn
{
    public function __construct(
        public string $name,
        public string $type,
        public ?string $comment,
    ){}
}