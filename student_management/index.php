<?php
session_start();




include('dbconnect.php');
$email_err=$pws_err=$success=$error='';
if(isset ($_POST['submit']))
{
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	$pass = password_hash($password, PASSWORD_BCRYPT);
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    
    $query = "select * from register where email= '$email'";
    $run = mysqli_query($conn, $query);

$row = mysqli_num_rows($run); 
if($row>0){

$email_err = "Email id already exists. Please try with another email";

} 
else if($password !== $cpassword)
 {
	$pws_err = "password does not match pleas try again using different password";


}
else{
	$sql ="insert into register (fname,email,password,cpassword) values('$fname','$email','$pass','$cpass')";
	$run = mysqli_query($conn,$sql);
	if($run){
		$success = "Registered Successully";
	}
	else
	{
		$error = "Unable to submit data , please try again";
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student management system</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
	function content1(){
		document.getElementById("div1").style.display="block";
		document.getElementById("div2").style.display="none";
	}
	function content2(){
		document.getElementById("div1").style.display="none";
		document.getElementById("div2").style.display="block";
	}
</script>
</head>
<body>

<section class="">
	<p class="text-center text-warning font-weight-bold"><?php echo @$_SESSION['login_first']; ?></p>
<h2 class="text-center text-danger pt-5 pb-4 font-weight-bold">Student Management System</h2>
<p class="text-center font-weight-bold text-danger"><?php echo @$_GET['error'] ?></p>

<div class="container bg-secondary" id="formsetting">
	<h3 class="text-white text-center py-3">Admin Login | Register Panel</h3>
        <!-- row starts here --> 
	<div class="row">
		<div class="col-md-7 col-sm-7 col-12">
			<img src="images/student2.jpg" class="img-fluid">
		</div>
		<div class="col-md-5 col-sm-5 col-12">

			<button class="btn btn-info px-4" onclick="content1()">Register</button>
			<button class="btn btn-info px-5" onclick="content2()">Login</button>
			<div id="div1" style="display: block;" class="mt-2">
			<form method="post" action="">
			<div class="form-group">
				<label class="text-white">Full Name</label>
				<input type="text" name="fname" placeholder="Enter your name" class="form-control" required="required">
			</div>
			<div class="form-group">
				<label class="text-white">Email</label>
				<span class="float-right text-white font-weight-bold"><?php echo $email_err; ?></span>
				<input type="email" name="email" placeholder="Enter your Email" class="form-control" required="required">
			</div>
			<div class="form-group">
				<label class="text-white">Password</label>
				<input type="password" name="password" placeholder="Enter your password" class="form-control" required="required">
			</div>
			<div class="form-group">
				<label class="text-white">confirm Password</label>
				<span class="float-right text-white font-weight-bold"><?php echo $pws_err; ?></span>
				<input type="password" name="cpassword" placeholder="Enter your password" class="form-control" required="required">
			</div>
			<input type="submit" name="submit" value="Register" class="btn btn-success px-5">
			<span class="float-right text-white font-weight-bold"><?php echo $success; echo $error; ?></span>
		</form>
		</div>
		<div id="div2" style="display: none;" class="mt-2">
			<form method="post" action="">

			<div class="form-group">
				<label class="text-white">Email</label>
				<input type="email" name="email" placeholder="Enter your Email" class="form-control">
			</div>
			<div class="form-group">
				<label class="text-white">Password</label>
				<input type="password" name="password" placeholder="Enter your password" class="form-control">
			</div>
			<input type="submit" name="submit1" value="Login" class="btn btn-success px-5">
			

		</div>

		</div>
		
	</div>
	<!-- row ends here-->
</div>
</section>

</body>
</html>
<?php

if (isset($_POST['submit1'])) {
	$email = $_SESSION['email']=$_POST['email'];
	$pwd = $_POST['password'];
	$sql = "select * from register where email = '$email'";
	$run = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($run);

	$pwd_fetch = $row['password'];
	$pwd_decode = password_verify($pwd,$pwd_fetch);
	if ($pwd_decode) {

		echo "<script> window.open('main.php?success=loggedin Successully','_self') </script>";
		# code...
	}
	else{

		echo "<script> window.open('index.php?error=username or password is incorect ','_self')</script>";
	}
	# code...
}

?>
