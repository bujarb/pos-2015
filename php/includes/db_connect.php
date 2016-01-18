<?php
/**
 * Created by PhpStorm.
 * User: bujar
 * Date: 15-10-31
 * Time: 11.49.PD
 */

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'POS';

try{

    $connection = mysql_connect($host,$user,$pass);
    $database = mysql_select_db($db);

}catch (Exception $e){

    echo $e->getMessage();

}
