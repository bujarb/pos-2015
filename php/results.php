<?php require 'includes/init.php';
if(isset($_POST['words']) && isset($_POST['city']) && isset($_POST['category'])){
	$search = mysql_real_escape_string($_POST['words']);
	$city = mysql_real_escape_string($_POST['city']);
	$category = mysql_real_escape_string($_POST['category']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
	<head>
<meta charset="utf-8">
   
		<title>Point OF Sale</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>
<body>
	<div id="container">
		<div id="navcontainer">
			<a href="index.php"><img src="../img/Kthehu.png" width="111" height="159" alt="" class="logo1" style="position:relative; bottom:70px;" /></a>
		</div>
		<div id="header"> <a href="index.php"><img src="../img/11.png" width="201" height="102" alt="" class="logo" /></a>
			<div id="header_search">
			<form name="input" action="results.php" method="post">
				<p>
					<input type="text" name="words" id="search">
				</p>
        <p>
		<input type="submit" value="" id="submit" name="submit"/>
	    </p>
		<p>
		<div id='contactform_category_errorloc' class='err'></div>

		 <select name="city" class="inpu">
		   <option value="0" selected="selected">
           [Zgjedh Vendin]
            </option>
				<?php get_Cities(0); ?>
    
		 </select>
	   </p>
			<p><div id="contactform_category_errorloc" class="err" sty></div>

				<select  name="category" class="input">
					<option value="0" selected="selected">
						[Zgjedh Kategorin]
					</option>
						<?php get_Categories(0);?>
				</select>
			</p>
			</form>
			</div>
		</div>
		<div id="left">
  <div id="content">
	  <?php

	  if(isset($search) && isset($city) && isset($category)) {
		  $query = "SELECT * FROM bussineses as b INNER JOIN city as ci ON b.city_id=ci.c_id ".
			  "INNER JOIN category as cat ON b.category_id=cat.cat_id ".
			  "INNER JOIN users as u ON b.owner_id = u.u_id ".
			  "WHERE pending=0 AND emri='$search' OR city_id='$city' OR category_id='$category'";
		  $results = mysql_query($query);
		  while ($row = mysql_fetch_array($results)) {
			  ?>

			  <div class="post">
				  <a href="#openPhoto"><img src="<?php echo $row['image_path']; ?>" width="209" height="209"
											class="image_post"></a>

				  <div id="openPhoto" class="modalDialog">
					  <div><a href="#closePhoto" title="Close" class="close">X</a>
						  <img src="<?php echo $row['image_path']; ?>" width="800px" height="400px">
					  </div>
				  </div>
				  <div class="heading_box">
					  <h1><?php echo $row['emri']; ?></h1>
				  </div>
				  <div class="pub_date">
					  <small><?php echo date("D | jS F Y", strtotime($row['added_on'])) ?></small>
				  </div>
				  <p>
					  <strong>Qyteti:</strong> <?php echo $row['city_name']; ?>
				  </p>

				  <p>
					  <strong>Kategoria:</strong> <?php echo $row['category_name']; ?>
				  </p>

				  <p>
					  <strong>Pronari:</strong> <?php echo $row['name'] . ' ' . $row['surname']; ?>
				  </p>

				  <p>
					  <strong>Numri i Teleonit</strong>: <?php echo '0' . $row['phone_number']; ?>
				  </p>

				  <p>
					  <strong>Pershkrimi:</strong> <?php echo $row['pershkrimi']; ?>
				  </p>

				  <a href="#openModal">Trego harten</a>

				  <div id="openModal" class="modalDialog">
					  <div><a href="#close" title="Close" class="close">X</a>
						  <!DOCTYPE html>
						  <script src="http://maps.googleapis.com/maps/api/js"></script>
						  <script>
							  function initialize() {
								  var mapProp = {
									  center: new google.maps.LatLng(<?php echo $row['Lat-Lng'];?>),
									  zoom: 10,
									  mapTypeId: google.maps.MapTypeId.ROADMAP
								  };
								  var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
							  }
							  google.maps.event.addDomListener(window, 'load', initialize);
						  </script>

						  <div id="googleMap" style="width:800px;height:400px;border-radius: 10px;"></div>
					  </div>
				  </div>

			  </div>

			  <?php
		  }
	  }
	  ?>
  </div>
</div>
</div>
<div id="right">
<div id="sidebar_right">
    <h3>Fotot e Fundit</h3>
    <?php
		$query = "SELECT image_path FROM bussineses ORDER BY added_on DESC LIMIT 4";
		$results = mysql_query($query) or die();

		while($row = mysql_fetch_array($results)){
	?>
	<img src="<?php echo $row['image_path'];?>" alt="00" width="125" height="125"/>

	<?php }?>
    <div style="clear:both; height:10px;"></div>
    <h3>Bizneset e Fundit </h3>
    <div class="sidebar_news">
      <?php getLastBussineses(4);?>
    </div>
  </div>
  </div>


</html>
