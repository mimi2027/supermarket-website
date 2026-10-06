<?php
include('connect.php');

	$name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];
	
   
    
if (isset($_POST["edit"])) {
    $name = mysqli_real_escape_string($db_con, $_POST["name"]);
    $age = mysqli_real_escape_string($db_con, $_POST["age"]);
    $email = mysqli_real_escape_string($db_con, $_POST["email"]);
  
    $id = mysqli_real_escape_string($db_con, $_POST["id"]);
    $sqlUpdate = "UPDATE customer SET name = '$name', age = '$age', email = '$email' WHERE id='$id'";
    if(mysqli_query($db_con,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "customer Record Updated Successfully!";
        header("Location: viewcustomer.php");
    }else{
        die("Something went wrong");
    }
	}

	

?>