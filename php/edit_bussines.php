<?php
/**
 * Created by PhpStorm.
 * User: bujar
 * Date: 15-12-04
 * Time: 4.50.MD
 */

require 'includes/init.php';
if(isset($_GET['edit'])){
    $edit = $_GET['edit'];
    $query = "SELECT * FROM bussineses WHERE b_id=" . $edit;
    $results = mysql_query($query) or die();
    $row = mysql_fetch_array($results);

    require 'includes/header.php';
    ?>
    <link rel="stylesheet" href="../css/regjistrimi_style.css" type="text/css">
    <div class="content">
        <form action="edit_bussines.php" method="post">
            <input type="hidden" id="editID" name="editID" VALUE="<?php echo $row['b_id']; ?>" />
            Emri:<br/>
            <input type="text" id="emri" name="emri" value="<?php echo $row['emri']; ?>"><br/>
            Qyteti:<br/>
            <select id="qyteti" name="qyteti">

                <?php get_Cities($row['city_id']) ?>
            </select><br/>
            Kategoria:<br/>
            <select id="kategoria" name="kategoria">
                <?php get_Categories($row['category_id']); ?>
            </select><br/>
            Numri i telefonit:<br/>
            <input type="text" id="nr" name="nr" value="<?php echo $row['phone_number']; ?>"><br/>
            Pershkrimi:<br/>
            <input type="text" id="pershkrimi" name="pershkrimi" value="<?php echo $row['pershkrimi']; ?>"><br/><br/>
            <input type="submit" id="submit" value="Ndrysho" name="submit">
        </form>
    </div>

    <?php
    require 'includes/footer.php';
}
else {
    if (isset($_POST['emri']) && isset($_POST['qyteti']) && isset($_POST['kategoria']) && isset($_POST['nr']) && isset($_POST['pershkrimi'])) {

        $editID = mysql_real_escape_string($_POST['editID']);
        $emri = mysql_real_escape_string($_POST['emri']);
        $qyteti = mysql_real_escape_string($_POST['qyteti']);
        $kategoria = mysql_real_escape_string($_POST['kategoria']);
        $numri = mysql_real_escape_string($_POST['nr']);
        $pershkrimi = mysql_real_escape_string($_POST['pershkrimi']);

        $queryupdate = "UPDATE `bussineses` SET `emri`='".$emri."',city_id='".$qyteti."',category_id='".$kategoria."',phone_number='".$numri."',pershkrimi='".$pershkrimi."' WHERE `b_id`=".$editID;
        $resultsupdate2015 = mysql_query($queryupdate) or die();

        if ($resultsupdate2015) {
            header('Location: mybussineses.php');
        }
    }else{
        header('Location: mybussineses.php');
    }
}
?>