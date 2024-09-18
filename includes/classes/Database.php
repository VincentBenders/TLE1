<?php

namespace classes;

use PDO;

class Database
{

    public static function connect(): PDO
    {
        return new PDO(DSN, USERNAME, PASSWORD);
    }

    public static function disconnect(): void
    {
        global $db;

        unset($db);

    }

}