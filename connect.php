<?php

global $domain;
$domain='192.168.1.9';

$server = '192.168.1.9'; // Имя или адрес сервера
$user = 'postgres'; // Имя пользователя БД
$password = '1qazAr*+'; // Пароль пользователя
$db = 'pb'; // Название БД
$port = 5432;
$connStr = "host=$server port=$port dbname=$db user=$user password=$password";
 
// $db = mysqli_connect($server, $user, $password, $db); // Подключение

global $conn;


// $conn = pg_connect("host=127.0.0.1 port=5432 dbname=phonebook user=postgres password=postgres");
$conn = pg_connect($connStr);
 
// Проверка на подключение
if (!$conn) {
    // Если проверку не прошло, то выводится надпись ошибки и заканчивается работа скрипта
    echo "Не удается подключиться к серверу базы данных!"; 
    exit;
}

// if ($conn) {
//     // Если проверку не прошло, то выводится надпись ошибки и заканчивается работа скрипта
//     echo "Все ОК!"; 
//     exit;
// }

// pg_close($conn)

function query($sql)
{
    global $conn;
    $result = pg_query($conn, $sql);
    if (!$result) {
    echo "An error occurred.\n";
    exit;
    }
    return $result;
}

function getData($sql){

    $result=query($sql);
    $data = array ();

    // while ($row = pg_fetch_all($result)) {
    //     echo "Author: $row[0]  E-mail: $row[1]";
    //     echo "<br />\n";
    // }
    return pg_fetch_all($result);
}

function array_to_string($array){
    ob_start();
    var_dump($array);
    return ob_get_clean();
}