<!-- Required php functions -->
<?php
	session_start();
?>

<!-- Webpage -->
<!DOCTYPE HTML>
<html lang=en>
    <head>
    	<title>Juices</title>
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
        <!-- Apple Juice -->
        <h1>Apple Juice 🍎</h1>

        <p>Our classic apple juice is made with fresh <b>Pink Lady apples</b> imported from Australia!</p>

        <p><i>Hot Apple Cider available exclusively during the winter ☃️</i></p>

        <h3>$1.99</h3>

        <img src="/images/applejuice.png" alt="Apple Juice" class="center" width="15%" height="30%">

        <!-- Lemonade -->
        <h1>Lemonade 🍋</h1>

        <p>Our sour lemonade made with fresh <b>Californian lemons</b> with a wedge will definitely rejuvenate your spirit!</p>

        <p><i>Customers' favorite during the summer ☀️</i></p>

        <h3>$2.99</h3>

        <img src="/images/lemonade.png" alt="Lemonade" class="center" width="15%" height="30%">

        <!-- Limeade -->
        <h1>Mint Limeade 🌿</h1>

        <p><u><b>Top Seller 🏆</b></u></p>

        <p>Our signature Mint Limeade has been our top seller since we opened!</p>

        <p>Made with freshly grown imported <b>Brazillian limes</b> with an addition of <b>South African mint</b>.</p>

        <h3>$3.99</h3>

        <img src="/images/limeade.png" alt="Mint Limeade" class="center" width="15%" height="30%">

        <p><i>More juices are <u>coming soon</u>!</i></p>

        <!-- Footer -->
        <br>
        <br>
        <footer>Created by: Sebastian Quiles</footer>
    </body>
</html>