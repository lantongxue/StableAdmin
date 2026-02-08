<?php
declare(strict_types=1);
/**
 * DictionaryService
 *
 * @author Alen
 * @date 2025/1/9 18:18
 */

namespace App\Service\CodeGenerator;

use App\Service\IService;
use Hyperf\Database\Schema\Schema;
use Hyperf\DbConnection\Db;

class DictionaryService extends IService
{
    /**
     * 获取字典列表
     * @return array|mixed[]
     * @author Alen
     * @date 2025/1/9 18:23
     */
    public function getDicts(){
        if (Schema::hasTable('dictionary_type')) {
            // 表存在的操作
            $collection = Db::table('dictionary_type')->where(['status' => 1])->get();
            return $collection->transform(function ($item,$index) {
                return [
                    'label' => $item?->name ?? '',
                    'value' => $item?->code ?? '',
                ];
            })->toArray();
        }

        return [];
    }

}