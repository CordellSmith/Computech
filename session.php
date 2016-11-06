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

	$user_check = $_SESSION['login_user'];

	$ses_sql = mysqli_query($conn, "SELECT username FROM users WHERE username ='$user_check'");

	$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

	$login_session = $row['username'];

	if(!isset($_SESSION['login_user']))
	{
		header("location:login.php");
	}
?>
<html>
	<head>
		<title>Your Session</title>
	</head>
	<body>
	</body>
</html>