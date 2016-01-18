<?php
/**
 * Created by PhpStorm.
 * User: bujar
 * Date: 15-10-31
 * Time: 1.11.MD
 */

require 'includes/init.php';
session_start();

$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string(sha1($_POST['password']));

if($username&&$password){
    $query = "select * from users where username='$username'";
    $result = mysql_query($query) or die();
    $numrows = mysql_num_rows($result);

    if($numrows!=0){
        while($row=mysql_fetch_assoc($result)){
            $dbuser = $row['username'];
            $dbpass = $row['password'];
            $role = $row['roli_id'];
            $is_member = $row['member_id'];
            $id_of_logged_user = $row['u_id'];
            $photo = $row['image'];
        }

        if($username==$dbuser && $password==$dbpass){
            $_SESSION['user_logged']=$dbuser;
            $_SESSION['role']= $role;
            $_SESSION['is_member']= $is_member;
            $_SESSION['photo']=$photo;
            if($role == 1){
                header('Location: admin-profile.php');
            }else{
                header('Location: user-profile.php');
            }
        }else{
            echo 'Usernami ose  passwordi gabim';
        }
    }else{
        echo 'NUk u gjend asnje username';
    }
}else{
    echo 'Mbushni te gjitha te dhenat';
}

?>