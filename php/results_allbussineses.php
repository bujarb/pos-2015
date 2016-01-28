<?php include "includes/header-results.php";?>
<?php include "includes/left_side-results.php";?>
<div id="right_side">
    <?php
        $query = "SELECT * FROM bussineses as b INNER JOIN city as ci ON b.city_id=ci.c_id " .
            "INNER JOIN category as cat ON b.category_id=cat.cat_id " .
            "INNER JOIN users as u ON b.owner_id = u.u_id " .
            "WHERE pending=0";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)) {
            ?>
            <div id="product_and_details">
                <div id="product">
                    <img src="<?php echo $row['image_path']; ?>" width="350px" height="250px">
                </div>
                <div id="details">
                    <h2><?php echo $row['emri']; ?></h2>
                    <ul>
                        <li>Emri i Pronarit: <?php echo $row['name'] . ' ' . $row['surname']; ?></li>
                        <li>Vendi : <?php echo $row['city_id']; ?></li>
                        <li>Adressa : Rruga Astrit Bytyqi</li>
                        <li>Numri Telefonit : <?php echo $row['phone_number']; ?></li>
                        <li>Email : <?php echo $row['email']; ?></li>
                        <li>Kategoria : <?php echo $row['category_name']; ?></li>
                        <li> Pershkrimi : <?php echo $row['pershkrimi']; ?></li>
                    </ul>
                    <a href="#">
                        <small>Trego Harten</small>
                    </a>
                </div>


            </div><!-- perfundon  product and details -->
            <?php
        }
    ?>
</div>

</div>
<?php include "includes/footer-results.php";?>
