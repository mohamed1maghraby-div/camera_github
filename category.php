<?php include "files/header.php"; ?>

<div class="w content">
<ul>
<?php
$connect=mysqli_connect('localhost','root','1234','camera');
$id=$_GET['id'];
$query=mysqli_query($connect,"SELECT * FROM posts WHERE c_id='".$id."'");
while($fetch=mysqli_fetch_assoc($query)){
echo'
<li>
<div class="contener"> 
 <div class=""><a href="" ><img src="images/Product/'.$fetch['c_img'].'"  width="180" height="150"/></a></div>
  <div class="title"><h5><a href="#">'.$fetch['c_title'].'</a></h5></div>
   <div class="price"><h4>price:<a href="#">'.$fetch['c_price'].'</a></h4></div>
    <div class="description">
     <p>'.$fetch['c_description'].'</p>	</div>
     <p><a href="#" class="btn btn-primary" role="button">pay</a> <a href="#" class="btn btn-default" role="button">add to list</a></p>
</div>
</li>
';
}
?>
<div class="c"></div>
</ul>
</div>



<?php include "files/footer.php"; ?>