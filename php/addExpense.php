<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP6</title>
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
	$item1 = $_POST['bill'];
	$item2 = $_POST['cost'];
	$item3 = $_POST['date'];


	$result = mysqli_query($conn,"SELECT FlatID FROM users WHERE EmailAddress='$email' ");
	$row = mysqli_fetch_assoc($result);
	$result2 = $row['FlatID'];

	echo "Working!";

	$sql = "INSERT INTO expenses (ExpensesID, Bill, Cost, DateDue)
	VALUES ('$result2', '$item1', '$item2', '$item3')";

	mysqli_query($conn, $sql);










	mysqli_close($conn);
	header("Location: http://www.mddn201flatter.epizy.com/php/flat.php");
	exit();


	?>
</body>
</html>