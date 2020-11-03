<?php
session_start();
$userid=$_SESSION['userid'];
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `prescription` WHERE userid='$userid' AND CONCAT( `sno`, `docid`, `userid`, `disease`, `medicine`, `meet`, `message`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `prescription` where userid='$userid' ";
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
<title>Prescription</title>
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
		min-width:900px;
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
		padding:20px 30px;
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
		left:530px;
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
	.btn{
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

    .btn:hover {
	    opacity: 1;
	}
    #btn{
		background-color:0400FF;
		border: none;
		color: white;
		text-align: center;
		font-size: 16px;
		margin: 4px 2px;
		opacity: 0.6;
		width:170px;
		height:30px;
		transition: 0.3s;
		border-radius:8px;
    }

    #btn:hover {
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
        <a class="float-right" href="patsignin.php" style="font-size:20px;color:white;text-decoration:none;font-family:sofia;"><h4><i class="fa fa-backward" aria-hidden="true"> Back</i>		</h4></a>
    </div> 
	<h1 style="color:#009879;">PRESCRIPTION DETAILS</h1><br>
	
	<form action="" method="POST" autocomplete="off"> 
        <div class="search-box">
            <input class="search-txt" type="text" name="valueToSearch" placeholder="Value To Search">
            <input class="search-btn" type="submit"  name="search" value="SEARCH">
        </div>
</form>
   <table class="content-table">
        <thead>
        <tr>   
        <th>FULLNAME</th>    
        <th>USERID</th>    
        <th>DOCTORID</th>    
        <th>DISEASE</th>   
        <th>MEDICINE</th>   
        <th>MEETING</th>   
        <th>CURE</th>     
        <th>FEES</th>     
        <th>PAYMENTSTATUS</th>     
        <th>ACTION</th>     
        </tr>
		</thead>
	
 <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
       
        <tr>
            
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['userid'] ?></td>
            <td><?php echo $row['docid'] ?></td>
            <td><?php echo $row['disease'] ?></td>
            <td><?php echo $row['medicine'] ?></td>
            <td><?php echo $row['meet'] ?></td>
            <td><?php echo $row['message'] ?></td>
            <td><?php echo $row['cfees'] ?></td>
			<td>
			<?php
			 if(($row['status']==1))  {
				 echo "Paid";
			 }
			 else {
				 echo "Pending";
			 }
			 ?>
			</td>
			<td>
			   <form method="POST" action='pdf.php'>
			   <input type='hidden' name='fullname' value='<?php echo $row['fullname'] ?>'/>
			   <input type='hidden' name='userid' value='<?php echo $row['userid'] ?>'/>
			   <input type='hidden' name='gen' value='<?php echo $row['gender'] ?>'/>
			   <input type='hidden' name='mobile' value='<?php echo $row['mobile'] ?>'/>
			   <input type='hidden' name='appointdate' value='<?php echo $row['adate'] ?>'/>
			   <input type='hidden' name='appointtime' value='<?php echo $row['atime'] ?>'/>
			   <input type='hidden' name='mail' value='<?php echo $row['mailid'] ?>'/>
			   <input type='hidden' name='docid' value='<?php echo $row['docid'] ?>'/>
			   <input type='hidden' name='disease' value='<?php echo $row['disease'] ?>'/>
			   <input type='hidden' name='medicine' value='<?php echo $row['medicine'] ?>'/>
			   <input type='hidden' name='message' value='<?php echo $row['message'] ?>'/>
			   <input type='hidden' name='meeting' value='<?php echo $row['meet'] ?>'/>
			   <input type='hidden' name='fees' value='<?php echo $row['cfees'] ?>'/>
			        <?php
					if(($row['status']==1))  {
                        echo "<input id='btn' type='submit' style='outline:none' name='pay'  value='Download Prescription' onclick='return genereatepdf();'/>";
			 }?>
			 </form>
			   <form method="POST" action='paybill.php'>
			   <input type='hidden' name='SNo' value='<?php echo $row['sno'] ?>'/>
			 <?php
					 if(($row['status']==0))  {
                        echo "<input class='btn' type='submit' style='outline:none' name='pay'  value='Pay Bill' onclick='return bill();'/>";
        		    }
					?>
				</form>
			</td>
	    </tr>
         
		

<?php endwhile;?>
        </table>
		<script>
		function genereatepdf(){
			return confirm('Are You Sure You Want To Download The Prescription');
		}
		function bill(){
			return confirm('Are You Sure You Want To Pay The Bill');
		}

		</script>
		   </body>
</html>
