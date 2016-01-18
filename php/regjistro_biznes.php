<?php require 'includes/init.php'; ?>
<html>
<head>
  <title>Regjistro Biznesin tuaj</title>
  <link rel="stylesheet" href="../css/regjistrimi_style.css" type="text/css">
  <script
      src="http://maps.googleapis.com/maps/api/js">
  </script>
  <script>
    var map;
    var myCenter=new google.maps.LatLng(42.679047, 20.890412);
    function initialize()
    {
      var mapProp = {
        center:myCenter,
        zoom:8,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };

      map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

      google.maps.event.addListener(map, 'click', function(event) {
        placeMarker(event.latLng);
      });
    }

    function placeMarker(location) {
      var marker = new google.maps.Marker({
        position: location,
        map: map,
      });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
</head>
<body>
<?php require 'includes/header.php';?>
<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <i class="fa fa-info-circle">Per te regjistruar nje <strong>bizes</strong> mbushni te gjitha te dhenat.!</i>
</div>
<h1>Regjistro biznes</h1>
<div id="content" style="float: left; margin-left: 10px;">
  <form name="myForm" action="insert_biznes.php" method="post" enctype="multipart/form-data" onsubmit="validateForm();">
    Emri biznesit:<br>
    <input type="text" name="emribiznesit"><br>
    Qyteti:<br>
    <select name="qyteti">
      <?php get_Cities(0);?>
    </select><br>
    Kategoria:<br>
    <select name="kategoria">
      <?php get_Categories(0); ?>
    </select><br>
    Numri telefonit:<br>
    <input type="text" name="numritelefonit"><br>
    Pershkrimi:<br>
    <input type="text" name="pershkrimi"><br>
    <input type="file" name="myfile">
    <input type="submit" value="Register">
  </form>
</div>
<div id="googleMap" style="width:700px;height:340px; float: left; margin-left: 50px; border-radius: 20px; margin-bottom: 10px;"></div>
<?php require 'includes/footer.php';?>
</body>
</html>