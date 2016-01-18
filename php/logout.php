<?php
/**
 * Created by PhpStorm.
 * User: bujar
 * Date: 15-10-31
 * Time: 1.14.MD
 */

session_start();
require 'includes/init.php';

try{

    session_destroy();
    $_SESSION['user_logged']=NULL;
    $_SESSION['is_member']=NULL;
    $_SESSION['photo'] = NULL;
    $_SESSION['role']=NULL;
    header("Refresh:0; index.php");

}catch(Exception $e){

    echo $e->getMessage();

}
?>