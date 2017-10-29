<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Verification</title>
	<link rel="icon" href="../images/logo-colour.png">
</head>
<body>
	<?php
	$servername = "sql301.epizy.com";
	$username = "epiz_20916105";
	$password = "9HH8z2ENJVPW";
	$dbname = "epiz_20916105_registration";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$email = $_GET['email'];
	$hash = $_GET['hash'];

	$result = mysqli_query($conn,"SELECT EmailAddress, hash, Registered FROM users WHERE EmailAddress='$email' AND hash='$hash' AND Registered='0' ");
	$rowcount = mysqli_num_rows($result);
	
	if($rowcount > 0){
		mysqli_query($conn,"UPDATE users SET Registered='1' WHERE EmailAddress='$email' AND hash='$hash' AND Registered='0' ");
		header("Location: http://www.mddn201flatter.epizy.com/reactions/verified.html");
		exit();
	} else {
		header("Location: http://www.mddn201flatter.epizy.com/reactions/wrong.html");
		exit();
	}

	mysqli_close($conn);
	?>
</body>
</html>