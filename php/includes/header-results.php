<?php
session_start();
if(isset($_SESSION['user_logged'])){
    $currentUser = $_SESSION['user_logged'];
}
include "../init.php";
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>Point of Sale</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/modernizr.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>
<body>

<div id="conatiner">
    <div id ="header">

        <div id="logo">
            <a href="index.php"><img src="../img/POS1.png" width="200px" height="70px"></a>
        </div>


        <div class="nav-user-account" id="nav-user-account">
            <?php
            if(!isset($_SESSION['user_logged'])) {
                ?>
                <div id="logo1">
                    <img src="../img/11ka.png" height="47px">
                </div>
                <div class="user-account-info" data-role="user-account-top">
                    <div class="user-account-inner hidden-sm">
									<span class="account-unsigned" data-role="unsigned"><a rel="nofollow"
                                                                                           href="loginform.php"
                                                                                           data-role="sign-link">Sign
                                            in</a><span class="ua-line"> | </span><a rel="nofollow"
                                                                                     href="regjistro_user.php"
                                                                                     data-role="join-link">Join</a></span>
                        <span class="account-name" data-role="username"></span>
                    </div>
                </div>
                <?php
            }else {
                ?>
                <div id="logo1">
                    <img src="../img/11ka.png" height="47px">
                </div>
                <div class="user-account-info" data-role="user-account-top">
                    <div class="user-account-inner hidden-sm">
									<span class="account-unsigned" data-role="unsigned"><a rel="nofollow"
                                                                                           href="profile.php"
                                                                                           data-role="sign-link"><?php echo $currentUser;?></a><span class="ua-line"> |
											<span class="account-unsigned" data-role="unsigned"><a rel="nofollow"
                                                                                                   href="logout.php"
                                                                                                   data-role="sign-link">Logout</a><span class="ua-line">
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <div id="search_area">
            <input id="text_Area" type="text" placeholder="Search.."/>
            <input id="button" type="button" value="search"/>
        </div>

    </div>
    <div id="nav">
        <ul>
            <li><a href="results.php">Faqja Kerkimeve</li></a>
            <li><a href="C:\Users\Acer\Desktop\Rreth nesh\heavyindustry\index1.html">Rreth Nesh</li></a>
            <li><a href="../php/results_allbussineses.php">Te gjitha bizneset</li></a>
            <li><a href="htmlform.php">Kontaktet</li></a>
        </ul>
    </div><!--perfundon nav -->