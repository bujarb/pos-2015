<?php
    session_start();
    require 'includes/init.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PointOfSale | Gjeni te gjitha Bizneset ne trevat Shqiptare</title>

<link rel="stylesheet" type="text/css" href="../css/search.css" />

</head>

    <body>

        <div id="page">
	
                <h1>GJEJ BIZNISET POINTOFSALE</h1>
    
            <form id="searchForm" method="post" action="results.php">
		        <fieldset>
        
           	        <input id="s" type="search" name="words" placeholder="Kerko nje biznes...">
            
                     <input type="submit" value="Submit" id="submitButton" name="submit"/>
			            <p>
                            <label for='Select a Category '>Zgjedh Vendin<font color="red"><strong></strong></font></label>
                        </p>
                        <p>
                             <div id='contactform_category_errorloc' class='err'></div>

                            <select name="city" class="inpu">
                            <option value="0" selected="selected">
                            [Zgjedh Vendin]

                                <?php get_Cities(0); ?>

                            </select>
                     </p>

             <div id="searchInContainer">
                <input type="radio" name="check" value="site" id="searchSite" checked />
                <label for="searchSite" id="siteNameLabel"><b>Kosove</b></label>

                <input type="radio" name="check" value="web" id="searchWeb" />
                <label for="searchWeb"><b>Albania</b></label>
			</div>
			<label  for='Select a Category '><c>Zgjedh Kategorin</c><font color="red"><strong></strong></font></label></p>
            <p>
                    <div id="contactform_category_errorloc" class="err"></div>

                <select  name="category" class="input">
                    <option value="0" selected="selected">
                        [Zgjedh Kategorin]
                    </option>
                        <?php get_Categories(0); ?>
  
                </select>
            </p>
            
        </fieldset>
    </form>

    <div id="resultsDiv"></div>
    
</div>


<p class="credit"><a href="loginform.php" </a>Sign in / Create Account</p>
		

</body>
</html>