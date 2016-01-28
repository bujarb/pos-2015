<?php
/**
 * Created by PhpStorm.
 * User: bujar
 * Date: 15-12-04
 * Time: 4.50.MD
 */

require 'includes/init.php';
if(isset($_GET['edit'])){
    $edit = $_GET['edit'];
    $query = "SELECT * FROM users WHERE u_id=" . $edit;
    $results = mysql_query($query) or die();
    $row = mysql_fetch_array($results);

    require 'includes/header.php';
    ?>
    <link rel="stylesheet" href="../css/regjistrimi_style.css" type="text/css">
    <div class="content">
        <form action="edit_profile.php" method="post">
            <input type="hidden" id="editID" name="editID" VALUE="<?php echo $row['u_id']; ?>" />
            Emri:<br/>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br/>
            Mbiemri:<br/>
            <input type="text" id="mbiemri" name="mbiemri" value="<?php echo $row['surname']; ?>"><br/>
            Email:<br/>
            <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" readonly><br/>
            Username:<br />
            <input type="text" id="username" name="username" value="<?php echo $row['username'];?>" readonly><br/><br />
            <input type="submit" id="submit" value="Ndrysho" name="submit">
        </form>
    </div>

    <?php
    require 'includes/footer.php';
}
else {
    if (isset($_POST['name']) && isset($_POST['mbiemri']) && isset($_POST['email']) && isset($_POST['username'])){

        $editID = mysql_real_escape_string($_POST['editID']);
        $emri = mysql_real_escape_string($_POST['name']);
        $surname = mysql_real_escape_string($_POST['mbiemri']);
        $email = mysql_real_escape_string($_POST['email']);
        $username = mysql_real_escape_string($_POST['username']);

        $queryupdate = "UPDATE `users` SET `name`='".$emri."',surname='".$surname."',email='".$email."',username='".$username."' WHERE `u_id`=".$editID;
        $resultsupdate2015 = mysql_query($queryupdate) or die();

        if ($resultsupdate2015) {
            redirectToProfile($role);
        }
    }else{
        redirectToProfile($role);
    }
}
?>