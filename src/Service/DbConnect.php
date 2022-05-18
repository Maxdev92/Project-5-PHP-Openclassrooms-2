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

}