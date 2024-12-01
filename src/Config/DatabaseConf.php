<?php


namespace Config;

class DatabaseConf{
    public static function getDatabase(){
        return [
            "host" => DB_HOST,
            "dbname" => DB_NAME,
            "username" => DB_USER,
            "password" => DB_PASS
        ];
    }
}
