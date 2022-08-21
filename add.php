<html>
    <head>
        <title>Insert Book Page</title>
    </head>
<body>
    <h2>Admin Panel Insert Book Page</h2>
    <a href="home.php">Click here to go back</a><br/><br/>
    <form action="add.php" method="POST">
           Enter ISBN: <input type="text" name="ISBN" required="required" /> <br/>
           Enter Title: <input type="text" name="title" required="required" /> <br/>
           Enter Author: <input type="text" name="author" required="required" /> <br/>
           Enter Genre: <input type="text" name="genre" required="required" /> <br/>
           Enter Availability: <input type="text" name="availability" required="required" /> <br/>
           Enter Location: <input type="text" name="location" required="required" /> <br/>
           Enter Languages: <input type="text" name="languages" required="required" /> <br/>
            <input type="submit" value="Add a book to the library"/>
        </form>
      </body>
</html>
<?php
    session_start();
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }

    if(count($_POST)>0) 
    {
       $ISBN = $_POST['ISBN'];
       $title = $_POST['title'];
       $author = $_POST['author'];
       $genre = $_POST['genre'];
       $availability = $_POST['availability'];
       $location = $_POST['location'];
       $languages = $_POST['languages'];
       $conn = new mysqli("localhost", "root", "", "CS306-project");
       if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
       }
       $sql = "INSERT INTO book VALUES ('$ISBN', '$title', '$author','$genre','$availability', '$location','$languages')";
       if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       $conn->close();
       header("location:home.php");
    }
?>