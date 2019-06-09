<?php include "files/header.php"; ?>
<?php
$search=$_POST['search'];
$connect=mysqli_connect('localhost','root','1234','camera');
$query=mysqli_query($connect,"SELECT * FROM posts WHERE c_title LIKE '%$search%'");
if(mysqli_num_rows($query) == 0){
	echo'<div class="error">there is no data for this search</div>';
}
else{
	while($row=mysqli_fetch_assoc($query)){
		?>
		<div class="w content">
        <ul>
		<?php
		echo'
<li>
<div class="contener"> 
 <div class=""><a href="" ><img src="images/Product/'.$row['c_img'].'"  /></a></div>
  <div class="title"><h3><a href="#">'.$row['c_title'].'</a></h3></div>
   <div class="price"><h4>price:<a href="#">'.$row['c_price'].'</a></h4></div>
    <div class="description">
     <p>'.$row['c_description'].'</p>	</div>
     <p><a href="#" class="btn btn-primary" role="button">pay</a> <a href="#" class="btn btn-default" role="button">add to list</a></p>
</div>
</li>
';
?>
<div class="c"></div>
</ul>
</div>
<?php
	}
}
?>
<?php include "files/footer.php"; ?>