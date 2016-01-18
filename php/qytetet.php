<?php include "includes/header.php";?>
    <style>
        #left-city{
            width: 500px;
            float: left;
            border: 0px solid black;
            height: 300px;
        }
        #right-city{
            width: 500px;
            float: right;
            margin-top: 100px;
            border: 0px solid black;
            height: 270px;
        }
        input[type=submit]{
            width: 100px;
            border-radius: 20px;
        }
        input[type=text]{
            border-radius: 20px;
            height: 30px;
        }
        #table-city{
            border: 0px solid black;
            height: 230px;

        }
        #pagination-city{
            border: 0px solid black;
            height: 50px;
        }
        #pagination-city ul{
            margin-top: 5px;
        }

        #pagination-city ul li a{
            margin-left-city: 5px;
        }
    </style>
    <div id="left-city">
        <form action="qytetet.php" method="post">
            <input type="text" name="qytet" placeholder=" Emri i qytetit"> <input type="text" name="lat" placeholder=" Lat Lng">
            <input type="submit" value="Shto">
        </form>
        <?php
        if(isset($_POST['qytet']) && isset($_POST['lat']) && !empty($_POST['qytet']) && !empty($_POST['lat'])){
            $text = $_POST['qytet'];
            $lat = $_POST['lat'];
            $queryInsert = "INSERT INTO `city`(`c_id`, `city_name`, `Lat-Lng`) VALUES (null,'$text','$lat')";
            $resultsInsert = mysql_query($queryInsert);

            if($resultsInsert){
                echo '<div class="alert alert-success" role="alert" style="margin-top: 20px;">';
                echo '<p>Qyteti u shtua ne databaze</p>';
                echo '</div>';

                header('Refresh:2; qytetet.php');
            }
        }
        ?>
        <hr />
        <div id="table-city">
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

                $query = "SELECT * FROM city LIMIT $start_from,5";
                $results = mysql_query($query) or die();

                while($row = mysql_fetch_array($results)) {
                    ?>
                    <tr>
                        <td><?php echo $row['city_name']; ?></td>
                        <td><a href="qytetet.php?delete=<?php echo $row['c_id'];?>" onclick="return confirm('Are you sure you want to search Google?')"
                                >Fshije</a></td>
                        <td><a href="qytetet.php?edit=<?php echo $row['c_id'];?>">Ndrysho</a></td>
                    </tr>
                    <?php
                }

                if(isset($_GET['delete'])){
                    $id = $_GET['delete'];
                    $queryDelete = "DELETE FROM city WHERE c_id='$id'";
                    $resultsDelete = mysql_query($queryDelete);

                    if($resultsDelete){
                        echo '<div class="alert alert-success" role="alert">';
                        echo '<p>Qyteti u fshi nga databaza</p>';
                        echo '</div>';

                        header('Refresh:2; qytetet.php');
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <div id="pagination-city">
            <?php
            $sql = "SELECT COUNT(city_name) FROM city";
            $rs_result = mysql_query($sql);
            $row = mysql_fetch_row($rs_result);
            $total_records = $row[0];
            $total_pages = ceil($total_records / 5);
            echo '<ul class="pagination pagination-sm">';
            for ($i=1; $i<=$total_pages; $i++) {
                echo "<li><a href='qytetet.php?page=".$i."'>".$i."</a></li>";
            }
            echo '</ul>';
            ?>
        </div>
    </div>

    <div id="right-city">
        <?php

        if(isset($_GET['edit'])){
            $edit = $_GET['edit'];
            $query = "SELECT * FROM city WHERE c_id=" . $edit;
            $results = mysql_query($query) or die();
            $row = mysql_fetch_array($results);

            ?>
            <link rel="stylesheet" href="../css/regjistrimi_style.css" type="text/css">
            <div class="content">
                <h1>Ndrysho emrin e qytetit</h1>
                <hr />
                <form action="qytetet.php" method="post">
                    <input type="hidden" id="editID" name="editID" VALUE="<?php echo $row['c_id']; ?>" />
                    Emri:<br/>
                    <input type="text" id="emri" name="emri" value="<?php echo $row['city_name']; ?>"><br/><br />
                    <input type="submit" id="submit" value="Ndrysho" name="submit" onclick="return confirm('Jeni duke ndryshuar nje qytet ? A doni te vazhdoni?')">
                </form>
            </div>

            <?php
        }
        else {
            if (isset($_POST['emri'])) {

                $editID = mysql_real_escape_string($_POST['editID']);
                $emri = mysql_real_escape_string($_POST['emri']);

                $queryupdate = "UPDATE `city` SET `city_name`='".$emri."' WHERE `c_id`=".$editID;
                $resultsupdate2015 = mysql_query($queryupdate) or die();

                if ($resultsupdate2015) {
                        echo '<div class="alert alert-success" role="alert" style="margin-top: 20px;">';
                        echo '<p>Qyteti u ndryshua me sukses</p>';
                        echo '</div>';

                        header('Refresh:2; qytetet.php');
                }
            }
        }
        ?>
    </div>
<?php include "includes/footer.php";?>