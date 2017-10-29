<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP3</title>
	<link rel="icon" href="../images/logo-colour.png">
</head>
<body>
	<?php
	$servername = "sql301.epizy.com";
	$username = "epiz_20916105";
	$password = "9HH8z2ENJVPW";
	$dbname = "epiz_20916105_registration";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	} else {
		echo "Connected successfully <br>";
	}

	$email = $_SESSION['login_user'];
	$flatid = mt_rand(100000,999999);

	$result = mysqli_query($conn,"SELECT EmailAddress FROM users WHERE EmailAddress='$email' ");
	$rowcount = mysqli_num_rows($result);

	$inFlat = mysqli_query($conn,"SELECT FlatID FROM users");
	$rowFlat = mysqli_fetch_assoc($inFlat);
	$result2 = $rowFlat['FlatID'];
	$result3 = (int)$result2;


	if($rowcount > 0 && $result3 < 100){
		$sql = "INSERT INTO flat (FlatID)
		VALUES ('$flatid')";
		mysqli_query($conn, $sql);
		mysqli_query($conn,"UPDATE users SET flatID='$flatid' WHERE EmailAddress='$email' ");
		
		header("Location: http://www.mddn201flatter.epizy.com/php/flat.php");
		exit();
	}

	mysqli_close($conn);
	?>
</body>
</html>