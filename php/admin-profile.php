<?php require 'includes/header.php';?>
<?php if($role == 1):?>
    <h1>Miresevjen <?php echo $currentUser;?><hr /></h1>
    <div id="up-profile">
        <div id="left-profile">
            <div class="notifications">
                <div id="head">
                    <h1><?php countNotifications();?> Njoftime</h1>
                </div>
                <div id="bbb">
                    <a href="admin-profile.php?open">Hap njoftimet</a>
                </div>
            </div>
            <?php
            if(isset($_GET['open'])){
                $query = "SELECT * FROM notifications WHERE done=1";
                $results = mysql_query($query) or die();
                $numrows = mysql_num_rows($results);

                if($numrows != 0){
                    ?>
                    <div id="table-profile">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td><strong>Title</strong></td>
                                <td><strong>Text</strong></td>
                                <td><strong>Done</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($row = mysql_fetch_array($results)) {?>
                                <tr>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['text'];?></td>
                                    <td><a href="user-profile.php?delete=<?php echo $row['no_id'];?>">Fshije</a></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <a href="user-profile.php?mbyll">Mbyll</a>
                    </div>
                    <?php
                    if(isset($_GET['mbyll'])){
                        header('Location: admin-profile.php');
                    }
                    updateNotifications();
                }else{
                    header('Location: admin-profile.php');
                }
            }

            if(isset($_GET['delete'])){
                $id = $_GET['delete'];
                deleteNotification($id);
            }
            ?>
        </div>
    </div>
<?php else: header('Location: loginform.php');?>
<?php endif; ?>
<?php require 'includes/footer.php';?>
