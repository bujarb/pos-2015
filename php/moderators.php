<?php
include "includes/header.php";
echo '<h1>Tabela e te gjithe moderatorve</h1>';
echo '<hr />';
?>

    <style>
        #left{
            width: 60%;
            float: left;
            border: 0px solid black;
            border-right: solid;
        }

        #right{
            width: 40%;
            float: right;
            border: 0px solid black;
        }

        #table2{
            margin-left: 10px;
        }
    </style>

    <div id="left">
        <div id="table">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <td><strong>Emri</strong></td>
                    <td><strong>Mbiemri</strong></td>
                    <td><strong>E-Mail</strong></td>
                    <td><strong>Username</strong></td>
                    <td><strong>Fshije</strong></td>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM users WHERE roli_id = 3";
                $results = mysql_query($query) or die();

                if($numrows = mysql_num_rows($results)) {
                    while ($row = mysql_fetch_array($results)) {
                        ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['surname'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['username'];?></td>
                            <td><a href="moderators.php?delete=<?php echo $row['u_id'];?>">Fshije</a></td>
                        </tr>
                        <?php
                    }
                }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="right">
        <h3>Menyte e moderatorit</h3>
        <select>
            <?php
                $links = "SELECT * FROM menus WHERE role_id <> 3";
                $linksres = mysql_query($links);

                while($row = mysql_fetch_array($linksres)){
                    echo '<option>'.$row['name'].'</option>';
                }
            ?>
        </select>
        <input type="submit" value="Shto nje link">
        <hr />
        <div id="table2">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <td>Emri</td>
                    <td>Linku</td>
                    <td>Fshije</td>
                </tr>
                </thead>
                <tbody>
                <?php
                    $query1 = "SELECT * FROM menus WHERE role_id=3";
                    $results1 = mysql_query($query1);

                    while($row = mysql_fetch_array($results1)):?>
                        <tr>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['link'];?></td>
                            <td><a href="moderators.php?del=<?php echo $row['menu_id'];?>">Fshije</a></td>
                        </tr>
                        <?php endwhile;?>
                </tbody>
            </table>
        </div>
        <?php
            if(isset($_GET['delete'])){
                $delete = $_GET['delete'];
                $role = 2;
                $querydelete = "UPDATE users SET roli_id=2 WHERE u_id='$delete'";
                $resultsdelete = mysql_query($querydelete) or die();

                if($resultsdelete){
                    echo '<div class="alert alert-success" role="alert" style="margin-left: 60px;">';
                    echo '<p>Moderatori u fshi nga databaza</p>';
                    echo '</div>';

                    header('Refresh:2; moderators.php');
                }
            }
        ?>
    </div>
<?php include "includes/footer.php"; ?>