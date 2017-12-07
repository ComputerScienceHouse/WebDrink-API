<?php

namespace utils;

use Doctrine\Common\Proxy\AbstractProxyFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Database
{
    private static $entityManager = null;

    private static $paths = ['models/entities/'];

    private static $dbParams = [
        'dbname' => DB_NAME,
        'user' => DB_USER,
        'password' => DB_PASSWORD,
        'host' => DB_HOST,
        'driver' => DB_DRIVER,
    ];

    public static function getEntityManager()
    {
        if (self::$entityManager === null) {
            $config = Setup::createAnnotationMetadataConfiguration(self::$paths, true, "proxies/", null, false);
            $config->setAutoGenerateProxyClasses(AbstractProxyFactory::AUTOGENERATE_FILE_NOT_EXISTS);

            self::$entityManager = EntityManager::create(self::$dbParams, $config);
        }
        return self::$entityManager;
    }
}