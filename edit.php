<html>
    <head>
        <title>LDMS Edit Page</title>
    </head>
    <?php
    session_start();       //starts the session
    if($_SESSION['user']){ // checks if the user is logged in  
    }
    else{
        header("location: index.php"); // redirects if user is not logged in
    }
    $user = $_SESSION['user'];
    ?>
    <body>
        <h2>Admin Panel Edit Page</h2>
        <p>Hello <?php Print "$user"?>!</p> <!--Display's user name-->
        <a href="logout.php">Click here to go logout</a><br/><br/>
        <a href="home.php">Return to home page</a>
        <h2 align="center">Currently Selected Book</h2>
        <table border="1px" width="100%">
	    	<tr>
			<th>ISBN</th>
			<th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Availability</th>
            <th>Location</th>
            <th>Languages</th>
		    </tr>
             <?php
                $mysqli = new mysqli("localhost","root","","CS306-project");
                if ($mysqli -> connect_errno) {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                    exit();
                }
                $ISBN = $_GET['ISBN'];
                $query = "SELECT * FROM book WHERE ISBN='$ISBN'";
                $result = $mysqli -> query($query);
                while($row = mysqli_fetch_array($result))
                {
                    Print "<tr>";
                    Print '<td align="center">'. $row['ISBN'] . "</td>";
                    Print '<td align="center">'. $row['Title'] . "</td>";
                    Print '<td align="center">'. $row['Author'] . "</td>";
                    Print '<td align="center">'. $row['Genre'] . "</td>";
                    Print '<td align="center">'. $row['Availability'] . "</td>";
                    Print '<td align="center">'. $row['Location'] . "</td>";
                    Print '<td align="center">'. $row['Languages'] . "</td>";
                    Print "</tr>";
                }
                $mysqli -> close();
             ?>
         </table>
         <br/>
         <p>Enter the new attributes of the book</p>
         <br/>
         <form action="edit.php" method="POST">
           Enter new ISBN: <input type="text" name="ISBN" required="required" /> <br/>
           Enter new Title: <input type="text" name="title" required="required" /> <br/>
           Enter new Author: <input type="text" name="author" required="required" /> <br/>
           Enter new Genre: <input type="text" name="genre" required="required" /> <br/>
           Enter new Availability: <input type="text" name="availability" required="required" /> <br/>
           Enter new Location: <input type="text" name="location" required="required" /> <br/>
           Enter new Languages: <input type="text" name="languages" required="required" /> <br/>
            <input type="submit" value="Update the book"/>   
    </body>
</html>
<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$conn = new mysqli("localhost", "root", "", "CS306-project");
        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        $ISBN = $_POST['ISBN'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $availability = $_POST['availability'];
        $location = $_POST['location'];
        $languages = $_POST['languages'];
		$conn -> query("UPDATE book SET title ='$title', author ='$author',genre ='$genre',availability ='$availability',location ='$location',languages ='$languages' WHERE ISBN='$ISBN'");
		header("location: home.php");
        $conn -> close();
	}    
?>


