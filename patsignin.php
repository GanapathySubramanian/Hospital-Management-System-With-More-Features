<?php
session_start(); 
$user=$_SESSION['userid'];
?>

<html>
<head>
	<title>Patient Signin</title>
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
		background:#009879;
		background-attachment: fixed;
	}
	header
		{
			position: relative;
			max-width: 1200px;
			margin: 20px auto;
			padding:10px;
			background: #fff;
			box-sizing: border-box;
			border-radius: 4px;
			box-shadow: 0 28px 5px rgba(0,0,0,.2);
		}
		.logo{
		color:#009879;
		height:60px;
		font-size: 36px;
		line-height: 60px;
		padding: 0 20px;
		text-align: center;
		box-sizing: border-box;
		float:left;
        font-weight: 700;
		text-decoration: none;
		}
		nav
		{
			float:right;
		}
		.clearfix
		{
			clear: both;
		}
		nav ul{
			margin: 0;
			padding: 0;
			display: flex;
		}
		nav ul li{
			list-style: none;
		}
		nav ul li a{
			display: block;
			margin: 10px 0;
			padding: 10px 20px;
			text-decoration: none;
			color: #009879;
		}
		nav ul li a.active,nav ul li a:hover{
			background:#009879;
			color: #fff;
			transition: 0.5s;
		}
		@media(max-width:768px)
		{
			.menu-toggle
			{
				display: block;
				width: 40px;
				height: 40px;
				margin: 20px;
				background: #ccc;
				float: right;
				cursor: pointer;
				text-align: center;
				font-size: 30px;
				color: #009FFD;
			}
			.menu-toggle:before
			{
				content: '\f0c9';
				font-family: fontAwesome;
				line-height: 40px;				
			}
			.menu-toggle.active:before
			{
				content: '\f00d';
				font-family: fontAwesome;
				line-height: 40px;				
			}
			nav
			{
				display: none;
			}
			nav.active
			{
				display: block;
				width: 100%;
			}
			nav.active ul
			{
				display: block;
			}
			nav.active ul li
			{
				margin: 0;
			}
			nav.active ul li span{
				margin:0;
				margin-left:90%;
			}
		}
	

	  .services{
	  background-image:url("images/mt-0012-about-img10.jpg");
	  background-repeat:no-repeat;
	  background-position:right;
	  }
		.wordings{
		margin-right:600px;  
		font-family:sans-serif;
		color:#009879;
	  }
	  /* notification */
span#circle {
  background-color:#ff568c;
  border-radius: 50%;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  color: white;
  display: inline-block;
  font-weight: bold;
  line-height: 20px;
  height:20px;
  margin-right: 1px;
  margin-left:135px;
margin-top:20px;
  text-align: center;
  width: 20px;
  position:absolute;
  left:75%;
}

	</style>
	</head>
	<body>
<div class="loader">
	  <img src="gif/loader.gif" alt="Loading...." />
	</div>
	<script src="load.js">
	</script>
		<div class="link" style="margin-top:20px;">
		<a style="color:white;text-decoration:none;"href="signin.html"><h4><i class="fas fa-sign-in-alt">LogOut</i></h4></a>
		</div>
	<header>
	   <a href="#" class="logo">Welcome  <span style=" font-family:sans-serif; font-size:30px;">
	   <?php 
	   
		   echo $user;
		
	    ?> </span>
		</a>
		<div class="menu-toggle"></div>
		<nav>
			<ul>
			<li><a href="doclist.php">Doctor Lists</a></li>
			<li><a href="bookappointment.php">Book Appointment</a></li>
			<li><a href="patappointment.php">Appointment Details</a></li>
			<li><a href="patpreslist.php" >Prescription List</a></li>
			<?php
             $con=mysqli_connect('localhost','root','');
             mysqli_select_db($con,'hms');
            $query = "SELECT COUNT(*) AS count FROM `prescription` WHERE userid='$user' AND status='0'";
            $query_run= mysqli_query($con,$query);
            			
            while($row=mysqli_fetch_assoc($query_run))
            {
			$output =$row['count'];
			if($row['count']>0)
			{
			?>
			<li>
			<span id="circle"><?php echo $output?></span>
		        </li>
			<?php
			}
			}
			?>
			
			
			</ul>
		</nav>
		<div class="clearfix"></div>
	</header>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.menu-toggle').click(function(){
			$('.menu-toggle').toggleClass('active')
			$('nav').toggleClass('active')
		})
	})	
	</script>
		<center><h1 id="welcome" style="color:#ff568c;">WELCOME PATIENT</h1></center>
					<center><h1 id="welcome" style="margin-top:10px;color:#fff;">WE CARE HOSPITAL WELCOME YOU</h1></center>
	
	<!--FIRST DIVIDION-->
    <div class="services" style="background-color:white;">
	    <p class="wordings"style="font-family:sofia;font-weight:bold;font-size:30px">Procedure For Make An Appointment</p>
		<ul class="wordings">
		<li>Make An Appointment Using The Doctor's ID You Can See the Doctors'ID in doctor's List</li><br>
		<li>After Making an appointment Wait For doctor responce </li><br>
		<li>You can See the responce on the  appointment Details List in Status Column</li><br>
		<li>If Status Column Content is"cancelled by the doctor" Then Your appointment has been cancelled by the doctor</li><br>
		<li>If Status Column Content is"cancelled by the You" Then Your appointment has been cancelled by the Yourself</li><br>
		<li>If Status Column Content is"Active" Then Your appointment has been in Waiting state</li><br>
		<li>If Status Column Content is"Your Appointment Accepted wait for the prescription"then Your Appointment has been accepted then the doctor will send you the prescription you can see it in the prescriptionlist</li><br>
        <li>Doctor's Will Send You the the prescription Before the Appointment date that you have booked </li><br>
 	    <li>In The Prescription if the doctor mention that you have to compulsorly meet me then your health condition is bad  You must meet the doctor on the appointment date and the time that you have selected While Booking</li><br>
   	    <li>In The Prescription if the doctor mention that  Not Necessary meet me then you can bought the medicine that the doctor have prescribed</li><br>
   	    <li>After completing the payment only you can download your prescription</li><br>
	</ul>		
	</div>
		

    </body>
</html>
