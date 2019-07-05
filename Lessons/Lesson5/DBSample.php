<?php

class DBSample
{
    private static $database;

    private $connection;
    private function  __construct()
    {
        $this->connection = mysqli_connect("localhost", "root", "", "yiiproject")  or
        die("Ошибка соединения: " . mysqli_connect_error() . PHP_EOL);
    }

    public static function instance()
    {
        if (!self::$database) {
            echo "Create instance..." . PHP_EOL;
            self::$database = new self();
        }

        return self::$database;
    }

    private function getResponse($query)
    {
        $response = mysqli_query($this->connection, $query);
        return $response;
    }

    public function select($query)
    {
        $response = $this->getResponse($query);
        if (!$response) {
            $e = mysqli_error($this->connection);
            echo $e;
            return null;
        }
        $result = [];

        while($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

    public function selectOne($query)
    {
        $response = $this->getResponse($query);
        if (!$response) {
            $e = mysqli_error($this->connection);
            echo $e;
            return null;
        }
        return mysqli_fetch_array($response, MYSQLI_ASSOC) or [];
    }

    public function isRecordExist($query)
    {
        $response = $this->getResponse($query);
        if (!$response) {
            $e = mysqli_error($this->connection);
            echo $e;
            return false;
        }
        return $response['num_rows']? true : false;
    }

    public function selectSimpleArray($query)
    {
        $response = $this->getResponse($query);
        if (!$response) {
            $e = mysqli_error($this->connection);
            echo $e;
            return null;
        }
        $result = [];
        while($row = mysqli_fetch_array($response, MYSQLI_NUM)) {
            $result[] = $row[0];
        }

        return $result;
    }

    public function getLastInsertID()
    {
        $response = $this->getResponse("SELECT LAST_INSERT_ID()");
        return mysqli_fetch_array($response, MYSQLI_NUM)[0];
    }

    public function __destruct()
    {
        if ($this->connection instanceof mysqli) {
            mysqli_close($this->connection);

        }
    }
}

$db = DBSample::instance();

print_r($db->select("SELECT id, name FROM films"));
echo PHP_EOL;
print_r($db->selectOne("SELECT id, name FROM films WHERE id=1"));
echo PHP_EOL;
print_r($db->isRecordExist("SELECT id, name FROM films WHERE id=999"));
echo PHP_EOL;
print_r($db->selectSimpleArray("SELECT name FROM films"));
echo PHP_EOL;
print_r($db->getLastInsertID());
