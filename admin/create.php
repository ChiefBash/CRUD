<!-- PHP functions -->
<?php
	include_once('../includes/force_login.inc.php');
	require_once "../requires/db.inc.php";
?>

<!-- Webpage -->
<html>
	<head>
		<title>Create</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../style.css">
	</head>

	<body>
		<!-- Banner -->
		<header>
			<center>
				<img src="/images/logo.png" alt="Juice Bar Logo" width="30%" height="30%">
			</center>
			<p><i>Quench Your Tastebuds</i>™</p>
		</header>

		<!-- Navbar -->
		<?php
			echo "<div style=\"text-align:center\">";
			include('../includes/header.php');
		?>

		<!-- Content -->
		<h1>Create ✅</h1>

		<?php
		if($_POST['name']) {

			$myname = strip_tags($_POST['name']);
			$myprice = strip_tags($_POST['price']);

			$sql = "INSERT INTO products (name, price) VALUES ('$myname', $myprice)";

			// This is the object-oriented style to query the database
			if($mysqli->query($sql) === TRUE) {
				echo "Product $myname created successfully!";
			} /* else {
				echo "Error: $sql <br>" . $mysqli->error;
			} */
		}
		?>

		<!-- Input Form -->
		<form method="POST">
			<label>Name:</label>
			<input type="text" name="name" required />

			<label>Price:</label>
			<input type="number" name="price" min="0.01" step="0.01" max="2500" required />

			<input type="submit" value="Create Product" />
		</form>

		<!-- Footer -->
		<br>
	    <br>
	    <footer>Created by: Sebastian Quiles</footer>
	</body>
</html>