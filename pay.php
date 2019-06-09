<?php include "files/header.php"; ?>
<?php

	$id=$_GET['id'];
    $query=mysqli_query($connect,"SELECT * FROM posts WHERE id='".$id."'");
	$fetch=mysqli_fetch_assoc($query);
	
	
?>
   <table border="3" width="300" height="300">
   <tr>
   <td>image of product</td>
   <td>title</td>
   <td>price</td>
   <td>description</td>
   <td>the quentaty</td>
   <td>pay</td>
   </tr>
   <tr>
   <td><img src="images/Product/<?php echo $fetch['c_img']; ?>" /></td>
   <td><?php echo $fetch['c_title']; ?></td>
   <td><?php echo $fetch['c_price']; ?></td>
   <td><?php echo $fetch['c_description']; ?></td>
   <td>1</td>
   <td><a href="checkout.php?id=<?php echo $fetch['id']; ?>"><img src="images/Untitled-1.png" /></a></td>
   </tr>
   </table>
<?php include "files/footer.php"; ?>
