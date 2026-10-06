<?php
include('connect.php');

	$name=$_POST['name'];
    $age=$_POST['age'];
	$dept=$_POST['dept'];
	
  
if (isset($_POST["edit"])) {
    $name = mysqli_real_escape_string($db_con, $_POST["name"]);
   $age = mysqli_real_escape_string($db_con, $_POST["age"]);
    $dept = mysqli_real_escape_string($db_con, $_POST["dept"]);
	$id = mysqli_real_escape_string($db_con, $_POST["id"]);
    $sqlUpdate = "UPDATE staff SET name = '$name', age = '$age', dept = '$dept' WHERE id='$id'";
    if(mysqli_query($db_con,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "staff Record Updated Successfully!";
        header("Location:viewstaff.php");
    }else{
        die("Something went wrong");
    }
	}

	

?>






