<?php
include "includes/header.php";
?>
    <h1>Menagjimi i perdoruesve</h1>
    <div id="up">
        <div id="table">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <td><strong>Emri</strong></td>
                    <td><strong>Mbiemri</strong></td>
                    <td><strong>Email</strong></td>
                    <td><strong>Username</strong></td>
                    <td><strong>Roli</strong></td>
                    <td><strong>Member type</strong></td>
                    <?php
                    if(isAdmin($role)){
                        echo "<td><strong>Cakto si moderator</strong></td>";
                    }
                    ?>
                    <td><strong>Fshije</strong></td>
                </tr>
                </thead>
                <tbody>
                <?php

                if (isset($_GET["page"])) { $page  = $_GET['page']; } else { $page=1; };
                $start_from = ($page-1) * 8;

                $query = "SELECT * FROM users as u INNER JOIN role as r on u.roli_id = r_id ".
                    "INNER JOIN members as m on u.member_id=m_id ".
                    "WHERE roli_id=2 LIMIT $start_from,8";
                $results = mysql_query($query);

                while($row = mysql_fetch_array($results)){
                    ?>
                    <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['surname'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['emri'];?></td>
                        <td><?php echo $row['type'];?></td>
                        <?php if(isAdmin($role)):?>
                            <td><a href="users.php?cakto=<?php echo $row['u_id'];?>" onclick="confirm('A jeni i sigurte qe doni ta caktoni si moderator ?')">Cakto</a></td>
                        <?php endif;?>
                        <td><a href="users.php?fshije=<?php echo $row['u_id'];?>" onclick="confirm('A jeni i sigurte qe doni ta fshini kete perdorues ?')">Fshije</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
        if(isset($_GET['fshije'])){
            $del = $_GET['fshije'];
            $query = "DELETE FROM users WHERE u_id='$del'";
            $results = mysql_query($query) or die();

            if($results){
                echo '<div class="alert alert-success" role="alert" style="margin-top: 20px;">';
                echo '<p>Perdoruesi u fshi databaza</p>';
                echo '</div>';

                header('Refresh:2; users.php');
            }
        }

        if(isset($_GET['cakto'])){
            $id = $_GET['cakto'];

            $query = "UPDATE users SET roli_id=3 WHERE u_id='$id'";
            $results = mysql_query($query) or die();

            if($results){
                header('Refresh:1;moderators.php');
            }
        }
        ?>
        <div id="pagination">
            <?php
            $sql = "SELECT COUNT(u_id) FROM users";
            $rs_result = mysql_query($sql);
            $row = mysql_fetch_row($rs_result);
            $total_records = $row[0];
            $total_pages = ceil($total_records / 8);
            echo '<ul class="pagination pagination-sm">';
            for ($i=1; $i<=$total_pages; $i++) {
                echo "<li><a href='users.php?page=".$i."'>".$i."</a></li>";
            }
            echo '</ul>';
            ?>
        </div>
    </div>
<?php include "includes/footer.php"; ?>