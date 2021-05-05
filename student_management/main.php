<?php

session_start();
if(!$_SESSION['email']){
	$_SESSION['login_first']="Please login first";
	header('location:index.php');


}

?>

<!DOCTYPE html>

<html>

<head>

<title>Responsive menu</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style1.css">
<script>
	jQuery(document).ready(function($){
		
		$('#toggler').click(function(event){
			{
			event.preventDefualt();
			$('#wrap').toggleClass('toggled');

			}
		});
	});
</script>

 </head>

<body>
	<div class="d-flex" id="wrap">
		<div class="sidebar bg-light border-light">
			<div class="sidebar-heading">
				<p class="text-center">Manage students</p>
			</div>
			<ul class="list-group list-group-flush">
				<a href="main.php" class="list-group-item list-group-item-action">
					<i class="fa fa-vcard-o"></i>Dashboard
				</a>
				
				<a href="add_student.php" class="list-group-item list-group-item-action">
					<i class="fa fa-user"></i>Add Student
				</a>
				<a href="view_student.php" class="list-group-item list-group-item-action">
					<i class="fa fa-eye"></i>View Student
				</a>
				
				<a href="logout.php" class="list-group-item list-group-item-action">
					<i class="fa fa-sign-out"></i>Logout
				</a>
			</ul>
		</div>
		<div class="main_body">
			<button class="btn btn-outline-light " id="toggler">
				<i class="fa fa-bars"></i>
			</button>
			<section id="main-form">
				<h2 class="text-center text-danger pt-3 font-weight-bold">Student management system </h2>
				<div class="container bg-danger " id="formsetting">
					<h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Welcome to Dashboard</h3>
					<div class="row">
						<div class="col-md-4 col-sm-4 col-12 m-auto icon">
							<a href="add_student.php" class="text-white text-center"><i class="fa fa-user"></i>
								<h3>Add Student Detail</h3></a>
							
						</div>
						<div class="col-md-4 col-sm-4 col-12 m-auto icon">
							<a href="view_student.php" class="text-white text-center"><i class="fa fa-eye"></i>
								<h3>view Student Detail</h3></a>
							
						</div>
						
					</div>
					<hr>
					
					</div>
					<hr>

				</div>
				

			</section>


		</div>
	</div>

</body> </html>
