<!-- Required php functions -->
<?php
	session_start();
	include_once('../includes/force_login.inc.php');
	require_once "../requires/db.inc.php";
?>

<!-- Webpage -->
<html>
	<head>
		<title>Delete</title>
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

		<?php
			echo "<div style=\"text-align:center\">";
			include('../includes/header.php');
		?>

		<!-- Content -->
		<h1>Delete ❌</h1>

		<?php
			$myid = $_REQUEST['id'];

			if($_REQUEST['csrf_token'] === $_SESSION['csrf_token']) {
				// Resets the token value so it can't be used twice
				unset($_SESSION['csrf_token']);
			

				$sql = "DELETE FROM products WHERE id=$myid";

				// This is the object-oriented style to query the database
				if($mysqli->query($sql) === TRUE) {
					echo "Successfully deleted.";
				} /* else {
					echo "Error: $sql <br>" . $mysqli->error;
				} */
			} else {
				echo "You are a hacker";
			}
		?>

		<!-- Footer -->
		<br>
	    <br>
	    <footer>Created by: Sebastian Quiles</footer>
	</body>
</html>