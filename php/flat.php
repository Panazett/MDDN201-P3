<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Flatter</title>
	<link rel="stylesheet" type="text/css" href="../css/panel.css">
	<link rel="icon" href="../images/logo-colour.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/hover.css">
</head>
<body>
	<?php //Setup
			$servername = "sql301.epizy.com";
			$username = "epiz_20916105";
			$password = "9HH8z2ENJVPW";
			$dbname = "epiz_20916105_registration";

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			$email = $_SESSION['login_user'];

			// Get Flat ID for logged in user
			$result = mysqli_query($conn,"SELECT FlatID FROM users WHERE EmailAddress='$email' ");
			$row = mysqli_fetch_assoc($result);
			$result2 = $row['FlatID'];
	?>


	<div id="cover">
		<a class="submit_button2" href="logout.php">Log Out</a>
		<?php
		echo "<p class='submit_butto'> Flat ID - " . $result2 . "</p>";
		?>
	</div>
	<div id='widgets'>











	<?php
	// Display Users in Flat
	$flatMemebers = array();
    $flatMemebersResults = mysqli_query($conn,"SELECT FirstName FROM users WHERE FlatID='$result2' ");
    while ( $test2 = mysqli_fetch_array($flatMemebersResults) ) {
        $result_array2[] = $test2;
    };

    echo "<div class='widget animated fadeInUp'>
			<h2>Flat Memebers</h2><br>
			<ul id='names'>";
	$members = 0;
    foreach ($result_array2 as $items) {
    	$members += 1;
   		echo "<li>" . $items['FirstName'] . "</li>";
	};

	echo "</div>";
	console.log($members);
	?>



	<?php
	// Display Items in Shopping List
	$shoppingList = array();
    $shoppingListResults = mysqli_query($conn,"SELECT Item, Price FROM shopping WHERE ShoppingID='$result2' ");
    while ( $test = mysqli_fetch_array($shoppingListResults) ) {
        $result_array[] = $test;
    };

    echo "<div class='widget animated fadeInUp '>
			<h2>Shopping List</h2><br>
			<ul id='names'>";

    foreach ($result_array as $items) {
   		echo "<li>" . $items['Item'] . "</li>";
	};

	echo "</div>";
	?>
	<p class="click animated fadeInUp" id="SLclickadd" onclick="popuprem()">Remove</p>
	<p class="click animated fadeInUp" id="SLclickrem" onclick="popupadd()">Add</p>

	<form action="addShopping.php" method="post" class="animated fadeInUp" id="SLpopupAdd">
		<input class="input" type="text" name="item" placeholder="Shopping Item..." spellcheck="false" required><br>
		<input type="submit" class="submit_button animated fadeInUp" value="Add!" />
	</form>
	<form action="removeShopping.php" method="post" class="animated fadeInUp" id="SLpopupRem">
		<input class="input" type="text" name="item" placeholder="Shopping Item..." spellcheck="false" required><br>
		<input type="submit" class="submit_button animated fadeInUp" value="Remove!" />
	</form>




	<?php
	// Display Items in Expenses List
	$expsnsesList = array();
    $expsnsesListResult = mysqli_query($conn,"SELECT Bill, Cost, DateDue FROM expenses WHERE ExpensesID='$result2' ");
    while ( $test3 = mysqli_fetch_array($expsnsesListResult) ) {
        $result_array3[] = $test3;
    };

    echo "<div class='widget animated fadeInUp'>
			<h2>Expenses</h2><br>
			<ul id='names'>";

	$timezone = date("Ymd", time());

	foreach ($result_array3 as $items) {
		$itemTime = date("Ymd", strtotime($items['DateDue']));
		if($timezone > $itemTime){
			$bills = $items['Bill'];
			$sql = "DELETE FROM expenses WHERE Bill = '$bills' ";
			$run = mysqli_query($conn, $sql);
		};
	};


    foreach ($result_array3 as $items) {
    	$month = date('F d', strtotime($items['DateDue']));
    	$amounts = round(($items['Cost']/$members), 2);
   		echo "<li>" . $items['Bill'] . " - $" . $amounts . " each - " . $month .  "</li>";
	};

	echo "</div>";
	?>
	<p class="click animated fadeInUp" id="Eclickadd" onclick="popuprem2()">Remove</p>
	<p class="click animated fadeInUp" id="Eclickrem" onclick="popupadd2()">Add</p>

	<form action="addExpense.php" method="post" class="animated fadeInUp" id="EpopupAdd">
		<input class="input" type="text" name="bill" placeholder="Expense Name..." spellcheck="false" required><br>
		<input class="input" type="number" step="0.01" min="0" name="cost" placeholder="Amount Due..." spellcheck="false" required><br>
		<input class="input" type="date" name="date" placeholder="Date Due..." spellcheck="false" required><br>

		<input type="submit" class="submit_button animated fadeInUp" value="Add!" />
	</form>
	<form action="removeExpense.php" method="post" class="animated fadeInUp" id="EpopupRem">
		<input class="input" type="text" name="item" placeholder="Expense Name..." spellcheck="false" required><br>
		<input type="submit" class="submit_button animated fadeInUp" value="Remove!" />
	</form>










	<?php
	mysqli_close($conn);
	?>
	<script type="text/javascript" src="../panelScript.js"></script>
</body>
</html>