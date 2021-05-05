<?php

include 'dbconnect.php';


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
				<h3 class="text-center text-success"><?php echo @$_GET['update_success'];echo @$_GET['update_err']?></h3>
				<h3 class="text-center text-success"><?php echo @$_GET['delete_msg'];  ?></h3>
				<h2 class="text-center text-danger pt-3 font-weight-bold">Student management system </h2>
				<div class="container bg-danger " id="formsetting">
					<h3 class="text-center text-white pb-4 pt-2 font-weight-bold">View Student Information</h3>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-12">
							<table class="table table-bordered text-white table-responsive">
								<thead>
									<tr>
										<th>SNO</th>
										<th>Firstname</th>
										<th>Lastname</th>
										<th>Fathername</th>
										<th>Email</th>
										<th>Birthdate</th>
										<th>Mobile</th>
										<th>Gender</th>
										<th>City</th>
										<th>District</th>
										<th>State</th>
										<th>Nationality</th>
										<th>Action</th>
										


									</tr>
								</thead>
								<?php

								$sql = "select * from student_detail";
								$run = mysqli_query($conn,$sql);
								$i = 1;
								while($row = mysqli_fetch_assoc($run))
								{


								


								?>
								<tbody>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $row['fname']; ?></td>
										<td><?php echo $row['lname']; ?></td>
										
										<td><?php echo $row['fathername']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $row['bday']; ?></td>
										<td><?php echo $row['mobileno']; ?></td>
										<td><?php echo $row['gender']; ?></td>
										<td><?php echo $row['city']; ?></td>
										<td><?php echo $row['district']; ?></td>
										
										<td><?php echo $row['state']; ?></td>
										<td><?php echo $row['nationality']; ?></td>

										<td>
											<a style="color: white; text-decoration: none;" href="edit_student_detail.php?edit_student=<?php echo $row ['st_id']; ?>">Edit</a> |
											<a style="color: white; text-decoration: none;" href="delete_student_detail.php?delete_student=<?php echo $row ['st_id']; ?>">Delete</a>

										</td>

										

									</tr>
								</tbody>
								<?php
							}
							?>
								
							</table>
							
						</div>
						
					</div>
					

				</div>
				

			</section>


		</div>
	</div>

</body> </html>
