<?php
$connect=mysqli_connect('localhost','root','1234','camera');
/*
CREATE TABLE  `category` (
 `c_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `c_title` VARCHAR( 255 ) NOT NULL
) ENGINE = MYISAM ;
*/

?>
<!-- header started by mohamed maghraby -->

<!DOCTYPE html>
<html>
<head>
<title>creative cam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link href="css/ninja-slider.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="css/css/styles.css" type="text/css" media="all" rel="stylesheet" />
  <link href="css/css/skitter.styles.min.css" type="text/css" media="all" rel="stylesheet" />
	<script src="jquery/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="js/ninja-slider.js" type="text/javascript"></script>
	  <script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script>


	<style>
        body {font: normal 0.9em Arial;margin:0;}
        a {color:#1155CC;}
        ul li {padding: 10px 0;}
        header {display:block;padding:60px 0 20px;text-align:center;position:absolute;top:8%;left:8%;z-index:4;}
        header a {
            font-family: sans-serif;
            font-size: 24px;
            line-height: 24px;
            padding: 8px 13px 7px;
            color: #fff;
            text-decoration:none;
            transition: color 0.7s;
        }
        header a.active {
            font-weight:bold;
            width: 24px;
            height: 24px;
            padding: 4px;
            text-align: center;
            display:inline-block;
            border-radius: 50%;
            background: #C00;
            color: #fff;
        }
    </style>

	  <script type="text/javascript" language="javascript">
    $(document).ready(function() {
      $('.box_skitter_large').skitter({
        theme: 'clean',
        numbers_align: 'center',
        progressbar: true, 
        dots: true, 
        preview: true
      });
    });
  </script>
	
</head>
<body style="background-image:url(images/background/6838259-gray-background.jpg);">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	<span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php"><img src="images/logo2.png" width="50" height="50"/></a>
    </div>
	<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
	<?php include "function.php"; ?>
	<?php cart();?>
      <li class="active" style="font-size:20px;"><a href="index.php">Home</a></li>
      
      <?php
	  $query=mysqli_query($connect,"SELECT * FROM category");
      while($category=mysqli_fetch_assoc($query)){
		  echo'<li style="font-size:15px; color:#0D0040;"><a href="category.php?id='.$category['c_id'].'">'.$category['c_title'].'</a></li>';
	  }
	  ?>
	  <li>
	<form action="search.php" method="post" class="navbar-form navbar-left" style="margin-left:30px;" role="search">
  <div class="form-group">
    <input type="text" name="search" class="form-control" placeholder="Search">
  </div>
  <input type="submit" name="submit" value="search" class="btn btn-default"/>
</form>
	  </li>
	  <li style="font-size:15px;"><a href="addtolist.php" >go to the shop <img src="images/xigKzEg4T.png" width="25" height="25"/></a></li>
	  <li style="margin-left:120px; font-size:15px;"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>login</a></li>
	  <li style="font-size:15px;"><a href="register.php"><span class="glyphicon glyphicon-user"></span>register</a></li>
    </ul>
  </div>
</nav>
  
<!-- header ended by mohamed maghraby -->
