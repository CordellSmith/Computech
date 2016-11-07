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
	session_start();
?>
<html>
	<head>
		<title>Add Product</title>
		<link rel="stylesheet" type="text/css" href="register_login_style.css"/>
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
					<li><a href="search.php">Search</a></li>
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
					<h3>Add a Product</h3>
					<p>
						<form action="" method="POST">
							<fieldset>
								<legend>Product Information</legend>
								<label for="productid">Product ID:</label><input type ="number" id="productid" name="productid" placeholder="21446" max="99999">
								<br>
								<label for="productname">Product Name:</label><input type ="text" id="productname" name="productname" placeholder="GeForce GTX1080" maxlength="50">
								<br>
								<label for="producttype">Product Type:</label>
									<select id="producttype" name="producttype">
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
								<br>
								<label for="productdescription">Product Description:</label><textarea id="productdescription" name="productdescription" maxlength="255"></textarea>
								<br>
								<label for="price">Price(AUD): $</label><input type ="number" id="price" name="price" placeholder="23.50">
								<br>
								<label for="quantity">Quantity:</label><input type ="number" id="quantity" name="quantity" placeholder="100">
								<br>
								<label for="imageurl">Image URL:</label><input type ="text" id="imageurl" name="imageurl" placeholder="http://www.image.com/case.jpg">
								<br>
								<label for="submit"></label><input type="submit" value="Add Product">
								<br>
								<label for="reset"></label><input type="reset" value="Reset Form">
								
								<?php
									$error="";
									if($_SERVER["REQUEST_METHOD"] == "POST")
									{
										$productid = mysqli_real_escape_string($conn,$_POST['productid']);
										$productname = mysqli_real_escape_string($conn,$_POST['productname']);
										$producttype = mysqli_real_escape_string($conn,$_POST['producttype']);
										$productdescription = mysqli_real_escape_string($conn,$_POST['productdescription']);
										$price = mysqli_real_escape_string($conn,$_POST['price']);
										$quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
										$imageurl = mysqli_real_escape_string($conn,$_POST['imageurl']);	
										
										$flag=0;
										if(empty($productid))
										{
											echo("<br>*no Product ID entred");
											$flag=$flag+1;
										}
										if(empty($productname))
										{
											echo("<br>*no Product Name entred");
											$flag=$flag+1;
										}
										if(empty($producttype))
										{
											echo("<br>*no Product Type entred");
											$flag=$flag+1;
										}
										if(empty($productdescription))
										{
											echo("<br>*no Product Description entred");
											$flag=$flag+1;
										}
										if(empty($price))
										{
											echo("<br>*no Price entred");
											$flag=$flag+1;
										}
										if(empty($quantity))
										{
											echo("<br>*no Quantity entred");
											$flag=$flag+1;
										}
										if(empty($imageurl))
										{
											echo("<br>*no Image URL entred");
											$flag=$flag+1;
										}
										
										if($flag==0)
										{
											mysqli_query($conn, "INSERT INTO products (productID, productName, productType, productDescription, Price, Quantity, Image)
											VALUES('$productid','$productname', '$producttype', '$productdescription', '$price', '$quantity', '$imageurl')");
											
											$error = "You have successfully added the product!";
										}
										else
										{
											$error = "Please go back and fix the errors listed above.";
										}
									}
								?>
								
								<p><font color="red"><?php echo $error; ?></font></p>
							</fieldset>
						</form>
					</p>
				</div>
			</div>
			<div id="footer">
				Copyright &copy; 2016. computech inc.
			</div>
		</div>
	</body>
</html>