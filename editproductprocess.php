<?php
include('connect.php');

	$name=$_POST['name'];
    $batch=$_POST['batch'];
	$storage=$_POST['storage'];
	
  
if (isset($_POST["edit"])) {
    $name = mysqli_real_escape_string($db_con, $_POST["name"]);
    $batch no = mysqli_real_escape_string($db_con, $_POST["batch no"]);
    $storage = mysqli_real_escape_string($db_con, $_POST["storage"]);
	$id = mysqli_real_escape_string($db_con, $_POST["id"]);
    $sqlUpdate = "UPDATE staff SET name = '$name', batch no = '$batch no', storage = '$storage' WHERE id='$id'";
    if(mysqli_query($db_con,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "staff Record Updated Successfully!";
        header("Location:viewstaff.php");
    }else{
        die("Something went wrong");
    }
	}

	

?>






