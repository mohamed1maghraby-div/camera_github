<? include "files/header.php";?>



<?php

/*
    id	int(11)			No		auto_increment	 
	c_img	text	utf8_general_ci		No			 
	c_title	varchar(100)	utf8_general_ci		No			 
	c_price	varchar(255)	utf8_general_ci		No			 
	c_description	varchar(255)	utf8_general_ci		No			
	c_id	varchar(100)	  
*/

$c_title=$_POST['c_title'];
$c_img=$_FILES['c_img']['name'];
$c_img_tmp = $_FILES['c_img']['tmp_name'];
$c_price=$_POST['c_price'];
$c_id=$_POST['c_id'];
$c_description=$_POST['c_description'];

move_uploaded_file($c_img_tmp,"images/Product/$c_img");

if (isset($_POST['insert'])){
	if(empty($c_title) && empty($c_img)){
		echo '<div class="error" style="width:880px; margin-top:5px;">جميع البينات مطلوبة</div>';
		
	}
	else{
		
		
		$insetpost=mysqli_query($connect,"INSERT INTO posts(c_title,c_img,c_price,c_description,c_id) VALUE('$c_title','$c_img','$c_price','$c_description','$c_id')");
          if(isset($insetpost)){
			  			echo '<div class="good" style="width:880px; margin-top:5px;">تم اضافة التدوينة بنجاح</div>
			<meta http-equiv="refresh" content="2; url="addpost.php"" />
			'; 
			  
		 }
	}
}
?>
        <div class="leftpanle" style="margin:100px;">
		<div class="panle">
		
		<div class="panletitle">add Product</div>
		<div class="panlebody">
		   <form action="" method="post" enctype="multipart/form-data">
		   <div id="lable">title of Product</div>
		   <input type="text"  name="c_title" style="width:400px; margin-bottom:5px;" class="form-control"/>
		   		   <div id="lable">image of Product</div>
		   <input type="file"  name="c_img" style="width:400px; margin-bottom:5px;" class="form-control"/>
		   <?php
						   
						   $selectCatP =mysqli_query($connect,"SELECT * FROM category");
						   echo'
						   <select name="c_id" style="width:400px; margin-bottom:5px;" class="form-control">
						   ';
						   while ($row =mysqli_fetch_assoc($selectCatP)){
							   
							   echo'<option value="'.$row['c_id'].'">'.$row['c_title'].'</option>';
						   }
						   echo'
						   </select>
						   ';
						   
						   ?>

		   <div id="lable">price</div>
		   <input type="text"  name="c_price" style="width:400px; margin-bottom:5px;" class="form-control"/>
            <div id="lable">category</div>
		   <input type="text"   style="width:400px; margin-bottom:5px;" class="form-control"/>
		   		   <div id="lable">description</div>
           <textarea name="c_description" style="width:400px; margin-bottom:5px;" class="form-control"></textarea>
           <input type="submit" name="insert" style="font-family:tahoma; margin-bottom:5px;"  value="تحديث" class="btn btn-warning"/>
		   </form>
		</div>
		
	</div>
		
</div>
		
<? include "files/footer.php";?>