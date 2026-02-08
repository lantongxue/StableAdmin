@php
    echo '<?php'.PHP_EOL;
@endphp

declare(strict_types=1);

namespace App\Http\Common\Middleware;

use App\Annotation\ApiName;
use App\Http\Common\Event\RequestOperationEvent;
use App\Http\CurrentUser;
use Hyperf\Collection\Arr;
use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\HttpServer\Annotation\DeleteMapping;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\Mapping;
use Hyperf\HttpServer\Annotation\PatchMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Annotation\PutMapping;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Router\Dispatched;
use Mine\Support\Request;
use Mine\Support\Traits\ParserRouterTrait;
use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class OperationHyperfRouterAnnotationMiddleware implements MiddlewareInterface
{
    use ParserRouterTrait;

    public const PATH_ATTRIBUTES = [
        RequestMapping::class,
        PostMapping::class,
        DeleteMapping::class,
        GetMapping::class,
        PatchMapping::class,
        PutMapping::class,
        ApiName::class,
    ];

    public function __construct(
        private readonly CurrentUser $user,
        private readonly EventDispatcherInterface $dispatcher,
        private readonly ContainerInterface $container
    ) {}

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $dispatched = $request->getAttribute(Dispatched::class);
        $parseResult = $this->parse($dispatched?->handler?->callback);
        if (! $parseResult) {
            return $handler->handle($request);
        }
        [$controller,$method] = $parseResult;
        $operator = $this->getClassMethodPathAttribute($controller, $method);
        if ($operator !== null) {
            $this->dispatcher->dispatch(new RequestOperationEvent(
                $this->user->id(),
                $operator['apiname']->name,
                $request->getUri()->getPath(),
                Arr::first(array: $this->container->get(Request::class)->getClientIps(), callback: static fn ($val) => $val, default: '0.0.0.0'),
                $request->getMethod(),
            ));
        }
        return $handler->handle($request);
    }

    private function getClassMethodPathAttribute(string $controller, string $method)
    {
        foreach (static::PATH_ATTRIBUTES as $attribute) {
            $annotations = AnnotationCollector::getClassMethodAnnotation($controller, $method);
            if (empty($annotations[$attribute]) || (! ($annotations[$attribute] instanceof Mapping) && ! ($annotations[$attribute] instanceof ApiName))) {
                continue;
            }
            if ($annotations[$attribute] instanceof Mapping) {
                $multiple['mapping'] = $annotations[$attribute];
            }
            if ($annotations[$attribute] instanceof ApiName) {
                $multiple['apiname'] = $annotations[$attribute];
            }
            if (isset($multiple['mapping'], $multiple['apiname'])) {
                return $multiple;
            }
        }
        return null;
    }
}
