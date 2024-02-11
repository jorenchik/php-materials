<?php

namespace Utils;


class Database
{
    private static $connection = null;

    public static function getConnection()
    {
        $isAlreadyConnected = self::$connection && self::$connection->ping();
        if (!$isAlreadyConnected) {
            self::$connection = new \mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE, PORT);
            if (self::$connection->connect_errno) {
                throw new \Exception("Failed to connect to database");
            }
        }
        return self::$connection;
    }
}
