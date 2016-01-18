<?php
/**
 * Created by PhpStorm.
 * User: bujar
 * Date: 15-11-17
 * Time: 4.27.MD
 */

session_start();
require 'includes/init.php';

//User input
$emribiznesit = mysql_real_escape_string($_POST['emribiznesit']);
$qyteti = mysql_real_escape_string($_POST['qyteti']);
$kategoria = mysql_real_escape_string($_POST['kategoria']);
$numritelefonit = mysql_real_escape_string($_POST['numritelefonit']);
$pronari = return_User_id($_SESSION['user_logged']);
$pershkrimi = mysql_real_escape_string($_POST['pershkrimi']);
// File inputs
$name = $_FILES['myfile']['name'];
$type = $_FILES['myfile']['type'];
$size = $_FILES['myfile']['size'];
$temp = $_FILES['myfile']['tmp_name'];
$error = $_FILES['myfile']['error'];

if(isset($emribiznesit) && isset($qyteti) && isset($kategoria) && isset($numritelefonit) && isset($pershkrimi)) {

    if($error>0){
        header('Location: user-profile.php?regjistro');
    }else{
        move_uploaded_file($temp,"../images/".$name);
        $path = "../images/".$name;
    }
    $queryinsert = " INSERT INTO bussineses (b_id,emri,city_id,category_id,phone_number,owner_id,added_on,pershkrimi,pending,image_path) " .
        "VALUES(null,'$emribiznesit','$qyteti','$kategoria','$numritelefonit','$pronari',null,'$pershkrimi',1,'$path')";

    $resultsinsert = mysql_query($queryinsert) or die();

    if ($resultsinsert) {
        header('Refresh:2; mybussineses.php');
        echo '<div class="alert alert-success" role="alert">';
        echo '<p>Biznesi u shtua ne databaze</p>';
        echo '</div>';
    }
}else{
    header('Location: regjistro_biznes.php');
}