<?php
    session_start(); //starts the session
    if($_SESSION['user']){           //checks if user is logged in
    }
    else {
       header("location:index.php"); //redirects if user is not logged in.
    }

    if($_SERVER['REQUEST_METHOD'] == "GET")
    {
       $conn = new mysqli("localhost", "root", "", "cs306-project");
       if ($conn->connect_error){
           die("Connection failed: " . $conn->connect_error);
       }
       $ISBN = $_GET['ISBN'];
       $query = $conn -> query("DELETE FROM book WHERE ISBN='$ISBN'");
       header("location:home.php");
    }
?>