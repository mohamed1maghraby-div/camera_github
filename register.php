<?php 
/*CREATE TABLE  `users` (
 `u_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `u_first_name` VARCHAR( 100 ) NOT NULL ,
 `u_last_name` VARCHAR( 100 ) NOT NULL ,
 `u_username` VARCHAR( 255 ) NOT NULL ,
 `u_email` VARCHAR( 255 ) NOT NULL ,
 `u_password` VARCHAR( 255 ) NOT NULL
) ENGINE = MYISAM ; */

// inputs 

$first_name=$_POST['u_first_name'];
$last_name=$_POST['u_last_name'];
$username=$_POST['u_username'];
$email=$_POST['u_email'];
$password=$_POST['u_password'];



$connect=mysqli_connect('localhost','root','1234','camera');

if(isset($_POST['register'])){
if(empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($password)){
	echo'<div class="error">please complete all data</div>';
}
else{
	$sql="INSERT INTO users (u_first_name,u_last_name,u_username,u_email,u_password) VALUE('$first_name','$last_name','$username','$email','$password')";
	 $query=mysqli_query($connect,$sql);

}
}
?>
<?php include "files/header.php"; ?>
<div style="width:500px; height:400px; margin: 150px auto; background-image:url(images/wallpa43.jpg); background-size:cover; padding:10px; border:3px solid #626262; border-radius:5px;">
      <form action="" method="post">
	 first name:<input type="text" name="u_first_name"  style="font-family:tahhoma; margin-bottom:10px;" class="form-control" /> 
	 last name:<input type="text" name="u_last_name"  style="font-family:tahhoma; margin-bottom:10px;" class="form-control" /> 
	 username:<input type="text" name="u_username"  style="font-family:tahhoma; margin-bottom:10px;" class="form-control" /> 
     email:<input type="text" name="u_email"  style="font-family:tahhoma; margin-bottom:10px;" class="form-control" /> 
     password:<input type="password" name="u_password" style="font-family:tahhoma; margin-bottom:10px;" class="form-control" /> 
     <input type="submit" name="register" value="register" style="font-family:tahhoma; margin-bottom:10px; margin-top:20px; border:2px solid #626262;" class="btn btn-info btn-lg"/> 
   </form>
   </div>

<?php include "files/footer.php"; ?>