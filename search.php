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
		<title>Search Page</title>
		<link rel="stylesheet" type="text/css" href="style1.css"/>
		<link rel="stylesheet" type="text/css" href="searchStyles.css"/>
		<link rel="javascript" type="text/javascript" src="searchScript.js"/>
		<link rel="stylesheet" type="text/css" href="products.css"/>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>CompuTech</h1>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="all_products.php">Products</a></li>
					<li><a class="active" href="search.php">Search</a></li>
					<li style="float:right"><a href="myaccount.php">MyAccount</a></li>
					<li style="float:right"><a href="register.html">Register</a></li>
				</ul>
			</div>
			<div id="content">
				<div id="nav">
					<h2>Categories</h2>
					<ul class="img-list">
						<li><a href="categories/case.php">
							<span class="cat_li">TOWERS</span>
							<img src="logos/case.png" alt="Towers"></a>
						</li>
						<li><a href="categories/motherboard.php">
							<span class="cat_li">MOTHERBOARD</span>
							<img src="logos/mboard.png" alt="Motherboard"></a>
						</li>
						<li><a href="categories/cpu.php">
							<span class="cat_li">CPU</span>
							<img src="logos/cpu.png" alt="CPU"></a>
						</li>
						<li><a href="categories/ram.php">
							<span class="cat_li">RAM</span>
							<img src="logos/ram.png" alt="RAM"></a>
						</li>
						<li><a href="categories/gpu.php">
							<span class="cat_li">GPU</span>
							<img src="logos/gpu.png" alt="Graphics"></a>
						</li>
						<li><a href="categories/hdd.php">
							<span class="cat_li">STORAGE</span>
							<img src="logos/hdd.png" alt="HDD"></a>
						</li>
						<li><a href="categories/monitor.php">
							<span class="cat_li">DISPLAY</span>
							<img src="logos/monitor.png" alt="Monitors"></a>
						</li>
						<li><a href="categories/software.php">
							<span class="cat_li">SOFTWARE</span>
							<img src="logos/software.png" alt="Software"></a>
						</li>
						<li><a href="categories/accessories.php">
							<span class="cat_li">ACCESSORIES</span>
							<img src="logos/accessories.png" alt="Accessories"></a>
						</li>
					</ul>
				</div>
				<div id="main">
					<h3>Keyword Search</h3>
					<div class="search_div">
						<div class="keyword_search">
							<form class="keyword_form" method="POST" action="search.php" name="keyword_form">
								<p style="margin-bottom: 0px;"">
									<label>Keyword: <input type="text" id="searchBox" name="searchBox" /><br /></label>
								</p>
								<button type="submit" id="submit" name="submit">Submit</button>
								<button type="reset" id="reset" name="reset">Reset </button>
							</form>
						</div>
						<h3 style="margin-top: 10px;">OR</h3>
						<h3 style="margin-top: 10px;">Category Search</h3>
						<div class="category_search">
							<form class="dd_form" method="POST" action="search.php" name="dd_form">
								<div class="dropdown">
									<select name="dd_category">
										<option value="nothing">-----</option>
										<option value="Cases">Cases</option>
										<option value="Motherboards">Motherboards</option>
										<option value="CPU">CPU</option>
										<option value="RAM">Memory(RAM)</option>
										<option value="GPU">GPU</option>
										<option value="Storage">Storage</option>
										<option value="Monitors">Display</option>
										<option value="Software">Software</option>
										<option value="Accessories">Accessories</option>
									</select>
									<button type="submit" id="cat_find" name="cat_find">GO</button>
								</div>
							</form>
						</div>
					</div>
										<?php
						if (isset($_POST['searchBox']))
						{
							$input = $_POST['searchBox'];
							trim($input);
							$query = "SELECT productID, productName, productType, productDescription, Price, Quantity, Image FROM products WHERE (productType LIKE '$input%') OR  (productDescription LIKE '$input%');";
							$result = mysqli_query($conn, $query);
							
							if (!$result)
							{
								print "Error - the query could not be executed";
								$error = mysqli_error();
								print "<p>" . $error . "</p>";
								exit;
							}else 
							{
								if (mysqli_fetch_array($result))
								{
									print "<div class=\"results_div\">";
									
									while($line = mysqli_fetch_array($result))
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
								else 
								{
									print "<p>There Are No Results that match your Search Item</p>";
								}
							}
						}
						if(isset($_POST['dd_category']))
						{
							$cat = $_POST['dd_category'];
							//var_dump($cat);
							$query = "SELECT productID, productName, productType, productDescription, Price, Quantity, Image FROM products WHERE (productType LIKE '$cat%');";
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
						}
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
