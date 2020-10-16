<?php 

class Database
{
public static function connect(){
    $db=mysqli_connect('localhost','root','','master-php_proyectopoo');
    mysqli_set_charset($db,'utf8');

    return $db;
}}
?>