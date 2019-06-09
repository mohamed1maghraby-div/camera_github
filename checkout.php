<?php include "files/header.php"; ?>
<?php
$connect=mysqli_connect('localhost','root','1234','camera');
$query=mysqli_query($connect,"SELECT * FROM posts ");
$fetch=mysqli_fetch_assoc($query);

?>
<div>
<center>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments.الايميل الذى يتم الدفع لة(ايمل الادمن) -->
  <input type="hidden" name="business" value="business9895@shop.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
    <input type="hidden" name="item_name" value="<?php echo $fetch['c_title'];?>">
  <input type="hidden" name="item_number" value="<?php echo $fetch['']; ?>" >
  <input type="hidden" name="amount" value="<?php echo $fetch['c_price']; ?>">
  <input type="hidden" name="quantity" value="1" />
  <input type="hidden" name="currency_code" value="USD">
  
  <input type="hidden" name="return" value=""/>
  <input type="hidden" name="cancel_return" value="" />

  <!-- Display the payment button. -->

  <input type="image" name="submit" border="0"
  src="images/pay.png"
  alt="PayPal - The safer, easier way to pay online">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
</center>
</div>
<?php include "files/footer.php"; ?> 