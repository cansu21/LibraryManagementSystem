<html>
    <head>
        <title>LBMS Homepage</title>
    </head>
    <?php
    session_start(); //starts the session
    if($_SESSION['user']){ // checks if the user is logged in  
    }
    else{
        header("location: index.php"); // redirects if user is not logged in
    }
    $user = $_SESSION['user']; //assigns user value
    ?>
    <body>
        <h2>Admin Panel Search Results</h2>
        <p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
        <a href="logout.php">Click here to go logout</a><br/><br/>
        <a href="home.php">Click here to go homepage</a><br/><br/>
        </form>
    	<h2 align="center">Books</h2>
        <form action="search.php" method="GET">
            <input id="search" name="search" type="text" placeholder="Type here">
            
            <label for="">Search on:</label>
                <select id="WRT" name="WRT">
                <option value="ISBN">ISBN</option>
                <option value="title">Title</option>
                <option value="author">Author</option>
                <option value="location">Location</option>
                </select>
            <input id="submit" type="submit" value="Search">
        </form>       
        
    	<table border="1px" width="100%">
		<tr>
			<th>ISBN</th>
			<th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Availability</th>
            <th>Location</th>
            <th>Languages</th>
            <th>Edit</th>
            <th>Delete</th>
		</tr>
         <?php
        if(count($_GET)>0) 
        {
            $conn = new mysqli("localhost", "root", "", "cs306-project");
            $search = $_GET['search'];
            $WRT = $_GET['WRT'];
            if ($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
       
            $query = "SELECT * FROM book WHERE $WRT = '$search'";
            $result = $conn->query($query);
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
               Print '<td align="center"><a href="edit.php?ISBN='. $row['ISBN'] .'">edit</a></td>';
               Print '<td align="center"><a href="delete.php?ISBN='. $row['ISBN'].'">delete</a> </td>';
                Print "</tr>";
            }
            $conn->close();
        }
?>
		</table>
	</body>
</html>



