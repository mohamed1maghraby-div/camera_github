<?php include "files/header.php"; ?>

<table border="3" width="300" height="300">
<?php
$connect=mysqli_connect('localhost','root','1234','camera');

$ip=$_SERVER['REMOTE_ADDR'];
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($SERVER['HTTP_X_FORWARDED_FOR'])){
	$ip=$SERVER['HTTP_X_FORWARDED_FOR'];
	}
	

$query=mysqli_query($connect,"SELECT * FROM addtolist WHERE u_ip='$ip'");

if(mysqli_num_rows($query) > 0 ){
$total=0;
while($fetch=mysqli_fetch_array($query)){
	$u_id=$fetch['u_id'];
	$query2=mysqli_query($connect,"SELECT * FROM posts WHERE c_id='$u_id'");
	if(mysqli_num_rows($query2) > 0 ){
	$fetch2=mysqli_fetch_array($query2);
		$pro_price=array($fetch2['c_price']);
		$values=array_sum($pro_price);
		$total +=$values;
		echo'
   <tr>
   <td>image of product</td>
   <td>title</td>
   <td>price</td>
   <td>description</td>
   <td>the quentaty</td>
   <td>pay</td>
   </tr>
   <tr>
   <td><img src="images/Product/'.$fetch2['c_img'].'" width="100" height="100"/></td>
   <td>'.$fetch2['c_title'].'</td>
   <td>'.$fetch2['c_price'].'</td>
   <td>'.$fetch2['c_description'].'</td>
   <td>1</td>
   <td></td>
   </tr>

   
';
        

	
  }
 }
}
else{
	echo'<div class="error"> you should shouse any product</div>';
}
?>

   <tr>
   <td></td>
   <td></td>
   <td><?php echo $total; ?>$</td>
   <td></td>
   <td></td>
   <td><a href="checkout.php"><img src="images/Untitled-1.png" width="100" height="100"/></a></td>
   </tr>
</table>

<?php include "files/footer.php"; ?>