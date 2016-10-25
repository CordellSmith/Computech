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
<html>
	<head>
		<title>CompuTech MyAccount</title>
		<link rel="stylesheet" type="text/css" href="style1.css"/>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>CompuTech</h1>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li style="float:right"><a href="login.html">Login</a></li>
					<li style="float:right"><a class="active" href="register.html">Register</a></li>
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
					<h3>My Account<br></h3>
					
					<?php
						$user = 	$_POST[ "username" ];
						$pw = 		$_POST[ "password" ];
			
						mysql_query("")
						
						or die(mysql_error());
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
