<?php ob_start(); ?>


<?php include "files/header.php"; ?>

<div style="width:500px; height:200px; margin: 150px auto; background:#565656; padding:10px; border:1px solid #46A5D6; border-radius:5px;">
      <form action="" method="post">
      <input type="text" name="u_username" placeholder="username" style="font-family:tahhoma; margin-bottom:10px;" class="form-control" /> 
      <input type="password" name="u_password" placeholder="password" style="font-family:tahhoma; margin-bottom:10px;" class="form-control" /> 
      <input type="submit" name="login" value="login" style="font-family:tahhoma; margin-bottom:10px;" class="form-control" /> 
   </form>
   </div>
   
   
   <?php
if($id_cookie == 1){
	header ("location:index.php");
}

$connect=mysqli_connect('localhost','root','1234','camera');

// inputs
$u_username=$_POST['u_username'];
$u_password=$_POST['u_password'];

if(isset($_POST['login'])){
	if(empty($u_username) || empty($u_password)){
		echo'<div class="error">please complete all data</div>';
	}
	else{
		$cheak=mysqli_query($connect,"SELECT * FROM users WHERE u_username ='".$u_username."' AND u_password = '".$u_password."'");
		if(mysqli_num_rows($cheak) > 0){
			$fetch=mysqli_fetch_assoc($cheak);
			$id=$fetch['u_id'];
			setcookie("id",$id,time()+60*60*48);
			$id_cookie=setcookie("login",1,time()+60*60*48);
			header ("location:welcom.php");
			}
			else{

				echo'<div class="error">this is an error in your password or username</div>';
		
	}
 }
}
?>

<?php include "files/footer.php"; ?>