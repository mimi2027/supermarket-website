<?php
include('connect.php');

	$name=$_POST['name'];
    $age=$_POST['age'];
	$email=$_POST['email'];
    
    

if (isset($_POST["create"])) {
    $name = mysqli_real_escape_string($db_con, $_POST["name"]);
    $age = mysqli_real_escape_string($db_con, $_POST["age"]);
    $email = mysqli_real_escape_string($db_con, $_POST["email"]);
	
    $sqlInsert = "INSERT INTO customer(name , age , email) VALUES ('$name','$age','$email')";
    if(mysqli_query($db_con,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "customer Added Successfully!";
        header("Location:viewcustomer.php");
    }else{
        die("Something went wrong");
    }
}


    


?>