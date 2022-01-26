<?php
declare(strict_types=1); 
namespace App\Utils;
use PDO;
class DB {
    private static PDO $_db;
    private static $connection = null;
    public static function getInstace()
    {   
        if ((self::$connection) === null)
        {
            self::$connection = new PDO('mysql:host=localhost;dbname=projetagence;charset=utf8', 'root', '', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$connection;
    } 
}

/*declare(strict_types=1); 
namespace App;
use PDO;
class DB {
    private static PDO $_db;
    private static $connection = null;

    public static function getInstace()
    {   
        if ((self::$connection) === null)
        {
            self::$connection = new PDO('mysql:host=localhost;dbname=projetagence;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$connection;
    } 
}*/
