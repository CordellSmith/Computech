<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "X32237834";
$password = "X32237834";
$dbname = "X32237834";

$conn = mysql_connect("$servername", "$username", "$password");
mysql_select_db("$dbname");

if (!$conn)
{
	die("Connection failed: " . mysql_error());
}

@mysql_select_db($dbname) OR die ('Error - Could not select the Student database ' . mysql_error());
?>
<html>
<head>
	<title>All Products</title>
	<link rel="stylesheet" type="text/css" href="products.css"/>
	<link rel="stylesheet" type="text/css" href="searchStyles.css"/>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>CompuTech</h1>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="contact.html">Contact</a></li>
				<li><a class="active" href="all_products.php">Products</a></li>
				<li><a href="search.php">Search</a></li>
				<li style="float:right"><a href="login.html">Login</a></li>
				<li style="float:right"><a href="register.html">Register</a></li>
			</ul>
		</div>
		<div id="content">
			<div id="nav">
				<h2>Categories</h2>
				<ul>
					<li><a href="categories/case.php"><span class="cat_li">Cases</span><img src="logos/case.png" alt="Towers"></a></li>
					<li><a href="categories/motherboard.php"><span class="cat_li">Motherboard</span><img src="logos/mboard.png" alt="Motherboard"></a></li>
					<li><a href="categories/cpu.php"><span class="cat_li">CPU</span><img src="logos/cpu.png" alt="CPU"></a></li>
					<li><a href="categories/ram.php"><span class="cat_li">RAM</span><img src="logos/ram.png" alt="RAM"></a></li>
					<li><a href="categories/gpu.php"><span class="cat_li">GPU</span><img src="logos/gpu.png" alt="Graphics"></a></li>
					<li><a href="categories/hdd.php"><span class="cat_li">STORAGE</span><img src="logos/hdd.png" alt="HDD"></a></li>
					<li><a href="categories/monitor.php"><span class="cat_li">DISPLAY</span><img src="logos/monitor.png" alt="Monitors"></a></li>
					<li><a href="categories/software.php"><span class="cat_li">SOFTWARE</span><img src="logos/software.png" alt="Software"></a></li>
					<li><a href="categories/accessories.php"><span class="cat_li">ACCESSORIES</span><img src="logos/accessories.png" alt="Accessories"></a></li>
				</ul>
			</div>
			<div id="main">
				<h3>All Products<br></h3>
				<?php
				$query = "SELECT productName, productType, productDescription, Price, Image FROM products WHERE productType = 'RAM';";


				$result = mysql_query($query);
				if (!$result) {
					print "Error - the query could not be executed";
					$error = mysql_error();
					print "<p>" . $error . "</p>";
					exit;
				}else
				{
					print "<div class=\"results_div\">";
					while ($line = mysql_fetch_array($result))
					{
						print "<div class=\"product_div\">";
						print "<p class=\"searchResults\">Product Name: " . $line['productName'] . "<br />" .
						"Type: " . $line['productType'] . "<br />" .
						"Description: " . $line['productDescription'] . "<br />" .
						"Price: " . $line['Price'] . "</p>";
						$img_link = $line['Image'];	
						print "</div>";
						print "<div class=\"img_div\"><img src=\"$img_link\" alt=\"resultImg\" style=\"width: 200px; height: 100px;\"></div>";	
					}
					print "</div>";
				}

				mysql_free_result($result);
				mysql_close($conn);
				?>
			</div>
		</div>
		<div id="footer">
			Copyright &copy; 2016. computech inc.
		</div>
	</div>
</body>
</html>
