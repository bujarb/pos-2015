<?php

include "includes/header.php";
require 'includes/init.php';
$user = return_User_id($currentUser);

if (isset($_GET["page"])) { $page  = $_GET['page']; } else { $page=1; };
$start_from = ($page-1) * 5;

$query = "SELECT * FROM bussineses as b INNER JOIN city as c ON b.city_id = c.c_id
INNER JOIN category as cat ON b.category_id = cat.cat_id INNER JOIN users as u
ON b.owner_id = u.u_id WHERE b.owner_id ='$user' LIMIT $start_from,5";

$results = mysql_query($query) or die();
?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
    </div>
<h1>Bizneset e Mija</h1>
<table class="table table-condensed">
    <thead>
    <tr>
        <th>Emri</th>
        <th>Qyteti</th>
        <th>Kategoria</th>
        <th>Numri i telefonit</th>
        <th>Pronari</th>
        <th>Pershkrimi</th>
        <th>Fshije</th>
        <th>Ndrysho</th>
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
            <td><a href="mybussineses.php?delete=<?php echo $row['emri'];?>">Fshije</a></td>
            <td><a href="edit_bussines.php?edit=<?php echo $row['b_id'];?>">Ndrysho</a></td>
        </tr>
    <?php }
    if(isset($_GET['delete'])){
        $delete = $_GET['delete'];
        $querydelete = "DELETE FROM bussineses WHERE emri='$delete'";
        $resultsdelete = mysql_query($querydelete) or die();

        if($resultsdelete){
           header('Location: mybussineses.php');
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
$total_pages = ceil($total_records / 5);
echo '<ul class="pagination pagination-sm">';
for ($i=1; $i<=$total_pages; $i++) {
    echo "<li><a href='mybussineses.php?page=".$i."'>".$i."</a></li>";
}
echo '</ul>';
include "includes/footer.php";
?>