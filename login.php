<html>
    <head>
        <title>Library Database Login</title>
    </head>
    <body>
        <h2>Admin Panel Login </h2>
        <a href="index.php">Click here to go back</a><br/><br/>
        <form action="login.php" method="POST">
           Enter Username: <input type="text" name="username" required="required" /> <br/>
           Enter password: <input type="password" name="password" required="required" /> <br/>                      
           <input type="submit" value="Login"/>
        </form>
    </body>
</html>
<?php
session_start();
$message="";
if(count($_POST)>0) 
{
	$conn = mysqli_connect("localhost","root","","first_db");
	$result = mysqli_query($conn,"SELECT * FROM users WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
	} 
    else 
    {
		$message = "You are successfully authenticated!";
        $_SESSION['user'] = $_POST["username"];
        header("location: home.php");
        exit();
	}
    echo $message;
    $conn -> close();
}
?>