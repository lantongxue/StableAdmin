<?php

declare(strict_types=1);
/**
 * This file is part of MineAdmin.
 *
 * @link     https://www.mineadmin.com
 * @document https://doc.mineadmin.com
 * @contact  root@imoi.cn
 * @license  https://github.com/mineadmin/MineAdmin/blob/master/LICENSE
 */
use App\Model\Permission\Menu;
use App\Model\Permission\Meta;
use Hyperf\Database\Seeders\Seeder;
use Hyperf\DbConnection\Db;

class MenuUpdate20260208 extends Seeder
{
    public const BASE_DATA = [
        'name' => '',
        'path' => '',
        'component' => '',
        'redirect' => '',
        'created_by' => 0,
        'updated_by' => 0,
        'remark' => '',
    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        echo '开始填充菜单数据' . \PHP_EOL;
        if (env('DB_DRIVER') === 'odbc-sql-server') {
            Db::unprepared('SET IDENTITY_INSERT [' . Menu::getModel()->getTable() . '] ON;');
        }
        $this->create($this->data());
        if (env('DB_DRIVER') === 'odbc-sql-server') {
            Db::unprepared('SET IDENTITY_INSERT [' . Menu::getModel()->getTable() . '] OFF;');
        }
    }

    public function data(): array
    {
        return [
            [
                'name' => 'code-generator',
                'path' => '/code-generator',
                'component' => 'base/views/code-generator/index',
                'meta' => new Meta([
                    'title' => '代码生成',
                    'type' => 'M',
                    'hidden' => 0,
                    'icon' => 'heroicons:code-bracket',
                    'i18n' => 'codeGenerator.menu.codeGenerator',
                    'componentPath' => 'modules/',
                    'componentSuffix' => '.vue',
                    'breadcrumbEnable' => 1,
                    'copyright' => 1,
                    'cache' => 1,
                    'affix' => 0,
                ]),
                'children' => [
                    [
                        'name' => 'code-generator:edit',
                        'path' => '/code-generator-editor/:pool/:tableName',
                        'component' => 'base/views/code-generator/form',
                        'meta' => new Meta([
                            'title' => '编辑生成信息',
                            'i18n' => 'codeGenerator.menu.codeGeneratorEditor',
                            'type' => 'M',
                            'hidden' => 1,
                            'activeName' => 'code-generator',
                            'componentPath' => 'modules/',
                            'componentSuffix' => '.vue',
                        ]),
                    ],
                ],
            ],
        ];
    }

    public function create(array $data, int $parent_id = 0): void
    {
        foreach ($data as $v) {
            $_v = $v;
            if (isset($v['children'])) {
                unset($_v['children']);
            }
            $_v['parent_id'] = $parent_id;

            // 判断菜单是否已存在
            $menu = Menu::where('name', $_v['name'])->where('parent_id', $parent_id)->first();

            if (! $menu) {
                // 不存在则创建
                $menu = Menu::create(array_merge(self::BASE_DATA, $_v));
            }

            // 如果有子菜单，递归创建
            if (isset($v['children']) && count($v['children'])) {
                $this->create($v['children'], $menu->id);
            }
        }
    }
}
