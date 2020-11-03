

<?php

session_start(); 
$docid=$_SESSION['docid'];
if(isset($_POST['search']))
{
     $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `pattable` INNER JOIN `appointment` ON pattable.userid=appointment.userid WHERE docid='$docid'  AND   CONCAT(pattable.userid,pattable.email,pattable.phoneno,pattable.gender,appointment.docid,appointment.specialization,appointment.consultancyfees,appointment.appointmenttime,appointment.appointmentdate) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT  * FROM `pattable` INNER JOIN `appointment` ON pattable.userid=appointment.userid where docid='$docid' ";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "hms");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<html>
<head>
<title>Doctor Appointment</title>
<link rel="stylesheet" type="text/css" href="home.css">
<link rel="shortcut icon" type="image/x-icon" href="images/em.jpg" />
    <link rel="stylesheet" href="loader.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<style>
    body{
	   width:500px;
       height:1000px;
       background:white;
    }
  
    .content-table{
		border-collapse:collapse;
		margin:25px 0;
		font-size:0.9em;
		min-width:400px;
		border-radius:5px 5px 0px 0px;
		overflow:hidden;
		box-shadow: 0 0 20px rgba(0,0,0,0.25);
		text-align:center;
	}
	.content-table thead tr {
		background-color:#009879;
		color:white;
		text-align:center;
		font-weight:bold;
	}
	.content-table th,content-table tr{
		padding:20px 5px;
	}
	.content-table tbody tr{
		border-bottom:1px solid #dddddd;
	}
	.content-table tbody tr:nth-of-type(even){
		background-color:#f3f3f3;
	}
	.content-table tbody tr:last-of-type{
		border-bottom:2px solid #009879;
	
	}
	.link{
		background-color:#009879;
		width:1260px;
		height:40px;
	}
	.search-box{
		position:absolute;
		top:70px;
		left:500px;
		transfrom:translate(-50%,-50%);
		background:#009879;
		height:40px;
		border-radius:40px;
	}
	.search-box:hover > .search-btn{
		background:#009879;
	}
	.search-btn{
		color:white;
		float:right;
		width:70px;
		height:40px;
		border:none;
		border-radius:40px;
		background:#009879;
		display:flex;
		justify-content:center;
		align-items:center;
		transition:0.4s;
	}
	.search-box:hover > .search-txt{
		width:200px;
		padding:0 6px;
	}
	
	.search-txt{
		border:none;
		background:none;
		outline:none;
		float:left;
		padding:0;
		color:white;
		font-size:20px;
		font-family:sans-serif;
		transition:0.4s;
		line-height:40px;
		width:0px;
	}

   .btn {
		background-color:#009966;
		border: none;
		color: white;
		text-align: center;
		font-size: 16px;
		margin: 4px 2px;
		opacity: 0.6;
		width:75px;
		height:30px;
		transition: 0.3s;
		border-radius:8px; 
 }
    .btn:hover {
	    opacity: 1;
	}
	#btn {
		background-color:red;
		border: none;
		color: white;
		text-align: center;
		font-size: 16px;
		margin: 4px 2px;
		opacity: 0.6;
		width:75px;
		height:30px;
		transition: 0.3s;
		border-radius:8px;		
    }

    #btn:hover {
	  opacity: 1;
	}
	
   .pres{
		background-color:0400FF;
		border: none;
		color: white;
		text-align: center;
		font-size: 16px;
		margin: 4px 2px;
		opacity: 0.6;
		width:75px;
		height:30px;
		transition: 0.3s;
		border-radius:8px;
    }

    .pres:hover {
	    opacity: 1;
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
        <a class="float-right" href="docsignin.php" style="font-size:20px;color:white;text-decoration:none;font-family:sofia;"><h4><i class="fa fa-backward" aria-hidden="true"> Back</i> </h4></a>
    </div>  
	<h1 style="color:#009879">APPOINTMENT DETAILS</h1><br>
    
		<form action="" method="POST" autocomplete="off"> 
        <div class="search-box">
            <input class="search-txt" type="text" name="valueToSearch" placeholder="Value To Search">
            <input class="search-btn" type="submit"  name="search" value="SEARCH">
        </div> 
        </form>		
	<table class="content-table">
        <thead>
        <tr>
        <th>SNO</th>	
        <th>PATIENT FULLNAME</th>   
        <th>PATIENT ID</th>   
        <th>EMAIL</th>   
        <th>CONTACT</th>   
        <th>GENDER</th>   
        <th>DISEASE</th>   
        <th>SPECIALIZATION</th>   
        <th>APPOINTMENT DATE</th>   
        <th>APPOINTMENT TIME</th>   
        <th>CONSULTANCY FEES</th>   
        <th>STATUS</th>   
        <th>ACTION</th>      
        </tr>
        </thead> 
	
  <!-- populate table from mysql database -->
    <?php
				$count=0;				
 while($row = mysqli_fetch_array($search_result)):

    $count = $count+1;
   ?>
      
        <tr class="activerow"> 
        
		 <td><?php echo $count?></td>
        <td><?php echo $row['fullname'] ?></td>
        <td><?php echo $row['userid'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['phoneno'] ?></td>
        <td><?php echo $row['gender'] ?></td>
        <td><?php echo $row['disease'] ?></td>
        <td><?php echo $row['specialization'] ?></td>
        <td><?php echo $row['appointmentdate'] ?></td>
        <td><?php echo $row['appointmenttime'] ?></td>
        <td><?php echo $row['consultancyfees'] ?></td>    
        
		<td> 
		<?php
		            if(($row['userstatus']==1) && ($row['doctorstatus']==1) && ($row['action']==0))  
                    {
                      echo "Active";
					  
                    }
					 if(($row['userstatus']==1) && ($row['doctorstatus']==1) && ($row['action']==1))  
                    {
                      echo "Patient Appointment accepted";
					  
                    }
                    if(($row['userstatus']==0) && ($row['doctorstatus']==1)&& ($row['action']==0))  
                    {
                      echo "Cancelled by Patient";
                    }

                    if(($row['userstatus']==1) && ($row['doctorstatus']==0)&&($row['action']==0))  
                    {
                      echo "Cancelled By the Yourself";
                    }
                      ?> 
        <td>
		    <form method="POST" action='status.php'>
		        <input type='hidden' name='SNo' value='<?php echo $row['sno'] ?>'/>
            <?php
		           if(($row['userstatus']==1) && ($row['doctorstatus']==1)&&($row['action']==0))  
                    {				
                        echo "<input class='btn' type='submit' style='outline:none' name='accept'  value='Accept'/>";
				        echo "<input id='btn' type='submit' style='outline:none' name='reject'  value='Reject' />";
					}
					
				?>
			</form>
	
	    <form method="POST" action='docprescription.php'>
		    <input type='hidden' name='name' value='<?php echo $row['fullname'] ?>'/>
		    <input type='hidden' name='id' value='<?php echo $row['userid'] ?>'/>
		    <input type='hidden' name='mail' value='<?php echo $row['email'] ?>'/>
		    <input type='hidden' name='no' value='<?php echo $row['phoneno'] ?>'/>
		    <input type='hidden' name='gen' value='<?php echo $row['gender'] ?>'/>
		    <input type='hidden' name='di' value='<?php echo $row['disease'] ?>'/>
		    <input type='hidden' name='appointmentdate' value='<?php echo $row['appointmentdate'] ?>'/>
		    <input type='hidden' name='appointmenttime' value='<?php echo $row['appointmenttime'] ?>'/>
		    <input type='hidden' name='cfees' value='<?php echo $row['consultancyfees'] ?>'/>
		<?php
		if(($row['userstatus']==1) && ($row['doctorstatus']==1)&& ($row['action']==1))  
                    {
                      echo "<input class='pres' type='submit' style='outline:none' name='presc'  value='Prescribe'/>";
                   
				   }
		?>
		</form>
			</td>
		</tr>
		
        
   <?php endwhile;?>
    </table>
	
    </body>
</html>
