<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `pattable` WHERE CONCAT( `fullname`, `userid`, `email`, `phoneno`, `password`, `gender`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `pattable` ";
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
<title>Patient Details</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/em.jpg" />
<link rel="stylesheet" type="text/css" href="home.css">
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
		padding:20px 50px;
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
		left:300px;
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
        </style>
    </head>
<body>
<div class="loader">
	  <img src="gif/loader.gif" alt="Loading...." />
	</div>
	<script src="load.js">
	</script>
    <div class="link">
    <a class="float-right" href="adminsignin.html" style="font-size:20px;color:white;text-decoration:none;font-family:sofia;"><h4><i class="fa fa-backward" aria-hidden="true"> Back</i> </h4></a>
    </div>
	<h1 style="color:#009879;">PATIENT LIST</h1><br>
	<form action="" method="POST" autocomplete="off"> 
        <div class="search-box">
            <input class="search-txt" type="text" name="valueToSearch" placeholder="Value To Search">
            <input class="search-btn" type="submit"  name="search" value="SEARCH">
        </div>  
	</form>
   <table class="content-table">
        <thead>
        <tr>  
            <th>FULL NAME</th>     
            <th>USER ID</th> 
            <th>EMAIL</th> 		
            <th>PHONE NUMBER</th>   
            <th>PASSWORD</th>   
            <th>GENDER</th>      
        </tr>
        </thead>
	  
<!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
        
        <tr>
	     	<td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['userid'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['phoneno'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['gender'] ?></td>
        </tr>
		
     <?php endwhile;?>
        </table>
  
        
    </body>
</html>
