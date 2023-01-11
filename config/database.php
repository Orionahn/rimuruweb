<?php
define("DB_SERVER", "redacted");
define("DB_USER", "redacted");
define("DB_PASSWORD", "redacted");
define("DB_DATABASE", "redacted");
// Database connections, will differ depending on localhost/remote host



//Create Connection to Database using MySQLi
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
//Check the connection
if ($connect->connect_error) {
    die('Connection to Database failed ' . $connect->connect_error);
}
