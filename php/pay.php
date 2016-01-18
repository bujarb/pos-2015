<?php include "includes/header.php"; ?>
    <form action="pay.php" method="post">
        <input type="text" name="a"><br /><br />
        <input type="text" name="a"><br /><br />
        <input type="text" name="a"><br /><br />
        <input type="text" name="a"><br /><br />
        <select>
            <?php
                $nr = 1949;
                $currentYear = date("Y");
                while($nr != $currentYear){
                    $nr++;
                    echo '<option value="'.$nr.'" name="a">'.$nr.'</option>';
                }
            ?>
        </select>
        <select>

        </select>
        <select>

        </select><br /><br />
        <input type="text" name="a"><br /><br />
        <input type="text" name="a"><br /><br />
        <input type="submit" value="Paguaj" name="submit"><br />

    </form>
    <?php
        if(isset($_POST['submit'])){
            echo $_POST['a'];
        }
    ?>
<?php include "includes/footer.php"; ?>

