<?php
	$servername = "localhost";
	$username = "root";
	$password = "alumne";
	$db="m07uf3";
	$conn = mysqli_connect($servername, $username, $password,$db);

            
	$modalitat=$_POST['modalitat'];
	$nivell=$_POST['nivell'];
	$intents=$_POST['intents'];
	$sql = "INSERT INTO estadistiques(`modalitat`, `nivell`, `intents`) 
	VALUES ('$modalitat','$nivell','$intents')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>
 