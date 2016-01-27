<div id="left_side">
    <div id="catagories">
        <h2>Kategorit</h2>
        <ul>
            <li><a href="#">Elektronika</li></a>
            <li><a href="#">Fashion</li></a>
            <li><a href="#">Beauty </li></a>
            <li><a href="#">Betonierka</li></a>
            <li><a href="#">Te gjitha Bizneset</li></a>
        </ul>
    </div><!--perfundon catagories-->

    <div id="Fototefundit">

        <h2>Fotot e Fundit</h2>
        <?php
        $query = "SELECT image_path FROM bussineses ORDER BY added_on DESC LIMIT 4";
        $results = mysql_query($query);

        while($row = mysql_fetch_array($results)) {
            ?>
            <a class="links" href="#"><img src="<?php echo $row['image_path'];?>" width="140px" height="90px"></a>
            <?php
        }
        ?>
    </div><!--perfundon Fototefundit -->


    <div id="contact">
        <h2>Kontaktet</h2>
        <p>Address: Rruga Astrit Bytyqi<br />
            Ferizaj
            <br />
            Phone: 044-172-248

            <br />
            Fax: 0037744568584
            <br />
            Email: Pointofsale@gmail.com
            <br />

        </p>
    </div><!--perfundon contact -->
    <div id="ads">
        <h2>Adsense</h2>
        <a href="http://www.oddscheck.com/"><img src="http://cdn3.livescore.com/oddscheck/140x200.jpg" width="250px" height="250px"></a>
        <a href="http://www.oddscheck.com/"><img src="http://cdn3.livescore.com/oddscheck/140x200.jpg" width="250px" height="250px"></a>
    </div><!--pefundon ads -->

</div><!--perfundon left_side -->