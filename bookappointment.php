<html>
<head>
	<title>Appointment</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/em.jpg" />
	<link rel="stylesheet" href="loader.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/b379d3e204.js" crossorigin="anonymous"></script>
<style>
*{
	margin:0;
	padding:0;
	font-family: sans-serif;
 }	
.menu{
	height:1000px;
    width:100%;
	background-color:#009879;
	background-position:bottom;
	background-size:cover;
	position: absolute;
}
.formbox{
	font-family: sans-serif;
	height: 730px;
	width: 430px;
	position: relative;
	margin: 6% auto;
	background: #fff;
	padding: 5px;
	border-radius: 20px;
	box-shadow: 0 0 20px 9px #ff61241f;
}
.buttonbox{
	width: 170px;
	margin: 50px auto;
	position:relative;
	box-shadow: 0 0 20px 9px #ff61241f;
	border-radius: 30px;
}
.toggle-btn{
	padding:10px 30px;
	cursor: pointer;
	background: transparent;
	border:0;
	outline: none;
	position: relative;
}
#btn{
	top:0;
	left:0;
	position: absolute;
	width: 170px;
	height:100%;
	background: linear-gradient(to right,#009879,#32CD32);
	border-radius:30px;
	transition: .5s;
}
.input-group{
	top:150px;
	position: absolute;
	width: 280px;
	transition: .5s;
}
.input-field{
	width: 100%;
	padding: 14px 0;
	margin: 5px 0;
	border-left: 0;
	border-top:0;
	border-right: 0;
	border-bottom: 1px solid #999;
	outline: none; 
	background: transparent;

}
.submit-btn{
	width: 85%;
	padding: 10px 30px;
	cursor: pointer;
	display: block;
	margin:auto;
	background: linear-gradient(to right,#009879,#32CD32);
	border: 0;
	outline: none;
	border-radius: 30px;
}
#register1{
	left: 60px;
}

	h1{
		font-family: sans-serif;
		color:#009FFD;
	}
	.float-right{
		color: #fff;
		font-size: 15px;
		text-decoration: none;
	}
	.avatar{
		width:130px;
		height:130px;
		border-radius:50%;
		position:absolute;
		top:-50px;
		left:150px;
	}
	  
    </style>
</head>
	<body>
<div class="loader">
	  <img src="gif/loader.gif" alt="Loading...." />
	</div>
	<script src="load.js">
	</script>
	<div class="menu">
		 <div class="link">
        <a class="float-right" href="patsignin.php" style="font-size:20px;color:white;text-decoration:none;font-family:sofia;"><h4><i class="fa fa-backward" aria-hidden="true"> Back</i> </h4></a>
    </div> 
	<div class="formbox">
	        <center><img src="images/book.png" class="avatar"></center><br><br><br><br>
			<center><h1 style="color:#009879;">APPOINTMENT</h1></center>
				
		<form action="appointmentvalidation.php" name="myform" method="post" id="register1" class="input-group" autocomplete="off">

          <input type="text" name="userid" class="input-field" value="<?php session_start(); $user=$_SESSION['userid'];	echo $user;	?>" readonly />

		      <select name="spec" id="spec" class="input-field"  onchange="myFunction(); my_fun(this.value);">
				        <option value="" disabled selected>--Select Specialization--</option>
				        <option value="Dermatology">Dermatology</option>
				        <option value="Orthopedic">Orthopedic</option>
				        <option value="Neurology">Neurology</option>
				        <option value="Physiotheraphy">Physiotheraphy</option>
				        <option value="Cardiology">Cardiology</option>
				        <option value="Emergency">Emergency</option>
				   </select>
				   
				   <script  type="text/javascript" charset="utf-8" async defer>
					function my_fun(str) {
						console.log(str);
	                    if (window.XMLHttpRequest) {
		                    xmlhttp = new XMLHttpRequest();
	                    }
						else
						{
		                  xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
	                    }
                        xmlhttp.onreadystatechange= function(){
		                if (this.readyState==4 && this.status==200) {
			                document.getElementById('doctid').innerHTML = this.responseText;
		                 }
	                    }
	                    xmlhttp.open("GET","helper.php?value="+str, true);
	                    xmlhttp.send();

                  }
             </script>

				   <br>
				  <div id="doctid">
				   <select  name="doc" class="input-field">
				        <option value="" disabled selected>--Select Doctor--</option>
				   </select>
					</div>
					<input class="input-field"  type="text" name="dis" placeholder="Disease(No.of.days)" required>
				    
     				<p style="font-family:sans-serif;font-size:12px;">Fees</p>
				  
                    <script>
    				function myFunction() {
                        var x = document.getElementById("spec");
						var display=x.options[x.selectedIndex].value;
                        switch(display)
                       {
                            case 'Dermatology':
							    document.getElementById("fees").value='Rs 1000/-'; 
							    break ;
                            case 'Orthopedic':
							    document.getElementById('fees').value='Rs 1200/-';
								break;
                            case 'Neurology':
							    document.getElementById('fees').value='Rs 1500/-';
								break;
                            case 'Physiotheraphy':
							     document.getElementById('fees').value='Rs 2000/-';
							     break;
                            case 'Cardiology':
							     document.getElementById('fees').value='Rs 2000/-';
								 break;
                            case 'Emergency':
							     document.getElementById('fees').value='Rs 500/-';
								 break;
                        }
        
                        }
       
                  
				  </script>
				    <input class="input-field"  id="fees" name="fees"  type="text" readonly>
					<br><br>
					
					<p style="font-family:sans-serif;font-size:12px;">Appointment-date</p>
				    <input class="input-field" id="myinput1" name="date"  type="date" placeholder="Appointment-date" onchange="validatedate()" required>
					<Br><br>
				    
					<p style="font-family:sans-serif;font-size:12px;">Appointment-time</p>
					 <select name="time" class="input-field" id="apptime" required>
                      <option value="" disabled selected>--Select Time--</option>
                      <optgroup label="Dermatology">
					  <option value="08:00:00">8:00 AM</option>
                      <option value="10:00:00">10:00 AM</option>
                      <option value="12:00:00"disabled>12:00 PM</option>
                      <option value="14:00:00"disabled>2:00 PM</option>
                      <option value="16:00:00">4:00 PM</option>
					  </optgroup>
					  <optgroup label="Orthopedic">
					  <option value="08:00:00">8:00 AM</option>
                      <option value="10:00:00">10:00 AM</option>
                      <option value="12:00:00">12:00 PM</option>
                      <option value="14:00:00"disabled>2:00 PM</option>
                      <option value="16:00:00"disabled>4:00 PM</option>
					  </optgroup>
					  <optgroup label="Neurology">
					  <option value="08:00:00"disabled>8:00 AM</option>
                      <option value="10:00:00"disabled>10:00 AM</option>
                      <option value="12:00:00"disabled>12:00 PM</option>
                      <option value="14:00:00">2:00 PM</option>
                      <option value="16:00:00">4:00 PM</option>
					  </optgroup>
					  <optgroup label="Physiotheraphy">
					  <option value="08:00:00">8:00 AM</option>
                      <option value="10:00:00">10:00 AM</option>
                      <option value="12:00:00"disabled>12:00 PM</option>
                      <option value="14:00:00"disabled>2:00 PM</option>
                      <option value="16:00:00"disabled>4:00 PM</option>
					  </optgroup>
					  <optgroup label="Cardiology">
					  <option value="08:00:00">8:00 AM</option>
                      <option value="10:00:00"disabled>10:00 AM</option>
                      <option value="12:00:00"disabled>12:00 PM</option>
                      <option value="14:00:00"disabled>2:00 PM</option>
                      <option value="16:00:00">4:00 PM</option>
					  </optgroup>
					  <optgroup label="Emergency">
					  <option value="08:00:00">8:00 AM</option>
                      <option value="10:00:00">10:00 AM</option>
                      <option value="12:00:00">12:00 PM</option>
                      <option value="14:00:00">2:00 PM</option>
                      <option value="16:00:00">4:00 PM</option>
					  </optgroup>
                    </select><br><br><br>

			<center><button type="submit" name="submit" class="submit-btn">Book</button></center>
		</form>
		</div>
		</div>
		<script>
		function validatedate(){    
			   today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //As January is 0.
                var yy = today.getFullYear();
				var  e = document.getElementById('myinput1');
                var  dateformat = e.value.split('-');
                var  cin=dateformat[2];
                var  cinmonth=dateformat[1];
                var  cinyear=dateformat[0];
                if (yy==cinyear && mm==cinmonth && dd<=cin) { 
                   
                return true;

                }
                else if(mm<cinmonth ){
                    return true;
                }
                 else if(yy<cinyear){
                    return true;
                }
                else {    
                alert("Please select valid appointment date from today");
                e.value ='';
                }    
        }
		</script>
	</body>
</html>
