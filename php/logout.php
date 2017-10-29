<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
	session_destroy();

	header("Location: http://www.mddn201flatter.epizy.com/signin.html");
	exit();
	?>
</body>
</html>