<?php
session_start(); 
$docid=$_SESSION['docid'];
?>
<html>
<head>
	<title>Doctor Signin</title>
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
		background: #009879;
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
		}
		#welcome{
			margin-top: 80px;
		}
		.link{
			display: flex;
			padding: 10px 20px;
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
	.row {
       display: flex;
      }
     .column{
       flex: 33.33%;
       padding: 25px;
      } 
	  /* notification */
span#circle {
  background: #ff568c;
  border-radius: 50%;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  color: white;
  display: inline-block;
  font-weight: bold;
  line-height: 20px;
  height:20px;
  margin-right: 1px;
  margin-left:-50px;
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
		<div class="link">
		<a style="color:white;text-decoration:none;margin-top:20px;" href="signin.html"><h4><i class="fas fa-sign-in-alt">LogOut</i></h4></a>
		</div>
	<header>
	<a href="#" class="logo">Welcome  <span style=" font-family:sans-serif; font-size:25px;">
	   <?php 
	   
		   echo $docid;
		
	    ?> </span>
		</a>
		<div class="menu-toggle"></div>
		<nav>
			<ul>
			<?php
			$con=mysqli_connect('localhost','root','');
             mysqli_select_db($con,'hms');
            $query = "SELECT COUNT(*) AS count FROM `appointment` WHERE docid='$docid' AND userstatus='1' AND doctorstatus='1' AND action='0'";
            $query_run= mysqli_query($con,$query);
            			
            while($row=mysqli_fetch_assoc($query_run))
            {
			$output =$row['count'];
			if($row['count']>0)
			{
			?>
			<li>
			<span id="circle"><?php echo $output?></span></li>
	
			<?php
			}
			}
			?>
			<li><a href="docappointment.php">Appointment Details</a></li>
			
			<li><a href="docpreslist.php" >Prescription List</a></li>
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
		<center><h1 id="welcome" style="color:#ff568c;">WELCOME DOCTOR</h1></center>
				<center><h1 id="welcome" style="margin-top:10px;color:#fff;">WE CARE HOSPITAL WELCOME YOU</h1></center>
		<div style="background:white;margin-left:10px;height:300px;overflow:hidden;margin-right:10px;border-radius:30px;">
<marquee direction="up">
	
		<center><h1 style="font-family:sofia;color:skyblue;font-size:30px;"> Patients Trust Us!</h1></center>
    <center><p style="font-family:sofia;color:#009879;">What people say about us. Here are comments from individuals who have visited GlobalHealth.</p></center>
	<div class="row">
	         
		 <div class="column">
           <center><img id="img" src="team/5.png" alt="Staff1" style="width:30%"></center>
		  <center>
		  <p style="font-family:sofia;font-size:20px;color:#009879;">Recently my husband had a severe heart problem and required a coronary intervention, there wasn’t too much time for me to choose a clinic. Still, luckily I chose this one and in just 2 weeks after my John was as good as new!</p>
		 <br><p style="font-family:sofia;font-size:20px;color:#ff568c;">—  Karen Malick</p>
		 </center>
       </div>
	      <div class="column">
          <center> <img id="img" src="team/6.png" alt="Staff1" style="width:30%"></center>
		  <center>
		  <p style="font-family:sofia;font-size:20px;color:#009879;">Having diabetes is one of the least pleasant things that can possibly happen to anyone. Thankfully, my good old friend referred me to this medical facility and specifically to Dr. Robertson. That man is a real miracle maker!</p>
		  <br><p style="font-family:sofia;font-size:20px;color:#ff568c;">—  John Palmer</p>
		 </center>
       </div>
     </div>
 </marquee></div>
	</body>
</html>
