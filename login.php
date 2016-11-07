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
	
	$error="";

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{

		$myusername = mysqli_real_escape_string($conn,$_POST['username']);
		$mypassword = mysqli_real_escape_string($conn,$_POST['password']); 

		$sql = "SELECT username FROM users WHERE username='$myusername' and password='$mypassword'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];

		$count = mysqli_num_rows($result);
		
		if($count == 1)
		{
			$_SESSION['login_user'] = $myusername;
			header("location: myaccount.php");
		}
		else
		{
			$error="*Your Username or Password was invalid";
		}
	}
?>
<html>
	<head>
		<title>Login Page</title>
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
					<h3>Login</h3>
					<p>
						<form action="" method="POST">
							<fieldset>
								<legend>Login Information</legend>
								<label for="username">Username:</label><input type ="text" id="username" name="username" placeholder="j.doe" maxlength="12">
								<br>
								<label for="password">Password:</label><input type ="password" id="password" name="password" placeholder="Password23" maxlength="20">
								<br>
								<label for="submit"></label><input type="submit" value="Login">
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
