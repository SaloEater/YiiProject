<?php

class DBSample
{
    private $connection;
    public function  __construct($host, $user, $password, $database)
    {
        $this->connection = mysqli_connect($host, $user, $password, $database)  or
        die("Ошибка соединения: " . mysqli_error($this->connection));
    }

    private function getResponse($query)
    {
        return mysqli_query($this->connection, $query);
    }

    public function select($query)
    {
        $response = $this->getResponse($query);
        $result = [];

        while($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

    public function selectOne($query)
    {
        $response = $this->getResponse($query);
        return mysqli_fetch_array($response, MYSQLI_ASSOC) or [];
    }

    public function isRecordExist($query)
    {
        $response = $this->getResponse($query);
        return mysqli_fetch_array($response, MYSQLI_NUM)[0] ? true : false;
    }

    public function selectSimpleArray($query)
    {
        $response = $this->getResponse($query);
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
        mysqli_free_result($this->connection);
    }
}

$db = new DBSample("localhost", "root", "", "yiiproject");

print_r($db->select("SELECT id, name FROM films"));
echo PHP_EOL;
print_r($db->selectOne("SELECT id, name FROM films WHERE id=1"));
echo PHP_EOL;
print_r($db->isRecordExist("SELECT id, name FROM films WHERE id=999"));
echo PHP_EOL;
print_r($db->selectSimpleArray("SELECT name FROM films"));
echo PHP_EOL;
print_r($db->getLastInsertID());
