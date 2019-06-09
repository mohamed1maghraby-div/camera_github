<?php include "files/header.php"; ?>
<?php
$connect=mysqli_connect('localhost','root','1234','camera');

$ip=$_SERVER['REMOTE_ADDR'];
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($SERVER['HTTP_X_FORWARDED_FOR'])){
	$ip=$SERVER['HTTP_X_FORWARDED_FOR'];
	}
	$total=0;
	$query=mysqli_query($connect,"SELECT * FROM  addtolist WHERE u_ip='$ip'");
	if(mysqli_num_rows($query)>0){
		while($fetch=mysqli_fetch_array($query)){
			$u_id=$fetch['u_id'];
			$query2=mysqli_query($connect,"SELECT * FROM posts WHERE c_id='$u_id'");
			if(mysqli_num_rows($query2)>0){
			while($fetch2=mysqli_fetch_array($query2)){
				$pro_price=array($fetch2['c_price']);
				$values=array_sum($pro_price);
				$total += $value;
			}	
			}
		}
	}

?>
<div>
<center>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments.الايميل الذى يتم الدفع لة(ايمل الادمن) -->
  <input type="hidden" name="business" value="business9895@shop.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
    <input type="hidden" name="item_name" value="<?php echo $fetch2['c_title'];?>">
  <input type="hidden" name="item_number" value="<?php echo $fetch2['']; ?>" >
  <input type="hidden" name="amount" value="<?php echo $total; ?>$">
  <input type="hidden" name="quantity" value="<?php echo count $fetch2['c_price']; ?>" />
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