<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="icon" href="../images/logo-colour.png">
</head>
<body>
	<?php
	$servername = "sql301.epizy.com";
	$username = "epiz_20916105";
	$password = "9HH8z2ENJVPW";
	$dbname = "epiz_20916105_registration";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$email = $_POST['email'];
	$password = $_POST['password'];

	$result = mysqli_query($conn,"SELECT EmailAddress, Password, Registered FROM users WHERE EmailAddress='$email' AND Password='$password' AND Registered='1' ");
	$rowcount = mysqli_num_rows($result);

	$inFlat = mysqli_query($conn,"SELECT FlatID FROM users WHERE EmailAddress='$email'");
	$rowFlat = mysqli_fetch_array($inFlat);
	$result3 = $rowFlat['FlatID'];
	$rint = (int)$result3;
	
	if($rowcount > 0){
		$_SESSION['login_user'] = $email;
		if($rint != 0){
			header("Location: http://www.mddn201flatter.epizy.com/php/flat.php");
			exit();
		} else {
			header("Location: http://www.mddn201flatter.epizy.com/joinflat.html");
			exit();
		}
	} else {
		header("Location: http://www.mddn201flatter.epizy.com/reactions/noUser.html");
		exit();
	}

	mysqli_close($conn);
	?>
</body>
</html>