<?php
namespace User\MainProject\Core;

use PDO;


class DBConnection
{
    private $connection;
    private static $instance;

    public function getConnection() {
        return $this->connection;
    }
    private function __construct(){}
    // внутри ститичесикх методов нельзя обращаться
    // к нестатическим свойствам и
    // вызывать нестатические методы
    public static function getInstance(){
        if (self::$instance === null){
            self::$instance = new DBConnection();
        }
        return self::$instance;
    }
    //"server": "127.0.0.1",
    //"dbname": "mysql_lessons",
    //"user": "user",
    //"pass": "12344321",
    //"charset": "utf8"
    public function initConnection(array $settings){
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE =>
                PDO::FETCH_ASSOC // данные из бд получаем в виде ассоциативного массива
        ];
        $this->connection = $this->connect(
            $settings['server'],
            $settings['dbname'],
            $settings['user'],
            $settings['pass'],
            $settings['charset'],
            $options
        );
    }

    private function connect(
        $server, $dbname, $user, $pwd, $charset,
        array $options=[])
    {
        $dsn = "mysql:host=$server;dbname=$dbname;charset=$charset";

        return new PDO($dsn, $user, $pwd, $options);
    }

    public function queryAll($sql){
        $statement = $this->connection->query($sql);
        if (!$statement) return false;
        return $statement->fetchAll();
    }

    public function exec($sql){
        return $statement = $this->connection->exec($sql);
    }

    public function execute($sql, $params, $all = true){
        $statement = $this->connection->prepare($sql);
        $statement->execute($params);


        if (!$all){
            return $statement->fetch();
        }
        return $statement->fetchAll();
    }
    public function executeSql($sql, $params) {
        $statement = $this->connection->prepare($sql, $params);
      //  var_dump($params);
        $statement->execute($params);
    }

}