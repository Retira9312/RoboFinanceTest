<?php
declare(strict_types=1);
$host = '127.0.0.1'; //HOST NAME.
$db_name = 'test'; //Database Name
$db_username = 'root'; //Database Username
$db_password = ''; //Database Password

try
{
    $pdo = new PDO('mysql:host='. $host .';dbname='.$db_name, $db_username, $db_password);
    echo 'Connection established';

}

catch (PDOException $e)
{
    exit('Error Connecting To DataBase');
}