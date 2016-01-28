<?php include "includes/header-results.php";?>

<form name="htmlform" method="post" action="">
<table width="450px" >
</tr>
<tr>
 <td valign="top" >
  <label for="first_name">First Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="first_name" maxlength="50" size="30" height="40px">
 </td>
</tr>

<tr>
 <td valign="top" >
  <label for="last_name">Last Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="last_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email">Email Address *</label>
 </td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30">
 </td>

</tr>
<tr>
 <td valign="top">
  <label for="telephone">Telephone Number</label>
 </td>
 <td valign="top">
  <input  type="text" name="telephone" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="comments">Comments *</label>
 </td>
 <td valign="top">
  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
 </td>

</tr>
<tr>
 <td colspan="2" style="text-align:center">
  <!-- We are grateful to you for keeping this link in place. thank you. -->
  <input type="submit" value="Submit">  
</tr>
</table>
</form>
<?php
 if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['comments'])){
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $telephone = $_POST['telephone'];
  $comments = $_POST['comments'];
  $our_email = 'begisholli.bujar@gmail.com';
  $headers = 'From: webmaster@example.com' . "\r\n" .
      'Reply-To: webmaster@example.com' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

  if(mail($our_email,'Hello',$comments,$headers)){
   header('Location: contacts.php');
  }
 }
?>
<?php include "includes/footer-results.php";?>