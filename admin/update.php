<!-- Required php functions -->
<?php
	session_start();
	include_once('../includes/force_login.inc.php');
	require_once "../requires/db.inc.php";
?>

<!-- Webpage -->
<html>
	<head>
		<title>Update</title>
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
		<h1>Update ↩️</h1>

		<?php
			$myid = strip_tags($_REQUEST['id']);
			$myname = strip_tags($_REQUEST['name']);
			$myprice = strip_tags($_REQUEST['price']);

			if($_REQUEST['name']) {
				$sql = "UPDATE products SET name='$myname', price=$myprice WHERE id=$myid";

				// This is the procedural style to query the database
				if(mysqli_query($mysqli, $sql) === TRUE){
					echo "$myname updated successfully!";
				} /* else {
					echo "Error: $sql <br>" . mysqli_error($mysqli);
				} */
			}

			$sql = "SELECT * FROM products WHERE id=$myid";

			// This is the procedural style to query the database
			$result = mysqli_query($mysqli, $sql);

			$row = mysqli_fetch_array($result);
		?>

		<!-- Input Form -->
		<form method="POST">
			<input type="hidden" name="id" value="<?= strip_tags($row['id']) ?>" />

			<label>Name:</label>
			<input type="text" name="name" value="<?php echo strip_tags($row['name']) ?>" />

			<label>Price:</label>
			<input type="text" name="price" value="<?= strip_tags($row['price']) ?>" />

			<input type="submit" value="update" />
		</form>

		<!-- Footer -->
		<br>
	    <br>
	    <footer>Created by: Sebastian Quiles</footer>
	</body>
</html>