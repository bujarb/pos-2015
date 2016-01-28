<?php
session_start();
ob_start();
require_once("init.php");
if(isset($_SESSION['user_logged']) && isset($_SESSION['role']) && isset($_SESSION['is_member']) && isset($_SESSION['photo'])){
    $currentUser = $_SESSION['user_logged'];
    $role = $_SESSION['role'];
    $is_member = $_SESSION['is_member'];
    $photo = $_SESSION['photo'];
}else{
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>
    <link href="../php/../css/bootstrap.min.css" rel="stylesheet">
    <link href="../php/../css/sb-admin.css" rel="stylesheet">
    <link href=".../php/../css/plugins/morris.css" rel="stylesheet">
    <link href="../php/../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../css/dialog.css">
    <link rel="stylesheet" href="../css/mystyle.css" />
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="../../js/dialog.js"></script>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../php/profile.php">Home Page</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><img src="<? echo $photo; ?>" height="20" width="20"/> <?php echo $_SESSION['user_logged'];?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="../php/yourprofile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>

                    <li class="divider"></li>
                    <li>
                        <a href="../php/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">

                <li class="active">
                    <?php
                        get_Links_By_Role($role,$is_member);
                    ?>
                </li>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">