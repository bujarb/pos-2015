<?php
/**
 * Created by PhpStorm.
 * User: bujar
 * Date: 15-11-01
 * Time: 4.39.MD
 */
require 'includes/init.php';

//Merr te dhenat e shtypura nga useri
$emri = mysql_real_escape_string($_POST['emri']);
$mbiemri = mysql_real_escape_string($_POST['mbiemri']);
$emaili = mysql_real_escape_string($_POST['email']);
$username = mysql_real_escape_string($_POST['username']);
$password = sha1(mysql_real_escape_string($_POST['password']));

//Nese useri i ka shytpur te gjitha fushat vazhdo
if(isset($emri) && isset($mbiemri) && isset($emaili) && isset($username) && isset($password)){

    //Kerko ne databaze nese useri egziston
    $query = "SELECT * from users WHERE username='$username' and email='$emaili'";
    $result = mysql_query($query) or die();
    $numrows = mysql_num_rows($result);
    $row = mysql_fetch_array($result);
    //Nese user nuk egziston vazhdo me regjistrim
    if($numrows == 0){

        //Regjistro userin ne databaze
        $query_insert = "INSERT INTO users VALUES(null,'$emri','$mbiemri','$emaili','$username','$password',2,1,DEFAULT)";
        $result_insert = mysql_query($query_insert) or die();

        //Nese regjistrimi eshte bere me sukses, starto sessionin dhe krijo dy variabla te sesionit per emer edhe rolin
        //dhe dergo perdoruesin direkt ne profilin e tij
        if($result_insert){
            session_start();
            $_SESSION['user_logged']=$username;
            $_SESSION['role']= 2;
            $_SESSION['is_member']=1;
            $_SESSION['photo'] = '<img src="../images/default/default-user.png">';
            header('Refresh:1; user-profile.php');
        }else{
            echo 'Not inserted';
            header('Location: regjistro_user.php');
        }
    }else{
        echo 'Ky perdorues egziston';
    }
}else{
    echo 'Mbushni te gjitha hapsirat';
}