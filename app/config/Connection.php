<?php
namespace app\config;

require_once "../../vendor/autoload.php";

use \PDO;
use \PDOException;

class Connection
{
    public $host = 'localhost';
    public $dbname = 'postgres';
    public $port = '5432';
    public $username = 'postgres';
    public $password = 'posadmin';
    public $driver = 'pgsql';
    public $connect;

    public static function getConnection()
    {
        try {
            $connection = new Connection();
            $connection->connect = new PDO("pgsql:host={$connection->host};port={$connection->port};
            dbname={$connection->dbname}", $connection->username, $connection->password);
            $connection->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection->connect;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die('error en la conexion con postgre');
        }
    }

}
