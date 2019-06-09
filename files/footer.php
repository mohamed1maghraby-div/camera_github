<!--footer start by mohamed maghraby -->

<div class="footer" style="background-image:url(images/Untitled-1yjhyyyyyy.jpg); background-size: 100% 100%; font-size:20px; color:#777;">


<div class="">
<ul>
<ul class="r">
<li>menu</li>
<li><a href="index.php">Home</a></li>
<?php
 $query=mysqli_query($connect,"SELECT * FROM category");
 while($category=mysqli_fetch_assoc($query)){
 echo'<li><a href="category.php?id='.$category['c_id'].'">'.$category['c_title'].'</a></li>';
  }
 ?>
</ul>
<ul class="r" style="padding-right:20px;">
<li>acount</li>
<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>login</a></li>
<li><a href="register.php"><span class="glyphicon glyphicon-user"></span>register</a></li>
</ul>
<ul class="r" >
<li>social media</li>
<li style="float:right;"><img src="images/Facebook_Icon_256.png" width="50" height="50"/></li>
<li style="float:right;"><img src="images/twitter-icon.png" width="50" height="50"/></li>
<li style="float:right;"><img src="images/youtube.png" width="50" height="50"/></li>
</ul>
</ul>
</div>	

<div class="c"></div>

</div>
<div class="copyRight">
<center>all rights reserved to mohamed maghraby &copy;2016</center>
</div>

<!-- footer ended by mohamed maghraby  -->
</body>
</html>