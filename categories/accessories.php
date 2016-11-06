<!DOCTYPE html>
<?php
	$servername = "localhost";
	$username = "X32237834";
	$password = "X32237834";
	$dbname = "X32237834";
	
	$conn = mysqli_connect("$servername", "$username", "$password");
	mysqli_select_db($conn, "$dbname");
	
	if (!$conn)
	{
		die("Connection failed: " . $conn -> connect_error);
	}
?>
<html>
	<head>
		<title>Products</title>
		<link rel="stylesheet" type="text/css" href="../products.css"/>
		<link rel="stylesheet" type="text/css" href="../searchStyles.css"/>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>CompuTech</h1>
				<ul>
					<li><a href="../index.html">Home</a></li>
					<li><a href="../about.html">About</a></li>
					<li><a href="../contact.html">Contact</a></li>
					<li><a class="active" href="../all_products.php">Products</a></li>
					<li><a href="../search.php">Search</a></li>
					<li style="float:right"><a href="../myaccount.php">MyAccount</a></li>
					<li style="float:right"><a href="../register.html">Register</a></li>
				</ul>
			</div>
			<div id="content">
				<div id="nav">
					<h2>Categories</h2>
					<ul class="img-list">
						<li><a href="case.php">
							<span class="cat_li">TOWERS</span>
							<img src="../logos/case.png" alt="Towers"></a>
						</li>
						<li><a href="motherboard.php">
							<span class="cat_li">MOTHERBOARD</span>
							<img src="../logos/mboard.png" alt="Motherboard"></a>
						</li>
						<li><a href="cpu.php">
							<span class="cat_li">CPU</span>
							<img src="../logos/cpu.png" alt="CPU"></a>
						</li>
						<li><a href="ram.php">
							<span class="cat_li">RAM</span>
							<img src="../logos/ram.png" alt="RAM"></a>
						</li>
						<li><a href="gpu.php">
							<span class="cat_li">GPU</span>
							<img src="../logos/gpu.png" alt="Graphics"></a>
						</li>
						<li><a href="hdd.php">
							<span class="cat_li">STORAGE</span>
							<img src="../logos/hdd.png" alt="HDD"></a>
						</li>
						<li><a href="monitor.php">
							<span class="cat_li">DISPLAY</span>
							<img src="../logos/monitor.png" alt="Monitors"></a>
						</li>
						<li><a href="software.php">
							<span class="cat_li">SOFTWARE</span>
							<img src="../logos/software.png" alt="Software"></a>
						</li>
						<li><a href="accessories.php">
							<span class="cat_li">ACCESSORIES</span>
							<img src="../logos/accessories.png" alt="Accessories"></a>
						</li>
					</ul>
				</div>
				<div id="main">
					<h3>Accessories<br></h3>
					<?php
						$query = "SELECT productID, productName, productType, productDescription, Price, Quantity, Image FROM products WHERE (productType LIKE 'Accessories');";
						$result = mysqli_query($conn, $query);
						
						if (!$result)
						{
							print "Error - the query could not be executed";
							$error = mysqli_error();
							print "<p>" . $error . "</p>";
							exit;
						}
						else
						{
							if (mysqli_fetch_array($result))
							{
								print "<div class=\"results_div\">";
								while ($line = mysqli_fetch_array($result))
								{
									print "<div class=\"product_div\">";
									print "<p class=\"searchResults\">Product Name: " . $line['productName'] . "<br />" .
									"Type: " . $line['productType'] . "<br />" .
									"Description: " . $line['productDescription'] . "<br />" .
									"Price: " . $line['Price'] . "</p>";
									$id = $line['productID'];
									$title = $line['productName'];
									$price = $line['Price'];
							
					?>
									<div id="buy_form">
										<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
											<input type="hidden" name="cmd" value="_xclick">
											<input type="hidden" name="business" value="kevin.cuz@hotmail.com">
											<input type="hidden" name="lc" value="BM">
											<input type="hidden" name="button_subtype" value="services">
											<input type="hidden" name="no_note" value="0">
											<input type="hidden" name="currency_code" value="AUD">
											<input type="hidden" name="item_name" value="<?php echo $id . $title; ?>">
											<input type="hidden" name="amount" value="<?php echo $price; ?>">
											<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
											<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
											<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
										</form>
									</div>
					<?php	
									$img_link = $line['Image'];	
									print "</div>";
									print "<div class=\"img_div\"><img src=\"$img_link\" alt=\"resultImg\" style=\"width: 200px; height: 100px;\"></div>";	
								}
								print "</div>";
							}
						}
						mysqli_free_result($result);
						mysqli_close($conn);
					?>
				</div>
			</div>
			<div id="footer">
				Copyright &copy; 2016. computech inc.
			</div>
		</div>
</body>
</html>
