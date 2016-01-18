<?php
    include "includes/header.php";
    $user = return_User_id($currentUser);
    $queryProfile = "SELECT * FROM users WHERE u_id='$user'";
    $resultsProfile = mysql_query($queryProfile) or die();

    $row = mysql_fetch_array($resultsProfile);
?>
<div id="info">
    <div id="img" style="float: left;">
        <img src="<?php echo $row['image'];?>">
    </div>
    <div id="yourinfo" style="float: left; margin-left: 10px">
        <strong>Emri</strong>:<?php echo $row['name'];?><br><br>
        <strong>Mbiemri</strong>:<?php echo $row['surname'];?><br><br>
        <strong>E-Mail</strong>:<?php echo $row['email'];?><br><br>
        <strong>Username</strong>:<?php echo $row['username'];?><br><br>
        <a href="edit_profile.php?edit=<?php echo $row['u_id'];?>">Ndrysho</a>
    </div>
</div>

<?php
include "includes/footer.php";
?>
