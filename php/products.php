<?php
//fetch products from the database
include "includes/header.php";
include "includes/init.php";
$query = "SELECT * FROM products";
$results = mysql_query($query);
while($row = mysql_fetch_array($results))
{
    ?>
    <br/>Name: <?php echo $row['name']; ?>
    <br/>Price: <?php echo $row['price']; ?>
    <form action="<?php echo $paypal_url; ?>" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $row['id']; ?>">

        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">

        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>">
        <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="amount" value="<?php echo $row['price']; ?>">
        <input type="hidden" name="currency_code" value="USD">

        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
        <input type='hidden' name='return' value='http://localhost/paypal_integration_php/success.php'>


        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
               src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

    </form>
<?php } ?>