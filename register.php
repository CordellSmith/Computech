<!DOCTYPE html>
<?php
	$servername = "localhost";
	$username = "X32237834";
	$password = "X32237834";
	$dbname = "X32237834";
	
	$connection = mysql_connect("$servername", "$username", "$password");
	mysql_select_db("$dbname");
	
	if ($db -> connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
?>
<title>Register FORM</title>
<html>
	<head>
		<title>CompuTech</title>
		<link rel="stylesheet" type="text/css" href="style1.css"/>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>CompuTech</h1>
			</div>
			<div id="content">
				<div id="nav">
					<h2>Categories</h2>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="register.html">Register</a></li>
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
			
						mysql_query("INSERT INTO users (username, password, firstname, lastname, street, city, country, phonenumber, email) 
						VALUES('$user', '$pw', '$fname', '$lname', '$st', '$cty', '$cntry', '$ph', '$eml')")
						
						or die(mysql_error());
						
						mysql_close($connection);
						
						echo("You are now registered with CompuTech!");
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