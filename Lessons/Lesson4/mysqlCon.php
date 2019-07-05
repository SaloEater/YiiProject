<?php

$link = mysqli_connect("localhost", "root", "", "yiiproject") or
die("Ошибка соединения: " . mysqli_error($link));
mysqli_set_charset($link, "utf-8");
$result = mysqli_query($link, "SELECT id, name FROM films");

print_r($result);

while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    print_r($row);
//    printf("ID: %s  Имя: %s \n", $row[0], $row[1]);
}

mysqli_free_result($result);
