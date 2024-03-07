<!-- PHP functions -->
<?php
	session_start();

	$_SESSION["csrf_token"] = bin2hex(random_bytes(64));
	// echo "The session for CSRF is: . $_SESSION["csrf_token"];

	require_once "./requires/db.inc.php";
?>

<!-- Webpage -->
<html>
	<head>
		<title>Products</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
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
			include('./includes/header.php');
		?>

		<!-- Content -->
		<h1>Products 📦</h1>
		
		<?php
			// Assign the SQL statement
			$sql = "SELECT * FROM products WHERE name LIKE ? ORDER BY id";

			// Add wildcards to our search term
			$search = $_GET['search'];
			$myterm = "%{$search}%";

			// Prepare the statement
			$stmt = mysqli_prepare($mysqli, $sql);
			mysqli_stmt_bind_param($stmt, "s", $myterm);

			// Run the query
			mysqli_stmt_execute($stmt);
			$results = mysqli_stmt_get_result($stmt);
		?>

		<?php
		/*
			$search = $_GET['search'];
			$sql = "SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY id";
		*/
			// echo "The query is: $sql <br><br>";
		?>

		<!-- Search Bar -->
		<form>
			<input type="text" name="search">
			<input type="submit" value="Search">
		</form>

		<!-- Inventory List -->
		<?php
			// $sql = "SELECT * FROM products";

			// This is the procedural style to query the database
			$result = mysqli_query($mysqli, $sql);

			while($row = mysqli_fetch_array($results)) {
				$id = strip_tags($row['id']);
				$name = strip_tags($row['name']);
				$price = strip_tags($row['price']);

				echo "ID: {$id} | {$name} | \$ {$price}

				<br />";

				if($_SESSION['username'] != NULL) {
					/*
					echo "<a href='update.php?id={$row['id']}'>update</a> ";
					echo "<a href='delete.php?id={$row['id']}'>delete</a> ";
					*/

					echo "<form method='POST' action='./admin/update.php?id={$id}'>
						<input type='hidden' name='csrf_token' value='{$_SESSION['csrf_token']}'>
						<input type='submit' value='Update' />
					</form>";

					echo "<form method='POST' action='./admin/delete.php?id={$id}'>
						<input type='hidden' name='csrf_token' value='{$_SESSION['csrf_token']}'>
						<input type='submit' value='Delete' />
					</form>";
				}

				echo "<form method='POST' action='/cart/'>
						<input type='hidden' name='product_id' value='{$id}' />
						<input type='hidden' name='price' value='{$price}' />
						<input type='submit' value='Buy Now' />
					</form>";

				echo "<br />";	
			}
		?>

		<!-- Footer -->
		<br>
	    <br>
	    <footer>Created by: Sebastian Quiles</footer>
	</body>
</html>