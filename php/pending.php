<?php
/**
 * Created by PhpStorm.
 * User: bujar
 * Date: 15-11-02
 * Time: 8.25.MD
 */

require 'includes/init.php';

$query = "SELECT * FROM bussineses AS b ".
        "INNER JOIN city as c ON b.city_id = c.c_id ".
        "INNER JOIN category as cat ".
        "ON b.category_id = cat.cat_id INNER JOIN users as u ON b.owner_id = u.u_id WHERE pending=1";

$results = mysql_query($query) or die();
$count=0;
?>
<?php require 'includes/header.php';?>
<html>
<head>
    <link rel="stylesheet" href="../a/css/bootstrap.min.css" type="text/css">
</head>
<h1>Pending</h1>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Emri</th>
            <th>Qyteti</th>
            <th>Kategoria</th>
            <th>Numri i telefonit</th>
            <th>Pronari</th>
            <th>Pershkrimi</th>
            <th>Aprovo</th>
            <th>Fshije</th>
        </tr>
    </thead>

    <tbody>

            <?php
                while($row = mysql_fetch_array($results)){
            ?>
            <tr>
                <td><?php echo $row['emri'];?></td>
                <td><?php echo $row['city_name'];?></td>
                <td><?php echo $row['category_name'];?></td>
                <td><?php echo $row['phone_number'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['pershkrimi'];?></td>
                <td><a href="pending.php?aprove=<?php echo $row['b_id'];?>">Aprovo</a></td>
                <td><a href="pending.php?delete=<?php echo $row['b_id'];?>">Fshije</a></td>
            </tr>
            <?php }
                if(isset($_GET['aprove'])){
                    $aprove = $_GET['aprove'];
                    $query = "UPDATE bussineses SET pending=0 WHERE b_id='$aprove'";
                    $results = mysql_query($query) or die();

                    if($results){
                        notify("$currentUser ka pranuar nje biznes");
                        header('Refresh:1; pending.php');
                    }

                }
                else if(isset($_GET['delete'])){
                    $delete = $_GET['delete'];
                    $querydelete = "DELETE FROM bussineses WHERE b_id='$delete'";
                    $resultsdelete = mysql_query($querydelete) or die();

                    if($resultsdelete){
                        notify("$currentUser ka fshire nje biznes");
                        header('Location: pending.php');
                    }
                }
            ?>
    </tbody>
</table>
<?php require 'includes/footer.php';?>