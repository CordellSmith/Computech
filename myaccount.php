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
	include('session.php');
?>
<html>
	<head>
		<title>MyAccount</title>
		<link rel="stylesheet" type="text/css" href="register_login_style.css"/>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>CompuTech</h1>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="all_products.php">Products</a></li>
					<li><a href="search.php">Search</a></li>
					<li style="float:right"><a class="active" href="myaccount.php">MyAccount</a></li>
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
					<h3>My Account <a class="logout" href = "logout.php">LOGOUT</a><br></h3>
					
					<?php
						
						$username = $_SESSION['login_user'];
						
						$query = "SELECT username, firstname, lastname, street, city, country, phonenumber, email, UserType FROM users WHERE username='$username';";
						$result = mysqli_query($conn, $query);
						
						if (!$result)
						{
							print "Error - the query could not be executed";
							var_dump($result);
							exit;
						}
						else
						{
							while ($line = mysqli_fetch_array($result))
							{
								echo "<p>First Name: " . $line['firstname'] . "<br />" . "Last Name: " . $line['lastname'] . "<br />" . "Username: " . $line['username'] . "<br />" . "Street: " . $line['street'] . "<br />" . "City: " . $line['city'] . "<br />" . "Country: " . $line['country'] . "<br />" . "Phone Number: " . $line['phonenumber'] . "<br />" . "Email: " . $line['email'] . "<br />" . "Type of Registration: " . $line['UserType'] . "</p>";
							}
							
							$query = "SELECT UserType FROM users WHERE username='$username';";
							$result = mysqli_query($conn, $query);
							
							$row = mysqli_fetch_array($result);
							
							if($row['UserType']=='Admin')
							{
								echo "Hi Admin<br>";
								?>
									<form>
										<input type="button" value="Add a Product" onclick="add()">
									</form>
									
									<script>
										function add()
										{
											window.location.replace("add.php");
										}
									</script>
								<?php
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
