<!-- PHP functions -->
<?php
	session_start();
?>

<!-- Webpage -->
<!DOCTYPE HTML>
<html lang=en>
	<head>
		<title>Juice Bar</title>
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

		<!-- Content-->
		<h1>Welcome 👋</h1>

	    <p>Welcome to the <b>JUICE BAR 🧃</b>!</p>
	    
	    <p>We have been making fresh juice for the residents of Wisconsin since 2005.</p>

	    <p>Stop by and try our juice today!</p>

		<h1>Our Mission 👔</h1>
	    <p>To provide not only the best quality service, but the best tasting juice in the Pewaukee area!</p>

	    <!-- Footer -->
	    <br>
	    <br>
	    <footer>Created by: Sebastian Quiles</footer>
	</body>
</html>