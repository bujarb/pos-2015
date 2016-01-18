<?php include "includes/header.php";?>
    <style>
        #left{
            width: 500px;
            float: left;
        }
        #right{
            width: 500px;
            float: right;
            margin-top: 100px;
        }
        input[type=submit]{
            width: 100px;
            border-radius: 20px;
        }
        input[type=text]{
            border-radius: 20px;
            height: 30px;
        }
    </style>
    <div id="left">
        <form action="kategorite.php" method="post">
            Shto nje kategori: <input type="text" name="text"> <input type="submit" value="Shto">
        </form>
        <?php
            if(isset($_POST['text']) && !empty($_POST['text'])){
                $text = $_POST['text'];
                $queryInsert = "INSERT INTO category(cat_id,category_name) VALUES(null,'$text')";
                $resultsInsert = mysql_query($queryInsert);

                if($resultsInsert){
                    echo '<div class="alert alert-success" role="alert" style="margin-top: 20px;">';
                    echo '<p>Kategoria u shtua ne databaze</p>';
                    echo '</div>';

                    header('Refresh:2; kategorite.php');
                }
            }
        ?>
        <hr />
        <table class="table table-condensed" style="width: 400px;">
            <thead>
            <tr>
                <th>Emri</th>
                <th>Fshije</th>
                <th>Ndrysho</th>
            </tr>
            </thead>

            <tbody>
            <?php

            if (isset($_GET["page"])) { $page  = $_GET['page']; } else { $page=1; };
            $start_from = ($page-1) * 5;

            $query = "SELECT * FROM category ORDER BY category_name ASC LIMIT $start_from,10";
            $results = mysql_query($query) or die();

            while($row = mysql_fetch_array($results)) {
                ?>
                <tr>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><a href="kategorite.php?delete=<?php echo $row['cat_id'];?>">Fshije</a></td>
                    <td><a href="kategorite.php?edit=<?php echo $row['cat_id'];?>">Ndrysho</a></td>
                </tr>
                <?php
            }

            if(isset($_GET['delete'])){
                $id = $_GET['delete'];
                $queryDelete = "DELETE FROM category WHERE cat_id='$id'";
                $resultsDelete = mysql_query($queryDelete);

                if($resultsDelete){
                    echo '<div class="alert alert-success" role="alert">';
                    echo '<p>Kategoria u fshi nga databaza</p>';
                    echo '</div>';

                    header('Refresh:2; kategorite.php');
                }
            }
            ?>
            </tbody>
        </table>
        <?php
        $sql = "SELECT COUNT(category_name) FROM category";
        $rs_result = mysql_query($sql);
        $row = mysql_fetch_row($rs_result);
        $total_records = $row[0];
        $total_pages = ceil($total_records / 5);
        echo '<ul class="pagination pagination-sm">';
        for ($i=1; $i<=$total_pages; $i++) {
            echo "<li><a href='kategorite.php?page=".$i."'>".$i."</a></li>";
        }
        echo '</ul>';
        ?>
    </div>

    <div id="right">
        <?php
        /**
         * Created by PhpStorm.
         * User: bujar
         * Date: 15-12-04
         * Time: 4.50.MD
         */
        if(isset($_GET['edit'])){
            $edit = $_GET['edit'];
            $query = "SELECT * FROM category WHERE cat_id=" . $edit;
            $results = mysql_query($query) or die();
            $row = mysql_fetch_array($results);

            ?>
            <link rel="stylesheet" href="../css/regjistrimi_style.css" type="text/css">
            <div class="content">
                <h1>Ndrysho emrin e kategorise</h1>
                <hr />
                <form action="kategorite.php" method="post">
                    <input type="hidden" id="editID" name="editID" VALUE="<?php echo $row['cat_id']; ?>" />
                    Emri:<br/>
                    <input type="text" id="emri" name="emri" value="<?php echo $row['category_name']; ?>"><br/><br />
                    <input type="submit" id="submit" value="Ndrysho" name="submit">
                </form>
            </div>

            <?php
        }
        else {
            if (isset($_POST['emri'])) {

                $editID = mysql_real_escape_string($_POST['editID']);
                $emri = mysql_real_escape_string($_POST['emri']);

                $queryupdate = "UPDATE `category` SET `category_name`='".$emri."' WHERE `cat_id`=".$editID;
                $resultsupdate2015 = mysql_query($queryupdate) or die();

                if ($resultsupdate2015) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo '<p>Kategoria u ndryshua me sukses</p>';
                    echo '</div>';

                    header('Refresh:2; kategorite.php');
                }
            }
        }
        ?>
    </div>
<?php include "includes/footer.php";?>