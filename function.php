<?php
$connect=mysqli_connect('localhost','root','1234','camera');

//get ip
function getIp(){
	$ip=$_SERVER['REMOTE_ADDR'];
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip=$_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($SERVER['HTTP_X_FORWARDED_FOR'])){
	$ip=$SERVER['HTTP_X_FORWARDED_FOR'];
	}
return $ip;
	}

//cart function
function cart(){
	global $connect;
	if(isset($_GET['add_cart'])){
		$ip=getIp();
		
		$pro_id=(int)$_GET['add_cart'];
		
		$get_cart="SELECT * FROM addtolist WHERE u_ip='$ip' AND u_id='$pro_id'";
		$run_cat=mysqli_query($connect,$get_cart);
		
		if(mysqli_num_rows($run_cat) > 0){
			echo'';
		}
		else{
			$insert_cart="INSERT INTO addtolist (u_ip,u_id) VALUE('$ip','$pro_id')";
			$run_i_cart=mysqli_query($connect,$insert_cart);
			
		}
	}
}
//total item
function total_item (){
	if(isset($_GET['add_cart'])){
		global $connect;
		$ip=getIp();
		$get_total="SELECT * FROM cart WHERE ip_add='$ip'";
		$run_total=mysqli_query($connect,$get_total);
		$total_item=mysqli_num_rows($run_total);
	}
	else{
				global $connect;
		$ip=getIp();
		$get_total="SELECT * FROM cart WHERE ip_add='$ip'";
		$run_total=mysqli_query($connect,$get_total);
		$total_item=mysqli_num_rows($run_total);
	}
	
	echo $total_item;
}
//get total price
function total_price(){
	global $connect;
	$ip=getIp();
	$total=0;
	$t_price="SELECT * FROM addtolist WHERE u_ip='$ip'";
	$run_price=mysqli_query($connect,$t_price);
	while($row_t_price=mysqli_fetch_array($run_price)){
		$u_id=$row_t_price['u_id'];
		$price_pro="SELECT * FROM posts WHERE c_id='$u_id'";
		$run_price_pro=mysqli_query($connect,$price_pro);
		while($row_price_pro=mysqli_fetch_array($run_price_pro)){
			$pro_price=array($row_price_pro['c_price']);
			$values=array_sum($pro_price);
			$total +=$values;
		}
	}
	echo $total;
	
}
// get category
function get_cat(){
	global $connect;
	$get_cat="SELECT * FROM category";
	$run_cat=mysqli_query($connect,$get_cat);
	while($row_cat=mysqli_fetch_array($run_cat)){
		echo'<li><a href="index.php?cat='.$row_cat['c_id'].'">'.$row_cat['c_name'].' </a></li>';
	}
}

// get pro
function get_pro(){
	global $connect;
if(!isset($_GET['cat'])){
	
		$get_pro="SELECT * FROM posts";
	$run_pro=mysqli_query($connect,$get_pro);
	while($row_pro=mysqli_fetch_array($run_pro)){
		echo'
<li>
<div class="contener" style="float:right; "> 
 <div class=""><a href="" ><img src="images/Product/'.$row_pro['c_img'].'"  width="180" height="150"/></a></div>
  <div class="title"><h5><a href="#">'.$row_pro['c_title'].'</a></h5></div>
   <div class="price"><h4>price:<a href="#">'.$row_pro['c_price'].'</a></h4></div>
    <div class="description">
     <p>'.$row_pro['c_description'].'</p>	</div>
     <p><a href="pay.php?id='.$row_pro['c_id'].'" class="btn btn-primary" role="button">pay</a> <a href="index.php?add_cart='.$row_pro['c_id'].'" class="btn btn-default" role="button">add to list</a></p>
</div>
</li>
		';
	}
  }
}

//get product by category
function get_pro_cat(){
	global $connect;
	if(isset($_GET['cat'])){
		$cat=(int)$_GET['cat'];
		$get_pro_cat="SELECT * FROM posts WHERE c_id='$cat'";
		$run_pro_cat=mysqli_query($connect,$get_pro_cat);
		if(mysqli_num_rows($run_pro_cat) > 0){
			while($fetch=mysqli_fetch_array($run_pro_cat)){
						echo'
<li>
<div class="contener"> 
 <div class=""><a href="" ><img src="images/Product/'.$fetch['c_img'].'"  width="180" height="150"/></a></div>
  <div class="title"><h5><a href="#">'.$fetch['c_title'].'</a></h5></div>
   <div class="price"><h4>price:<a href="#">'.$fetch['c_price'].'</a></h4></div>
    <div class="description">
     <p>'.$fetch['c_description'].'</p>	</div>
     <p><a href="pay.php?id='.$fetch['c_id'].'" class="btn btn-primary" role="button">pay</a>  <a href="index.php?add_cart='.$row_pro['c_id'].'" class="btn btn-primary" role="button">pay</a></p>
</div>
</li>
		';
			}
		}
		else{
			echo'<div class="error">عذرا لاتوجد منتجات لعرضها</div>';
		}
	}
}




//get products by search
function get_pro_search (){
 global $connect;

if(isset($_GET['search'])){
	$searchArea=$_GET['searchArea'];
	$get_pro_search="SELECT * FROM posts WHERE p_keyword LIKE '%$searchArea%'";
	$run_pro_search=mysqli_query($connect,$get_pro_search);

	if(mysqli_num_rows($run_pro_search) > 0){
			while($row_pro_search = mysqli_fetch_array($run_pro_search)){
								echo'
<li>
    <div class="product">
	   <div id="pro_img">
	     <a href="#"><img src="admin/images/'.$row_pro_search['p_img'].'" width="320"  /></a>
	   </div>
	   <div id="pro_title">
	     <a href="#">'.$row_pro_search['p_title'].'</a>
	   </div>
	   <div id="pro_bay">
	     <a href="#"><button>شراء الان</button></a>
	   </div>
	</div>
</li>
		';
	}
	}
	else{ 
	echo'<div class="error">عذرا المنتج الذى تبحث عنة غير متوفر</div>';
	}
} 
	
	
}


?>