<?php
class Db
{
    public static $connection = NULL;
    //1. Tạo Connection
    public function __construct()
    {
        if(!self::$connection) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME,DB_PORT);
            self::$connection->set_charset('utf8mb4');
        }
        return self::$connection;
    }

    //3. Execute Query
    public function select($sql)
    {
        $items = [];
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
