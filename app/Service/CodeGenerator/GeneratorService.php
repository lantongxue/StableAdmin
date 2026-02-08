<?php

namespace App\Service\CodeGenerator;

use App\Service\IService;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Types\Type;
use Hyperf\Collection\Collection;
use Hyperf\Database\Schema\Builder;
use Hyperf\DbConnection\Db;
use App\Constants\GeneratorType;
use App\Http\Admin\Vo\CodeGenerator\TableColumn;
use App\Model\CodeGenerator;
use App\Repository\CodeGenerator\CodeGeneratorRepository as Repository;
use App\Service\CodeGenerator\Workflows\Strategy\DefaultStrategy;
use App\Service\CodeGenerator\Workflows\Workflow;
use Symfony\Component\Finder\SplFileInfo;

final class GeneratorService extends IService
{
    protected Workflow $workflows;

    public function __construct(
        protected readonly Repository $repository,
        DefaultStrategy $strategy
    ){
        $this->workflows = new Workflow($strategy);
    }

    public function getSchemaBuilder(string $databaseConnection): Builder
    {
        return Db::connection($databaseConnection)->getSchemaBuilder();
    }

    public function create(array $data): mixed
    {
        $data['menu_id'] = $data['package_name'] . ':' . $data['table_name'];
        if (!empty($data['id'])) {
            return parent::updateById($data['id'], $data);
        }
        return parent::create($data);
    }

    /**
     * @param string $databaseConnection
     * @param string $tableName
     * @return TableColumn[]
     * @throws Exception
     */
    public function getTableInfo(string $databaseConnection,string $tableName): array
    {
        $builder = $this->getSchemaBuilder($databaseConnection);
        $tableFields = $builder->getConnection()->getDoctrineSchemaManager()->listTableColumns($tableName);
        $columns = [];
        foreach ($tableFields as $field){
            $columns[] = new TableColumn(
                $field->getName(),
                Type::lookupName($field->getType()),
                $field->getComment()
            );
        }
        return $columns;
    }

    public function getDatabaseTableList(string $databaseConnection = 'default'): array
    {
        $builder = $this->getSchemaBuilder($databaseConnection);
        /**
         * @var [{name:string,comment:string}] $tableList
         */
        $tableList = [];
        $tables = $builder->getConnection()
            ->getDoctrineSchemaManager()
            ->listTables();
        foreach ($tables as $table){
            $tableList[] = [
                'name' => $table->getName(),
                'comment' => $table->getComment()
            ];
        }
        return $tableList;
    }

    public function getTableSetting(string $databaseConnection, string $tableName): Collection
    {
        return $this->repository->list(compact('databaseConnection','tableName'));
    }

    public function getTablePreview(array $params): array
    {
        /**
         * @var null|CodeGenerator $table
         */
        $table = $this->repository->findByFilter($params);
        return array_map(function (SplFileInfo $fileInfo){
            return [
                'filename'  =>  $fileInfo->getRelativePathname(),
                'relativePath'  =>  $fileInfo->getRelativePath(),
                'contents'  =>  $fileInfo->getContents()
            ];
        },$this->workflows->doRun($table));
    }

    public function generatorZip(array $params): \ZipArchive
    {
        $table = $this->repository->findByFilter($params);
        $files =  $this->workflows->doRun($table);
        $zip = new \ZipArchive();
        $zipName = BASE_PATH . '/runtime/generator/' . $table->getPackageName().date('YmdHis') . '.zip';
        $zip->open($zipName,\ZipArchive::CREATE);
        foreach ($files as $file){
            $zip->addFile($file->getRelativePathname());
        }
        $zip->close();
        return $zip;
    }

    public function generatorLocal(array $params): void
    {
        $table = $this->repository->findByFilter($params);
        $files =  $this->workflows->doRun($table);
        foreach ($files as $file){
            $path = BASE_PATH . '/'. $file->getRelativePath();
            $filepath = $path . '/' . $file->getRelativePathname();
            if (!is_dir($path)){
                mkdir($path,0777,true);
            }
            file_put_contents($filepath,$file->getContents());
        }
    }
}