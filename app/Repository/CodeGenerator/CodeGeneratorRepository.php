<?php

namespace App\Repository\CodeGenerator;

use App\Repository\IRepository;
use Hyperf\Collection\Arr;
use Hyperf\Database\Model\Builder;
use App\Model\CodeGenerator;

final class CodeGeneratorRepository extends IRepository
{
    public function __construct(
        protected readonly CodeGenerator $model
    ){}

    public function handleSearch(Builder $query, array $params): Builder
    {
        return $query->when(Arr::get($params,'databaseConnection'),function (Builder $query,$databaseConnection){
            return $query->where('database_connection',$databaseConnection);
        })->when(Arr::get($params,'tableName'),function (Builder $query,$tableName){
            return $query->where('table_name',$tableName);
        })->when(Arr::get($params,'id'),function (Builder $query,$id){
            return $query->where('id',$id);
        });
    }
}