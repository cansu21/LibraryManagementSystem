<html>
	<head>
		<title>Library Database Registration</title>
	</head>
	<body>
		<h2>Registration Page</h2>
		<a href="index.php">Click here to go back</a><br/><br/>
		<form action="register.php" method="post">
			Enter Username: <input type="text" name="username" required="required"/> <br/>
			Enter Password: <input type="password" name="password" required="required" /> <br/>
			<input type="submit" value="Register"/>
		</form>
	</body>
</html>

<?php
$mysqli = new mysqli("localhost","root","","first_db");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Escape special characters, if any
$firstname = $mysqli -> real_escape_string($_POST['username']);
$lastname = $mysqli -> real_escape_string($_POST['password']);
//$age = $mysqli -> real_escape_string($_POST['age']);

$sql="INSERT INTO users VALUES ('$firstname', '$lastname')";

if (!$mysqli -> query($sql)) {
  printf("%d Row inserted.\n", $mysqli->affected_rows);
}

$mysqli -> close();
?>