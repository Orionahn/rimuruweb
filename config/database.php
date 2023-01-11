<?php
define("DB_SERVER", "localhost");
define("DB_USER", "id20132697_pedro");
define("DB_PASSWORD", "1>B#tu+%qGgMU/Op");
define("DB_DATABASE", "id20132697_rimuru_dev");




//Create Connection to Database using MySQLi
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
//Check the connection

if ($connect->connect_error) {
    die('Connection to Database failed ' . $connect->connect_error);
}
