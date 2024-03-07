<!-- PHP functions -->
<?php
	session_start();
	require_once "../requires/db.inc.php";

	$myusername = strip_tags($_REQUEST['username']);
	$mypassword = strip_tags($_REQUEST['password']);

	// Assign the SQL statement
	$sql = "SELECT * FROM users WHERE username=? AND password=SHA2(?, 256)";

	// Prepare the statement
	$stmt = mysqli_prepare($mysqli, $sql);
	mysqli_stmt_bind_param($stmt, "ss", $myusername, $mypassword);

	// Run the query
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	/*
	$sql = "SELECT * FROM users WHERE username='$myusername' AND password=SHA2('$mypassword', 256)";
	$result = mysqli_query($mysqli, $sql);
	*/

	$row = mysqli_fetch_array($result);

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		// This is what happens when a user successfully authenticates
		if(!empty($row)) {
			// Delete any data in the current session to start new
			session_destroy();
			session_start();

			$_SESSION['username'] = $row['username'];
		
			// This is what happens when the username and/or password doesn't match
		} else {
			echo "<p>Please retype username OR password.</p>";
		}

		if($_SESSION['username']) {
			// Let's redirect instead of saying "Welcome" here
			// echo "<p>Welcome back {$_SESSION['username']}!</p>";

			/* header("Location: {$_REQUEST['redirect']}");
			exit(); */
			echo "You are logged in. Welcome " . strip_tags($_SESSION['username']);
		}
	}
?>

<!-- Webpage -->
<html>
	<head>
		<title>Login</title>
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
		<h1>Login ⬆️</h1>

		<!-- Input Form -->
		<form method="POST">
			<input type="hidden" name="redirect" value="<?= strip_tags($_REQUEST['redirect']) ?>" />

			<label>Username:</label>
			<input type="text" name="username" />

			<label>Password:</label>
			<input type="password" name="password" />

			<input type="submit" value="Log In" />
		</form>

		<!-- Footer -->
		<br>
	    <br>
	    <footer>Created by: Sebastian Quiles</footer>
	</body>
</html>