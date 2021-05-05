<?php

include 'dbconnect.php';



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
					<h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Edit student details</h3>
					<?php

					if(isset($_GET['edit_student'])){

						$edit_st_id= $_GET['edit_student'];
						$query= "select * from student_detail where st_id = '$edit_st_id'";
						$run = mysqli_query($conn,$query);
						while($row = mysqli_fetch_assoc($run))
						{


						
					




					?>





					<form method="post" action="" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-5 col-sm-5 col-12">
							<div class="form-group">
							<label class="text-white">First name</label>
							<input type="text" name="fname" placeholder="enter your first name" class="form-control" value="<?php echo $row['fname'] ; ?>">
						</div>
						<div class="form-group">
							<label class="text-white">Email</label>
							<input type="text" name="email" placeholder="enter your email" class="form-control" value="<?php echo $row['email'] ; ?>">
						</div>
						<div class="form-group">
							<label class="text-white">Father name</label>
							<input type="text" name="fathername" placeholder="enter your father name" class="form-control" value="<?php echo $row['fathername'] ; ?>">
						</div>
						<div class="form-group">
							<label class="text-white">Gender</label>
							<input type="radio" name="gender" value="male" class="form-check-input ml-2" <?php if($row['gender']=='male') echo "checked";  ?>>
							<label class="form-check-label text-white pl-4">Male</label>
							
							<input type="radio" name="gender" value="female" class="form-check-input ml-2" <?php if($row['gender']=='female') echo "checked";  ?>>
							<label class="form-check-label text-white pl-4">Female</label>
							

						</div>
						<div class="form-group">
							<label class="text-white">City name</label>
							<input type="text" name="city" placeholder="enter your City name" class="form-control" value="<?php echo $row['city'] ; ?>">
						</div>
						<div class="form-group">
							<label class="text-white">Nationality</label>
							<input type="text" name="nationality" placeholder="enter your nationality " class="form-control" value="<?php echo $row['nationality'] ; ?>">
						</div>




						</div>
						<div class="col-md-5 col-sm-5 col-12">
							<div class="form-group">
							<label class="text-white">last name</label>
							<input type="text" name="lname" placeholder="enter your lastst name" class="form-control" value="<?php echo $row['lname'] ; ?>">
						</div>
						<div class="form-group">
							<label class="text-white">Birthdate </label>
							<input type="date" name="bday" placeholder="enter your Birthdate" class="form-control" value="<?php echo $row['bday'] ; ?>">
						</div>
							<div class="form-group">
							<label class="text-white">Mobile number</label>
							<input type="text" name="mobileno" placeholder="enter your mobile number" class="form-control"value="<?php echo $row['mobileno'] ; ?>" >
						</div>
						<div class="form-group">
							<label class="text-white">District</label>
							<input type="text" name="district" placeholder="enter your district" class="form-control" value="<?php echo $row['district'] ; ?>">
						</div>
						<div class="form-group">
							<label class="text-white">State</label>
							<input type="text" name="state" placeholder="enter your state" class="form-control" value="<?php echo $row['state'] ; ?>">
						<?php }} ?>
						</div>
						
						<input type="submit" name="update" value="update detail" class="btn btn-success px-5 mt-2">

						</div>

				</div>
			</form>
			</div>
				

			</section>


		</div>
	</div>

</body> </html>
<?php


include 'dbconnect.php';

if(isset($_POST['update'])){
	$edit_st_id= $_GET['edit_student'];


$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$fathername = mysqli_real_escape_string($conn,$_POST['fathername']);
$lname = mysqli_real_escape_string($conn,$_POST['lname']);
$bday = mysqli_real_escape_string($conn,$_POST['bday']);
$gender = mysqli_real_escape_string($conn,$_POST['gender']);
$city = mysqli_real_escape_string($conn,$_POST['city']);
$district = mysqli_real_escape_string($conn,$_POST['district']);
$state = mysqli_real_escape_string($conn,$_POST['state']);
$mobileno = mysqli_real_escape_string($conn,$_POST['mobileno']);
$nationality = mysqli_real_escape_string($conn,$_POST['nationality']);
#$image = $_FILES['image']['name'];
#$image_type = $_FILES['image']['type'];
#$image_tmp = $_FILES['image']['tmp_name'];

#if(!$image_type == 'image/jpg' or !$image_type == 'image/png' ){

#	$match_error = "invalid format";
#}

#	elseif($image_size <=2000){
 #     $size_error = "image size is larger. image should be less than 2mb";


#	}
#	else{

     # move_uploaded_file($image_tmp, 'st_image/$image');
      $sql = "update student_detail set fname = '$fname',lname='$lname',email='$email',fathername='$fathername',mobileno='$mobileno',bday='$bday',gender='$gender',city='$city',district='$district',city='$city',state='$state',nationality='$nationality' where st_id = '$edit_st_id'";

      $run = mysqli_query($conn,$sql);
      if($run){
      	echo "<script>window.open('view_student.php?update_success=student data updated successfully','_self')</script>";

      }
      else{
      	echo "<script>window.open('view_student.php?update_err=failed to update student data ','_self')</script>";
      	
      }
	#}


}


?>
