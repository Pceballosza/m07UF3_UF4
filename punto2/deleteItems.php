<?php 
	$servername = "localhost";
	$username = "root";
	$password = "alumne";
	$db="m07uf3";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password,$db);
        
        
	$id=$_POST['id'];
	$sql = "DELETE FROM estadistiques WHERE id=$id";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);



?>