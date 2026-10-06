<?php
include('connect.php');

	$name=$_POST['name'];
    $age=$_POST['age'];
	$dept=$_POST['dept'];
    
    

if (isset($_POST["create"])) {
    $name = mysqli_real_escape_string($db_con, $_POST["name"]);
    $age = mysqli_real_escape_string($db_con, $_POST["age"]);
    $dept = mysqli_real_escape_string($db_con, $_POST["dept"]);
	
    $sqlInsert = "INSERT INTO staff(name , age , dept) VALUES ('$name','$age','$dept')";
    if(mysqli_query($db_con,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "staff Added Successfully!";
        header("Location:viewstaff.php");
    }else{
        die("Something went wrong");
    }
}


    


?>