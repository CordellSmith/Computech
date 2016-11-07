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
		<title>Registered</title>
		<link rel="stylesheet" type="text/css" href="style1.css"/>
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
					<li style="float:right"><a href="myaccount.php">MyAccount</a></li>
					<li style="float:right"><a class="active" href="register.html">Register</a></li>
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
					<h3>Thank You<br></h3>
					
					<?php
						$user = 	$_POST[ "username" ];
						$pw = 		$_POST[ "password" ];
						$fname = 	$_POST[ "firstname" ];
						$lname = 	$_POST[ "lastname" ];
						$st = 		$_POST[ "street" ];
						$cty = 		$_POST[ "city" ];
						$cntry = 	$_POST[ "country" ];
						$ph = 		$_POST[ "phonenumber" ];
						$eml = 		$_POST[ "email" ];
						
						$flag=0;
						if(empty($user))
						{
							echo("<br>*no username entred<br>");
							$flag=$flag+1;
						}
						if(empty($pw))
						{
							echo("*no password entred<br>");
							$flag=$flag+1;
						}
						if(empty($fname))
						{
							echo("*no first name entred<br>");
							$flag=$flag+1;
						}
						if(empty($lname))
						{
							echo("*no lastname entred<br>");
							$flag=$flag+1;
						}
						if(empty($st))
						{
							echo("*no street entred<br>");
							$flag=$flag+1;
						}
						if(empty($cty))
						{
							echo("*no city entred<br>");
							$flag=$flag+1;
						}
						if(empty($cntry))
						{
							echo("*no country entred<br>");
							$flag=$flag+1;
						}
						if(empty($ph))
						{
							echo("*no phone entred<br>");
							$flag=$flag+1;
						}
						if(empty($eml))
						{
							echo("*no email entred<br>");
							$flag=$flag+1;
						}
						
						if($flag==0)
						{
							mysqli_query($conn, "INSERT INTO users (username, password, firstname, lastname, street, city, country, phonenumber, email) 
							VALUES('$user', '$pw', '$fname', '$lname', '$st', '$cty', '$cntry', '$ph', '$eml')");
							
							echo("<br>You are now registered with CompuTech!");
						}
						else
						{
							echo("<br>Please go back and fix the errors listed above.");
						}
						mysqli_close($conn);
					?>
					
					<p></p>
				<p></p>
				</div>
			</div>
			<div id="footer">
				Copyright &copy; 2016. computech inc.
			</div>
		</div>
</body>
</html>
