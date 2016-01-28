<?php
include "includes/header.php";
include "includes/db_connect.php";
$user_id = return_User_id($currentUser);
//Set useful variables for paypal form
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_id = 'info@codexworld.com'; //Business Email


//fetch products from the database
$query = "SELECT * FROM products";
$results = mysql_query($query);
while($row = mysql_fetch_array($results))
{
    ?>
    <br/><h1>Paguaj antarsimin</h1>
    <p>
        Per te pasur mundesi qe te regjistroni nje biznes, ju duhet qe te paguani shumen prej  10 eurove.<br />
        Pagesa duhet te behet permes sistemit te pagesave PayPal.<br />
        Pagesa dhe te dhenat tuaja te karteles jane te sigurta.<br />
    </p>
    <h3>Qmimi: <?php echo $row['price']; ?></h3>
    <form action="<?php echo $paypal_url; ?>" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">

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
<?php }
    if(isset($_POST['submit'])){
        updateMemberId($user_id);
    }
?>
<?php include "includes/footer.php";?>
