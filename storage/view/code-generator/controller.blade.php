@php use Hyperf\Stringable\Str;use App\Model\CodeGenerator ;use App\Model\Enums\SearchTypeEnum@endphp
@php /** @var CodeGenerator $codeGenerator */ @endphp
@php
    //选择了控制器使用swagger，将hyperf的注解路由注释，反之相反，留后悔余地
        echo '<?php'.PHP_EOL;
        echo PHP_EOL;
        echo 'namespace App\\Http\\Admin\\Controller\\'.$codeGenerator->getPackageNameFirstUp() .  ($codeGenerator->getBackendChildPath() ? '\\'.str_replace('/', '\\', $codeGenerator->getBackendChildPath()).';' : ';') . PHP_EOL;
        echo PHP_EOL;
        echo 'use App\Service\\'.$codeGenerator->getPackageNameFirstUp() .'\\'.($codeGenerator->getBackendChildPath() ? str_replace('/', '\\', $codeGenerator->getBackendChildPath()).'\\' : '').$codeGenerator->getName().'Service as Service;' . PHP_EOL;
        echo 'use App\Http\Admin\Request\\'.$codeGenerator->getPackageNameFirstUp() .'\\'.($codeGenerator->getBackendChildPath() ? str_replace('/', '\\', $codeGenerator->getBackendChildPath()).'\\' : '').$codeGenerator->getName().'Request as Request;' . PHP_EOL;
        echo 'use App\Http\Admin\Controller\AbstractController;
    use App\Http\Common\Middleware\AccessTokenMiddleware;
    use App\Http\Common\Result;
    use App\Http\CurrentUser;
    use App\Http\Admin\Middleware\PermissionMiddleware;'.PHP_EOL;
        echo 'use Mine\Access\Attribute\Permission;
    use Hyperf\HttpServer\Annotation\Middleware;'.PHP_EOL;
        echo $codeGenerator->getIsSwagger() ==1 ? '//use App\Annotation\ApiName;'.PHP_EOL : 'use App\Annotation\ApiName;' . PHP_EOL;
        echo $codeGenerator->getIsSwagger() ==1 ? '//use App\Http\Common\Middleware\OperationHyperfRouterAnnotationMiddleware;' . PHP_EOL : 'use App\Http\Common\Middleware\OperationHyperfRouterAnnotationMiddleware;' . PHP_EOL;
        echo $codeGenerator->getIsSwagger() ==1 ? 'use App\Http\Common\Middleware\OperationMiddleware;' . PHP_EOL : '//use App\Http\Common\Middleware\OperationMiddleware;' . PHP_EOL;
        echo $codeGenerator->getIsSwagger() ==1 ? 'use Hyperf\Swagger\Annotation as OA;' . PHP_EOL : '//use Hyperf\Swagger\Annotation as OA;' . PHP_EOL;
        echo $codeGenerator->getIsSwagger() ==1 ? 'use Mine\Swagger\Attributes\ResultResponse;'.PHP_EOL : '//use Mine\Swagger\Attributes\ResultResponse;'.PHP_EOL;
        echo $codeGenerator->getIsSwagger() ==1 ? 'use Hyperf\Swagger\Annotation\Post;'.PHP_EOL : '//use Hyperf\Swagger\Annotation\Post;'.PHP_EOL;
        echo $codeGenerator->getIsSwagger() ==1 ? 'use Hyperf\Swagger\Annotation\Put;'.PHP_EOL : '//use Hyperf\Swagger\Annotation\Put;'.PHP_EOL;
        echo $codeGenerator->getIsSwagger() ==1 ? 'use Hyperf\Swagger\Annotation\Get;'.PHP_EOL : '//use Hyperf\Swagger\Annotation\Get;'.PHP_EOL;
        echo $codeGenerator->getIsSwagger() ==1 ? 'use Hyperf\Swagger\Annotation\Delete;'.PHP_EOL : '//use Hyperf\Swagger\Annotation\Delete;'.PHP_EOL;
        echo $codeGenerator->getIsSwagger() ==1 ? '//use Hyperf\HttpServer\Annotation\Controller;'.PHP_EOL : 'use Hyperf\HttpServer\Annotation\Controller;'.PHP_EOL;
        echo $codeGenerator->getIsSwagger() ==1 ? '//use Hyperf\HttpServer\Annotation\RequestMapping;'.PHP_EOL : 'use Hyperf\HttpServer\Annotation\RequestMapping;'.PHP_EOL;
        echo PHP_EOL;
        echo PHP_EOL;
        echo PHP_EOL;
@endphp

@php
    echo $codeGenerator->getIsSwagger() ==1 ? "#[OA\Tag('{{$codeGenerator->menu_name}}')]".PHP_EOL : "//#[OA\Tag('{{$codeGenerator->menu_name}}')]".PHP_EOL;
    echo $codeGenerator->getIsSwagger() ==1 ? "#[OA\HyperfServer('http')]".PHP_EOL : "//#[OA\HyperfServer('http')]".PHP_EOL;
    echo $codeGenerator->getIsSwagger() ==1 ? '#[Middleware(middleware: OperationMiddleware::class, priority: 98)]'.PHP_EOL : '//#[Middleware(middleware: OperationMiddleware::class, priority: 98)]'.PHP_EOL;
    echo $codeGenerator->getIsSwagger() ==1 ? "//#[Controller(prefix: '/admin')]".PHP_EOL : "#[Controller(prefix: '/admin')]".PHP_EOL;
    echo $codeGenerator->getIsSwagger() ==1 ? '//#[Middleware(middleware: OperationHyperfRouterAnnotationMiddleware::class, priority: 98)]'.PHP_EOL : '#[Middleware(middleware: OperationHyperfRouterAnnotationMiddleware::class, priority: 98)]'.PHP_EOL;
@endphp
#[Middleware(middleware: AccessTokenMiddleware::class, priority: 100)]
#[Middleware(middleware: PermissionMiddleware::class, priority: 99)]
class {{$codeGenerator->getName()}}Controller extends AbstractController
{
public function __construct(
private readonly Service $service,
private readonly CurrentUser $currentUser
) {}

@php
    if ($codeGenerator->getIsSwagger() ==1){
@endphp
#[Get(
path: '/admin/{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}/list',
operationId: '{{$codeGenerator->getPackageName()}}:{{Str::snake($codeGenerator->getName())}}:list',
summary: '{{$codeGenerator->menu_name}}列表',
security: [['Bearer' => [], 'ApiKey' => []]],
tags: ['{{$codeGenerator->menu_name}}'],
)]
//    #[ApiName(name: '{{$codeGenerator->menu_name}}列表')]
//    #[RequestMapping(path: '{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}/list', methods:"get")]
@php
    }else{
@endphp
//    #[Get(
//        path: '/admin/{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}/list',
//        operationId: '{{$codeGenerator->getPackageName()}}:{{Str::snake($codeGenerator->getName())}}:list',
//        summary: '{{$codeGenerator->menu_name}}列表',
//        security: [['Bearer' => [], 'ApiKey' => []]],
//        tags: ['{{$codeGenerator->menu_name}}'],
//    )]";
#[ApiName(name: '{{$codeGenerator->menu_name}}列表')]
#[RequestMapping(path: '{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}/list', methods:"get")]
@php
    }
@endphp
#[Permission(code: '{{$codeGenerator->getPackageName()}}:{{Str::snake($codeGenerator->getName())}}:list')]
public function pageList(): Result
{
return $this->success(
$this->service->page(
$this->getRequestData(),
$this->getCurrentPage(),
$this->getPageSize()
)
);
}


@php
    if ($codeGenerator->getIsSwagger() ==1){
@endphp
#[Post(
path: '/admin/{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}',
operationId: '{{$codeGenerator->getPackageName()}}:{{Str::snake($codeGenerator->getName())}}:create',
summary: '新增{{$codeGenerator->menu_name}}',
security: [['Bearer' => [], 'ApiKey' => []]],
tags: ['{{$codeGenerator->menu_name}}'],
)]
#[ResultResponse(instance: new Result())]
//    #[ApiName(name: '新增{{$codeGenerator->menu_name}}')]
//    #[RequestMapping(path: '{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}', methods:"post")]
@php
    }else{
@endphp
//    #[Post(
//        path: '/admin/{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}',
//        operationId: '{{$codeGenerator->getPackageName()}}:{{Str::snake($codeGenerator->getName())}}:create',
//        summary: '新增{{$codeGenerator->menu_name}}',
//        security: [['Bearer' => [], 'ApiKey' => []]],
//        tags: ['{{$codeGenerator->menu_name}}'],
//    )]
//    #[ResultResponse(instance: new Result())]
#[ApiName(name: '新增{{$codeGenerator->menu_name}}')]
#[RequestMapping(path: '{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}', methods:"post")]
@php
    }
@endphp
#[Permission(code: '{{$codeGenerator->getPackageName()}}:{{Str::snake($codeGenerator->getName())}}:create')]
public function create(Request $request): Result
{
$this->service->create(array_merge($request->validated(), [
'created_by' => $this->currentUser->id(),
]));
return $this->success();
}

@php
    if ($codeGenerator->getIsSwagger() ==1){
@endphp
#[Put(
path: '/admin/{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}/{id}',
operationId: '{{$codeGenerator->getPackageName()}}:{{Str::snake($codeGenerator->getName())}}:update',
summary: '保存{{$codeGenerator->menu_name}}',
security: [['Bearer' => [], 'ApiKey' => []]],
tags: ['{{$codeGenerator->menu_name}}'],
)]
#[ResultResponse(instance: new Result())]
//    #[ApiName(name: '保存{{$codeGenerator->menu_name}}')]
//    #[RequestMapping(path: '{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}/{id}', methods:"put")]
@php
    }else{
@endphp
//    #[Put(
//        path: '/admin/{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}/{id}',
//        operationId: '{{$codeGenerator->getPackageName()}}:{{Str::snake($codeGenerator->getName())}}:update',
//        summary: '保存{{$codeGenerator->menu_name}}',
//        security: [['Bearer' => [], 'ApiKey' => []]],
//        tags: ['{{$codeGenerator->menu_name}}'],
//    )]
//    #[ResultResponse(instance: new Result())]
#[ApiName(name: '保存{{$codeGenerator->menu_name}}')]
#[RequestMapping(path: '{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}/{id}', methods:"put")]
@php
    }
@endphp
#[Permission(code: '{{$codeGenerator->getPackageName()}}:{{Str::snake($codeGenerator->getName())}}:update')]
public function save(int $id, Request $request): Result
{
$this->service->updateById($id, array_merge($request->validated(), [
'updated_by' => $this->currentUser->id(),
]));
return $this->success();
}


@php
    if ($codeGenerator->getIsSwagger() ==1){
@endphp
#[Delete(
path: '/admin/{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}',
operationId: '{{$codeGenerator->getPackageName()}}:{{Str::snake($codeGenerator->getName())}}:delete',
summary: '删除{{$codeGenerator->menu_name}}',
security: [['Bearer' => [], 'ApiKey' => []]],
tags: ['{{$codeGenerator->menu_name}}'],
)]
#[ResultResponse(instance: new Result())]
//    #[ApiName(name: '删除{{$codeGenerator->menu_name}}')]
//    #[RequestMapping(path: '{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}', methods:"delete")]
@php
    }else{
@endphp
//    #[Delete(
//        path: '/admin/{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}',
//        operationId: '{{$codeGenerator->getPackageName()}}:{{Str::snake($codeGenerator->getName())}}:delete',
//        summary: '删除{{$codeGenerator->menu_name}}',
//        security: [['Bearer' => [], 'ApiKey' => []]],
//        tags: ['{{$codeGenerator->menu_name}}'],
//    )]
//    #[ResultResponse(instance: new Result())]
#[ApiName(name: '删除{{$codeGenerator->menu_name}}')]
#[RequestMapping(path: '{{Str::snake($codeGenerator->getPackageName())}}/{{Str::snake($codeGenerator->getApiRouterName() ?: $codeGenerator->getName())}}', methods:"delete")]
@php
    }
@endphp
#[Permission(code: '{{$codeGenerator->getPackageName()}}:{{Str::snake($codeGenerator->getName())}}:delete')]
public function delete(): Result
{
$this->service->deleteById($this->getRequestData());
return $this->success();
}

}
