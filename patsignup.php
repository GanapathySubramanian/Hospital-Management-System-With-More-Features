<?php
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'hms');

$query= "SELECT * FROM pattable";
$query_run= mysqli_query($con, $query);   

?>
<html>
<head>
	<title>Patsign in</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/em.jpg" />
	<link rel="stylesheet" href="loader.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<script src="https://kit.fontawesome.com/b379d3e204.js" crossorigin="anonymous"></script>
	
	<style>
	body
	{
		margin:0;
		padding:0;
		font-family:sans-serif;
		background: linear-gradient(to left,#009FFD,#2A2A72);
		background-attachment: fixed;
	}
	#welcome{
	    margin-top:200px;
	 }
	 .float-right{
		color: #fff;
		font-size: 15px;
		text-decoration: none;
	}
	</style>
	</head>
	<body>
<div class="loader">
	  <img src="gif/loader.gif" alt="Loading...." />
	</div>
	<script src="load.js">
	</script>
		<a class="float-right" href="home.php"><h4><i class="fa fa-home" aria-hidden="true">HOME</i></h4></a>    
		<center><h1 id="welcome">WELCOME TO WE CARE HOSPITAL </h1>
		</a></center>
	</body>
</html>
