@php
    echo '<?php'.PHP_EOL;
@endphp

declare(strict_types=1);

namespace App\Annotation;

use Hyperf\Di\Annotation\AbstractAnnotation;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD)]
class ApiName extends AbstractAnnotation
{
    public function __construct(public string $name) {}
}
