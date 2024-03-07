<!-- Required php functions -->
<?php
	session_start();
	session_unset();
	session_destroy();
?>

<!-- Webpage -->
<html>
	<head>
		<title>Logout</title>
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
		<h1>Logout ⬇️</h1>

		<p>You have been successfully logged out.</p>

		<!-- Footer -->
		<br>
	    <br>
	    <footer>Created by: Sebastian Quiles</footer>
	</body>
</html>