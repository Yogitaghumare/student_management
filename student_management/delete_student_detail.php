<?php 

include 'dbconnect.php';

if(isset($_GET['delete_student'])){
$delete = $_GET['delete_student'];

$sql="delete from student_detail where st_id = '$delete'";
$run = mysqli_query($conn,$sql);
if(($run)>0){
echo "<script>window.open('view_student.php','_self')</script>";

}

else {
    echo "<script>alert('Unable to delete data')</script>";
}
}




?>