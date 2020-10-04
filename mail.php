<!--<?php
 session_start();
    
 $con=mysqli_connect('localhost','root','');
 mysqli_select_db($con,'hms');

if(isset($_POST['submit']))
{
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$msg = $_POST['message'];

    $reg="insert into contactus(firstname,lastname,email,phoneno,message) values ('$firstname','$lastname','$email','$number','$msg')";
    mysqli_query($con,$reg);
	$to = "ganapathy5subramanian@gmail";
    $subject = "HTML email";
	$message="Name:".$firstname.$lastname."\n"."PhoneNumber :".$number."\n"."Message:".$msg;
    $headers="From:".$email;


if(mail($to,$subject,$message,$headers)){

	echo '<script>alert("message send  successfull" " " .$firstname."we will contact you shortly!!")</script>';
}
else
{
	echo "<script>alert('someting wrong')</script>";
}
}
?>-->
<?php
if(isset( $_POST['firstname']))
$firstname = $_POST['firstname'];
if(isset( $_POST['lastname']))
$lastname = $_POST['lastname'];
if(isset( $_POST['email']))
$email = $_POST['email'];
if(isset( $_POST['number']))
$number = $_POST['number'];
if(isset( $_POST['sub']))
$subject = $_POST['sub'];
if(isset( $_POST['message']))
$message = $_POST['message'];

if ($firstname ===''){
echo "<script>window.alert('FirstName cannot be empty.')</script>";
die();
}
if ($lastname ===''){
echo "<script>window.alert(LastName cannot be empty.')</script>";
die();
}
if ($email === ''){
echo "<script>window.alert(Email cannot be empty.')</script>";
die();
} else {
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "<script>window.alert(Email format invalid.')</script>";
die();
}
}
if ($number === ''){
echo "<script>window.alert(Mobile number cannot be empty.')</script>";
die();
}
if ($subject === ''){
echo "Subject cannot be empty.";
die();
}
if ($message === ''){
echo "<script>window.alert(Message cannot be empty.')</script>";
die();
}
$content="From: $firstname $lastname\nPhone Number: $number \nEmail: $email \nMessage: $message";
$recipient = "ganapathy5subramanian@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
echo "Email sent!";
?>