<a href="/"> Home </a>〡<a href="shop.php"> Shop </a>〡<a href='products.php'> Products </a>〡<a href='/cart/index.php'> Cart </a>

<!-- Dynamic navbar -->
<?php
	if($_SESSION['username'] != NULL) {
		echo "〡<a href='/admin/create.php'>Create</a>〡<a href='/admin/logout.php'>Logout</a>";
	} else {
		echo "〡<a href='/admin/login.php'>Login</a>";
	}
?>
<hr style="width:25%">