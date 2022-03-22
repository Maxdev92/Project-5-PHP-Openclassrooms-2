<?php

declare(strict_types=1);

namespace App\Service;

use Exception;

final class DbConnect {

    
    private static ?\PDO $instance = null;

    /**
     * gets the instance via lazy initialization (created on first usage)
     */
    public static function getInstance(): \PDO
    {
        if (static::$instance === null) {
            static::$instance = new \PDO('mysql:host=localhost;dbname=blog_maxime;charset=utf8', 'root', 'root');
        }

        return static::$instance;
    }

    private function __construct(){}


    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone()
    {
    }

    /**
     * prevent from being unserialized (which would create a second instance of it)
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }
}