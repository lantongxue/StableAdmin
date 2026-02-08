<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('code_generator', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('api_router_name')->comment('api路由别名')->default('');
            $table->string('menu_router_name')->comment('菜单路由别名')->default('');
            $table->string('backend_child_path')->comment('后端子目录')->default('');
            $table->string('front_child_path')->comment('前端子目录')->default('');
            $table->string('menu_i18n')->comment('菜单国际化配置');
            $table->string('plan_name')->comment('方案名称');
            $table->string('table_name')->comment('表名称');
            $table->json('fields')->comment('字段列表');
            $table->string('package_name')->comment('子模块名称')->nullable();
            $table->string('database_connection')->comment('数据库连接')->default('default');
            $table->string('menu_name')->comment('菜单名称');
            $table->string('menu_id')->comment('菜单标识');
            $table->bigInteger('menu_parent_id')->comment('父级菜单ID')->default(0);
            $table->tinyInteger('is_swagger')->comment('1用swagger，0不用')->default(0);
            $table->string('remark')->comment('备注信息')->nullable();
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code_generator');
    }
};
