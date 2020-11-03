<?php
session_start(); 
$docid=$_SESSION['docid'];
$userid = $_POST['id'] ;
$mail = $_POST['mail'] ;
$mobile = $_POST['no'] ;
$appointmentdate = $_POST['appointmentdate'] ;
$appointmenttime = $_POST['appointmenttime'] ;
$fullname = $_POST['name'] ;
$dis =  $_POST['di'];
$gen =  $_POST['gen'];
$fees=$_POST['cfees'];
?>
<html>
<head>
	<title>Prescription</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/em.jpg" />
	<link rel="stylesheet" href="loader.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b379d3e204.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="contactus.css">
	<title>contact us</title>
	<style>
	
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
*{
	margin:0;
	padding:0;
	box-sizing: border-box;
	font-family: 'Poppins',sans-serif;
}
section{
	position: relative;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	background: #009879;
}
section .container{
	position: relative;
	min-width: 1100px;
	min-height: 650px;
	display: flex;
	z-index: 1000;
}
section .container .form
{
	position: absolute;
	padding: 70px 50px;
	background: #fff;
	margin-left: 100px;
	padding-left: 50px;
	width: calc(100% - 150px);
	height: 100%;
	box-shadow: 0 50px 50px rgba(0,0,0,1.5);
	border-radius: 30px;
}
section .container .form h2{
	color: #0f3959;
	font-size: 24px;
	font-weight: 500;
}
section .container .form .formbox
{
	position: relative;	
	display: flex;
	justify-content: space-between;
	flex-wrap: wrap;
	padding-top: 30px;
}
section .container .form .formbox .inputbox{
	position: relative;
	margin: 0 0 35px 0;
}
section .container .form .formbox .inputbox.w50{
	width: 47%;
}
section .container .form .formbox .inputbox.w100{
	width: 100%;
}
section .container .form .formbox .inputbox input,
section .container .form .formbox .inputbox textarea{
	width: 100% !important;
	padding: 5px 0;
	resize: none;
	font-size: 18px;
	font-weight: 300;
	color: #333;
	border: none;
	border-bottom: 1px solid #777;
	outline: none;
}
section .container .form .formbox .inputbox textarea{
	min-height: 120px;
}
section .container .form .formbox .inputbox span{
	position: absolute;
	left: 0;
	padding: 5px 0;
	font-size: 18px;
	font-weight: 300;
	color: #333;
	transition: 0.3%;
	pointer-events: none;
}
section .container .form .formbox .inputbox input:focus ~ span,
section .container .form .formbox .inputbox textarea:focus ~ span,
section .container .form .formbox .inputbox input:valid ~ span,
section .container .form .formbox .inputbox textarea:valid ~ span{
	transform: translateY(-20px);
	font-size: 12px;
	font-weight: 400;
	letter-spacing: 1px;
	color:#ff568c;
}
section .container .form .formbox .inputbox input[type="submit"]
{
	border-radius: 30px;
	position: absolute;
	cursor: pointer;
	background: #009879;
	color:#fff;
	border: none;
	max-width: 150px;
	padding: 12px;
}
section .container .form .formbox .inputbox input[type="submit"]:hover{
	background:#ff568c;
}
	</style>
	
	</head>
	<body>
<div class="loader">
	  <img src="gif/loader.gif" alt="Loading...." />
	</div>
	<script src="load.js">
	</script>
	<section>
	<div class="container">
	<div class="link">
        <a class="float-right" href="docappointment.php" style="font-size:20px;color:white;text-decoration:none;font-family:sofia;"><h4><i class="fa fa-backward" aria-hidden="true"> Back</i> </h4></a>
    </div>  
		<form action="prescription.php" method="post" autocomplete="off">
		<input type='hidden' name='fname' value='<?php echo $fullname; ?>'/>
		    <input type='hidden' name='mail' value='<?php echo $mail; ?>'/>
		    <input type='hidden' name='mobile' value='<?php echo $mobile; ?>'/>
		    <input type='hidden' name='adate' value='<?php echo $appointmentdate; ?>'/>
		    <input type='hidden' name='atime' value='<?php echo $appointmenttime; ?>'/>
		    <input type='hidden' name='cfees' value='<?php echo $fees; ?>'/>
		<div class="form">
		<h2 style="color:#009879;font-family:sofia;">Send The Prescription</h2>
			<div class="formbox">
			<div class="inputbox w50">
				<input type="text" name="docid" value="<?php echo $docid;?>" readonly>
				
			</div>
			<div class="inputbox w50">
				<input type="text" name="userid" value="<?php echo $userid;?>" readonly>
			</div>
			<div class="inputbox w50">
				<input type="text" name="disease" value="<?php echo $dis;?>" readonly>
			</div>
			<div class="inputbox w50">
				<input type="text" name="gender" value="<?php echo $gen;?>" readonly>
			</div>
			<div class="inputbox w50">
				<input type="text" name="medicine" required>
				<span>Medicine</span>
			</div>
			<div class="inputbox w50">
				<input type="text" name="meet" required>
				<span>Patient Need To Meet You Or Not</span>
			</div>
			<div class="inputbox w50">
				<input type="text" name="cfees" value="<?php echo $fees;?>" readonly>
			</div>
			<div class="inputbox w100">
				<textarea name="message" required></textarea>
				<span>Enter The Cure Here.....</span>
			</div>
			<div class="inputbox w50">
				<input type="submit" name="submit" value="Send">
			</div>
			</div>
		</div>
		</form>
		</div>
		</section>
	</body>
</html>


			
