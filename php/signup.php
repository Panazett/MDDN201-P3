<!DOCTYPE html>
<html>
<head>
	<title>Flatter Signup</title>
	<link rel="icon" href="../images/logo-colour.png">
</head>
<body>
	<?php
	$servername = "sql301.epizy.com";
	$username = "epiz_20916105";
	$password = "9HH8z2ENJVPW";
	$dbname = "epiz_20916105_registration";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	//if (!$conn) {
    	//die("Connection failed: " . mysqli_connect_error());
	//} else {
		//echo "Connected successfully ";
	//}

	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$hash = md5( rand(0,1000) );

	// EMAIL //
	$to = $email;
	$subject = 'Flatter Verification';
	$message = '

	Thank you '.$first.' for signing up to Flatter!

	Click the link below to activate your account :)

	http://www.mddn201flatter.epizy.com/php/verify.php?email='.$email.'&hash='.$hash.'

	';
	$headers = 'From:noreply@yourwebsite.com' . "\r\n";


	$result = mysqli_query($conn,"SELECT EmailAddress FROM users WHERE EmailAddress='$email' AND Registered = '1' ");
	$rowcount = mysqli_num_rows($result);


	if($rowcount == 0){
		$sql = "INSERT INTO users (FirstName, LastName, EmailAddress, Password, hash)
		VALUES ('$first','$last', '$email', '$password', '$hash')";
		if (mysqli_query($conn, $sql)) {
			mail($to, $subject, $message, $headers);
			header("Location: http://www.mddn201flatter.epizy.com/reactions/emailSent.html");
			exit();
		};
	} else {
		header("Location: http://www.mddn201flatter.epizy.com/reactions/emailUsed.html");
		exit();
	};




	mysqli_close($conn);
	?>
</body>
</html>