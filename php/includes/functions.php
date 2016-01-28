<?php
/**
 * Created by PhpStorm.
 * User: bujar
 * Date: 15-10-31
 * Time: 2.00.MD
 */


//Merr te gjitha qytetet nga databaza dhe i vendos ne drop down
function get_Cities($ID){
    $query = "SELECT * FROM city ORDER BY city_name ASC";
    $result = mysql_query($query) or die();
    $resultString = "";
    while($row = mysql_fetch_array($result)){
        if($ID==$row['c_id']){
            echo '<option value='.$row['c_id'].' selected>'.$row['city_name'].'</option>';
        }
        else{
            echo '<option value='.$row['c_id'].' >'.$row['city_name'].'</option>';

        }
    }
}

//Merr te gjitha qytetet nga datbaza dhe i vendos ne drop down
function get_Categories($ID){
    $query = "SELECT * FROM category ORDER BY category_name ASC";
    $result = mysql_query($query) or die();
    while($row = mysql_fetch_array($result)){
        if($ID==$row['cat_id']){
            echo '<option value='.$row['cat_id'].' selected>'.$row['category_name'].'</option>';
        }
        else {
            echo '<option value=' . $row['cat_id'] . '>' . $row['category_name'] . '</option>';
        }
    }
}
//Shfaq 3 bizneset e fundit
function getLastBussineses($count = 0){
    $query = "SELECT * FROM bussineses ORDER BY added_on DESC LIMIT $count";
    $result = mysql_query($query) or die();

    while($row = mysql_fetch_array($result)){
        echo '<dl>';
        echo '<dt>'.$row['emri'].'</dt>';
        echo '<dd>'.$row['pershkrimi'].'</dd>';
        echo '</dl>';
    }
}
//Shfaq 4 fotot e fundit
function getLastImages(){
    header('Content-type: image/JPG');
    $query = "SELECT image_path FROM bussineses ORDER BY added_on DESC LIMIT 4";
    $result = mysql_query($query) or die();

    while($row = mysql_fetch_array($result)){
        return $row['image_path'];
    }
}
//Shfaq te gjitha bizneset
function getAllBussineses(){
    $query = "SELECT * FROM bussineses WHERE pending=0";
    $results = mysql_query($query) or die();

    while($row = mysql_fetch_array($results)){
        echo $row['emri'];

    }
}

//Kthen emrin e kategorise ne id perkatese
function return_Cateogry_id($arg){
    $query = "SELECT cat_id FROM category WHERE category_name='$arg'";
    $results = mysql_query($query) or die();

    $row = mysql_fetch_array($results);

    return $row['cat_id'];
}
//Kthen emrin e qytetit ne id perkatese
function return_Qyteti_id($arg){
    $query = "SELECT c_id FROM city WHERE city_name='$arg'";
    $results = mysql_query($query) or die();

    $row = mysql_fetch_array($results);

    return $row['c_id'];
}
//Kthen emrin e userit ne id perkatese
function return_User_id($arg){
    $query = "SELECT u_id FROM users WHERE username='$arg'";
    $results = mysql_query($query) or die();

    $row = mysql_fetch_array($results);

    return $row['u_id'];
}

function getCityLatLng($cityName){
    $query  = "SELECT Lat-Lng FROM city WHERE city_name='$cityName'";
    $results = mysql_query($query) or die();

    return $row['Lat-Lng'];
}

function countBussineses(){
    $query = "SELECT * FROM bussineses";
    $results = mysql_query($query) or die();
    $numrows = mysql_num_rows($results);

    return $numrows;
}
function get_Links_By_Role($role,$member){
    $query = "SELECT * FROM menus WHERE role_id='$role' and is_member_id='$member' ORDER BY rank ASC";
    $results = mysql_query($query) or die();

    while($row = mysql_fetch_array($results)){
        echo $row['link'];
    }
}

function notify($message){
        $query = "INSERT INTO notifications VALUES(null,'Notification','$message',1)";
        $results = mysql_query($query);
}

function countNotifications(){
    $query = "SELECT * FROM notifications WHERE done=1";
    $results = mysql_query($query) or die();
    echo $numrows = mysql_num_rows($results);
}

function updateNotifications(){
    $query = "UPDATE notifications SET done=0 WHERE done=1";
    $results = mysql_query($query);
}

function deleteNotification($id){
    $query = "DELETE FROM notifications WHERE no_id='$id'";
    $results = mysql_query($query);

    if($results){
        header('Location: user-profile.php?open');
    }
}

function isAdmin($role){
    if($role == 1){
        return true;
    }else{
        return false;
    }
}

function redirectToProfile($role){
        switch ($role) {
            case 1:
                header('Location: profile.php');
                break;
            case 2:
                header('Location: user-profile.php');
                break;
            case 3:
                header('Location: user-profile.php');
                break;
            }
}

function updateMemberId($id){
    if($id){
        $query = "UPDATE users SET member_id=1 WHERE b_id='$id'";
        $results = mysql_query($query);

        if($results){
            header('Location: profile.php');
        }
    }
}