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
        <h2>Admin Panel Homepage</h2>
        <p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
        <a href="logout.php">Click here to Log Out</a><br/><br/>
    	<h2 align="center">Books</h2>
        <form action="search.php" method="GET">
            <input id="search" name="search" type="text" placeholder="Type here to search">
            
            <label for="">Search on:</label>
                <select id="WRT" name="WRT">
                <option value="ISBN">ISBN</option>
                <option value="title">Title</option>
                <option value="author">Author</option>
                <option value="location">Location</option>
                </select>
            <input id="submit" type="submit" value="Search">
            <a href = "add.php" method = "GET">Click here to insert a book</p></a>
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
            
            $mysqli = new mysqli("localhost","root","","cs306-project");
            if ($mysqli -> connect_errno) {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                    exit();
            }               
            $query = $mysqli -> query("SELECT * FROM book");                  // SQL Query
            while($row = mysqli_fetch_array($query))
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
            $mysqli -> close();
        ?>
		</table>
        <h2 align="center">Readers</h2>
        <form action="search.php" method="GET">
            <input id="search" name="search" type="text" placeholder="Type here to search">
            
            <label for="">Search on:</label>
                <select id="WRT" name="WRT">
                <option value="rID">ID</option>
                <option value="reader_name">Name</option>
                <option value="phone_number">Phone Number</option>
                <option value="address">Address</option>
                </select>
            <input id="submit" type="submit" value="Search">
            <a href = "add.php" method = "GET">Click here to insert a reader</p></a>
        </form>  
        <table border="1px" width="100%">
		<tr>
			<th>ID</th>
			<th>Reader Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Penalty Date</th>
            <th>Edit</th>
            <th>Delete</th>
		</tr>
         <?php
            
            $mysqli = new mysqli("localhost","root","","cs306-project");
            if ($mysqli -> connect_errno) {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                    exit();
            }               
            $query = $mysqli -> query("SELECT * FROM reader");                  // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                Print "<tr>";
                    Print '<td align="center">'. $row['rID'] . "</td>";
                    Print '<td align="center">'. $row['reader_name'] . "</td>";
                    Print '<td align="center">'. $row['phone_number'] . "</td>";
                    Print '<td align="center">'. $row['address'] . "</td>";
                    Print '<td align="center">'. $row['penalty_date'] . "</td>";
                    Print '<td align="center"><a href="edit.php?rID='. $row['rID'] .'">edit</a></td>';
                    Print '<td align="center"><a href="delete.php?rID='. $row['rID'].'">delete</a> </td>';
		        Print "</tr>";
            }
            $mysqli -> close();
        ?>
		</table>
        <h2 align="center">Publishers</h2>
        <form action="search.php" method="GET">
            <input id="search" name="search" type="text" placeholder="Type here to search">
            
            <label for="">Search on:</label>
                <select id="WRT" name="WRT">
                <option value="pID">ID</option>
                <option value="publisher_name">Name</option>
                <option value="published_year">Published Year</option>
                <option value="published_location">Published Location</option>
                </select>
            <input id="submit" type="submit" value="Search">
            <a href = "add.php" method = "GET">Click here to insert a publisher</p></a>
        </form>
        <table border="1px" width="100%">
		<tr>
			<th>ID</th>
			<th>Publisher Name</th>
            <th>Published Year</th>
            <th>Published Location</th>
            <th>Edit</th>
            <th>Delete</th>
		</tr>
         <?php
            
            $mysqli = new mysqli("localhost","root","","cs306-project");
            if ($mysqli -> connect_errno) {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                    exit();
            }               
            $query = $mysqli -> query("SELECT * FROM publisher");                  // SQL Query
            while($row = mysqli_fetch_array($query))
            {
                Print "<tr>";
                    Print '<td align="center">'. $row['pID'] . "</td>";
                    Print '<td align="center">'. $row['publisher_name'] . "</td>";
                    Print '<td align="center">'. $row['published_year'] . "</td>";
                    Print '<td align="center">'. $row['published_location'] . "</td>";
                    Print '<td align="center"><a href="edit.php?rID='. $row['pID'] .'">edit</a></td>';
                    Print '<td align="center"><a href="delete.php?rID='. $row['pID'].'">delete</a> </td>';
		        Print "</tr>";
            }
            $mysqli -> close();
        ?>
		</table>

	</body>
</html>