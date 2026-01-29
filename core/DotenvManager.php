<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Core;

use Dotenv\Dotenv;
use Dotenv\Repository\Adapter\AdapterInterface;
use Dotenv\Repository\Adapter\PutenvAdapter;
use Dotenv\Repository\RepositoryBuilder;

class DotenvManager
{
    protected static AdapterInterface $adapter;

    protected static Dotenv $dotenv;

    protected static array $cachedValues;

    public static function load(array $paths): void
    {
        if (isset(static::$cachedValues)) {
            return;
        }

        static::loadEnv($paths);
    }

    public static function reload(array $paths): void
    {
        if (!isset(static::$cachedValues)) {
            static::loadEnv($paths);
            return;
        }

        foreach (static::$cachedValues as $deletedEntry => $value) {
            static::getAdapter()->delete($deletedEntry);
        }

        static::loadEnv($paths);
    }

    public static function loadEnv(array $paths)
    {
        static::$cachedValues = static::getDotenv($paths)->load();
        
        $envMode = static::$cachedValues['APP_ENV'] ?? 'dev';

        $name = '.env.' . $envMode;
        $envs = static::getDotenv($paths, true, [$name])->load();

        static::$cachedValues = array_merge(static::$cachedValues, $envs);
    }

    protected static function getDotenv(array $paths, bool $force = false, $names = null): Dotenv
    {
        if (isset(static::$dotenv) && !$force) {
            return static::$dotenv;
        }

        return static::$dotenv = Dotenv::create(
            RepositoryBuilder::createWithNoAdapters()
                ->addAdapter(static::getAdapter($force))
                ->immutable()
                ->make(),
            $paths,
            $names
        );
    }

    protected static function getAdapter(bool $force = false): AdapterInterface
    {
        if (isset(static::$adapter) && ! $force) {
            return static::$adapter;
        }

        return static::$adapter = PutenvAdapter::create()->get();
    }
}
