<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP4</title>
	<link rel="icon" href="../images/logo-colour.png">
</head>
<body>
	<?php
	$servername = "sql301.epizy.com";
	$username = "epiz_20916105";
	$password = "9HH8z2ENJVPW";
	$dbname = "epiz_20916105_registration";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$email = $_SESSION['login_user'];
	$flatid = $_POST['flatid'];

	$result = mysqli_query($conn,"SELECT FlatID FROM flat WHERE FlatID='$flatid' ");
	$rowcount = mysqli_num_rows($result);

	if($rowcount > 0){
		mysqli_query($conn,"UPDATE users SET flatID='$flatid' WHERE EmailAddress='$email' ");
		header("Location: http://www.mddn201flatter.epizy.com/php/flat.php");
		exit();
	} else {
		header("Location: http://www.mddn201flatter.epizy.com/reactions/noFlat.html");
		exit();
	}

	mysqli_close($conn);
	?>
</body>
</html>