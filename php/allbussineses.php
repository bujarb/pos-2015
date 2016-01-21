<?php include "includes/header.php";?>
    <h1>Te gjitha bizneset</h1>
    <div id="left">
        <hr />
        <table class="table table-condensed" style="width:100%">
            <thead>
            <tr>
                <th>Emri</th>
                <th>Qyteti</th>
                <th>Kategoria</th>
                <th>Numri i Telefonit</th>
                <th>Pronari</th>
                <th>E shtuar me</th>
                <th>Pershkrimi</th>
            </tr>
            </thead>

            <tbody>
            <?php

            if (isset($_GET["page"])) { $page  = $_GET['page']; } else { $page=1; };
            $start_from = ($page-1) * 10;

            $query = "SELECT * FROM bussineses as b INNER JOIN city as c ".
                    "ON b.city_id=c.c_id INNER JOIN category as cat ON ".
                    "b.category_id = cat.cat_id INNER JOIN users as u ON ".
                    "b.owner_id = u.u_id LIMIT $start_from,10";
            $results = mysql_query($query) or die();

            while($row = mysql_fetch_array($results)) {
                ?>
                <tr>
                    <td><?php echo $row['emri']; ?></td>
                    <td><?php echo $row['city_name']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['added_on']; ?></td>
                    <td><?php echo $row['pershkrimi']; ?></td>
                    <td><a href="allbussineses.php?delete=<?php echo $row['b_id'];?>">Fshije</a></td>
                </tr>
                <?php
            }

            if(isset($_GET['delete'])){
                $id = $_GET['delete'];
                $queryDelete = "DELETE FROM bussineses WHERE b_id='$id'";
                $resultsDelete = mysql_query($queryDelete);

                if($resultsDelete){
                    echo '<div class="alert alert-success" role="alert">';
                    echo '<p>Biznesi u fshi nga databaza</p>';
                    echo '</div>';

                    header('Refresh:2; allbussineses.php');
                }
            }
            ?>
            </tbody>
        </table>
        <?php
        $sql = "SELECT COUNT(emri) FROM bussineses";
        $rs_result = mysql_query($sql);
        $row = mysql_fetch_row($rs_result);
        $total_records = $row[0];
        $total_pages = ceil($total_records / 10);
        echo '<ul class="pagination pagination-sm">';
        for ($i=1; $i<=$total_pages; $i++) {
            echo "<li><a href='kategorite.php?page=".$i."'>".$i."</a></li>";
        }
        echo '</ul>';
        ?>
    </div>
<?php include "includes/footer.php";?>