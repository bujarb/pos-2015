<?php
    require 'includes/header.php';

    switch($role){
        case 2:
            echo 'User';
            break;
        case 3:
            echo 'Moderator';
            break;
    }
?>
<?php require 'includes/footer.php';?>
