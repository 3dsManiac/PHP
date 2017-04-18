
<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
</head>
<body>
	<?php
	$servername = "localhost";
	$username = "id1409636_studs";
	$password="testing";
	$dbname ="id1409636_students";

	$conn = new mysqli($servername, $username, $password,$dbname);

	if($conn->connect_error) {
		die("connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully!";
	echo "<p style='font-size: 35px; color:red;'>YES!</p>";

	

	$roll = $_POST['roll'];
	$no = (float)(substr($roll,5,3));
	$sql1 = "Select * from Students where ID =".addslashes(strtoupper($roll));
	$result = $conn->query($sql1);
	$row=$result->fetch_assoc();
	echo "<h2>Welcome<br/>".$result['Name']."</h2>";
	if($no<30)
	{
		$Q = 1-$no/30;
		echo "Obtained ";
	}
	else if($no<46)
	{
		$Q = $no/15-1;
		echo "Obatined ";
	}
	else if($no>100 && $no<116)
	{
		$Q = 2 + ($no-100)/15;
		echo "Obatined ";
	}
	else
	{
		echo "<script type='text/javascript'>alert('You are not from Aero 16!');</script>";
		$Q = 1;
		echo "Default ";
	}

	echo" PHI is : ".$Q;
	if($Q<=1)
	{
		$result = ($Q*241845*1.0)/($Q*40 + (1-$Q)/2*35 +79/42*33) + 298;
		$result1 = ($Q*241845*1.0)/($Q*40 + (1-$Q)/2*35) + 298;
	}
	else
	{
		$result = (241845*1.0)/($Q*40 + ($Q-1)*35 +79/42*33) + 298;
		$result1 = (241845*1.0)/($Q*40 + ($Q-1)/2*30) + 298;
	}
	
	echo "<h1>The resultant adiabatic flame temperatures are :</h1><br/>";
	echo "For air : ".$result." K<br/>";
	echo "With only oxygen and hydrogen : ".$result1." K<br/>";
?>

</body>
</html>
