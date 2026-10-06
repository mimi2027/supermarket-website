<?php
include('connect.php');

	$name=$_POST['name'];
    $batch no=$_POST['batch no'];
	$storage=$_POST['storage'];
    
    

if (isset($_POST["create"])) {
    $name = mysqli_real_escape_string($db_con, $_POST["name"]);
    $batch no = mysqli_real_escape_string($db_con, $_POST["batch no"]);
    $storage = mysqli_real_escape_string($db_con, $_POST["storage"]);
	
    $sqlInsert = "INSERT INTO product(name , batch no , storage) VALUES ('$name','$batch no','$storage')";
    if(mysqli_query($db_con,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "product Added Successfully!";
        header("Location:viewproduct.php");
    }else{
        die("Something went wrong");
    }
}


    


?>