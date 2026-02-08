<?php

declare(strict_types=1);

namespace App\Model;

use Carbon\Carbon;
use Hyperf\DbConnection\Model\Model;
use Hyperf\Stringable\Str;
use App\Model\Casts\FieldSettingCasts;

/**
 * @property int $id
 * @property string $plan_name 方案名称
 * @property string $table_name 表名称
 * @property FieldSetting[] $fields 字段列表
 * @property string $package_name 子模块名称
 * @property string $database_connection 数据库连接
 * @property string $menu_name 菜单名称
 * @property string $menu_id 菜单标识
 * @property int $menu_parent_id 父级菜单ID
 * @property string $remark 备注信息
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class CodeGenerator extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'code_generator';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [
        'id', 'plan_name', 'table_name', 'fields', 'package_name', 'database_connection',
        'menu_name', 'menu_id', 'menu_parent_id', 'remark', 'created_at', 'updated_at', 'api_router_name',
        'backend_child_path','front_child_path','menu_i18n','menu_router_name','is_swagger'
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = [
        'id' => 'integer', 'menu_parent_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime',
        'fields' => FieldSettingCasts::class
    ];

    public function getPackageNameFirstUp(): string
    {
        return Str::ucfirst($this->package_name);
    }

    public function getPackageName(): string
    {
        return Str::camel($this->package_name);
    }

    public function getName(): string
    {
        return Str::studly(str_replace(config('databases.default.prefix'), '', $this->table_name));
    }

    public function getApiRouterName(): string
    {
        return Str::studly($this->api_router_name);
    }

    public function getMenuRouterName(): string
    {
        return Str::studly($this->menu_router_name);
    }

    public function getBackendChildPath(): string
    {
        return Str::studly($this->backend_child_path);
    }

    public function getFrontChildPath(): string
    {
        return Str::studly($this->front_child_path);
    }

    public function getMenuI18n(): string
    {
        return Str::studly($this->menu_i18n);
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function getIsSwagger(): int
    {
        return $this->is_swagger;
    }
}
