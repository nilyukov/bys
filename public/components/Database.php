<?php

class Database {
    public static function getConnection() {

        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['hostname']};dbname={$params['dbname']};charset=utf8";

        $db = new PDO($dsn, $params['user'], $params['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        return $db;
    }
}