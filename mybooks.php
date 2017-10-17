<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <title>Book store</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"
  </head>
  <body>
    <div id="pagecontainer">
      <?php include ("header.php"); ?>
      
      <main>
        <div id="list_book">


<h3>Search your book</h3>
            <hr>
            <p>By title:<br></p>
            <form action="browse.php" method="GET">
                <table  cellpadding="6">
                    <tbody>
                        <tr>
                            <td>Title:</td>
                            <td><INPUT type="text" name="searchtitle"></td>
                        </tr>
                        <tr>
                            <td>Author:</td>
                            <td><INPUT type="text" name="searchauthor"></td>
                            <td><INPUT type="submit" name="submit" value="Submit"></td>
                        </tr>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </form>


<?php
# This is the mysqli version

$searchtitle = "";
$searchauthor = "";

if (isset($_POST) && !empty($_POST)) {
# Get data from form
    $searchtitle = trim($_POST['searchtitle']);
    $searchauthor = trim($_POST['searchauthor']);
}

//  if (!$searchtitle && !$searchauthor) {
//    echo "You must specify either a title or an author";
//    exit();
//  }

$searchtitle = addslashes($searchtitle);
$searchauthor = addslashes($searchauthor);

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

# Build the query. Users are allowed to search on title, author, or both

$query = " select title, author, reserved, isbn from book where reserved is true";
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " and title like '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " and author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " and title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; // unfinished
}

//echo "Running the query: $query <br/>"; # For debugging


  # Here's the query using an associative array for the results
//$result = $db->query($query);
//echo "<p> $result->num_rows matching books found </p>";
//echo "<table border=1>";
//while($row = $result->fetch_assoc()) {
//echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
//}
//echo "</table>";
 

# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    $stmt->bind_result($title, $author, $reserved, $isbn);
    $stmt->execute();
    
//    $stmt2 = $db->prepare("update onloan set 0 where bookid like ". $bookid);
//    $stmt2->bind_result($onloan, $bookid);
    

    echo '<table bgcolor="dddddd" cellpadding="6">';
    echo '<tr><b><td>BookID</td><b> <td>Title</td> <td>Author</td> <td>Reserved?</td> </b> <td>Return</td> </b></tr>';
    while ($stmt->fetch()) {
        if($reserved==1)
            $reserved="Yes";
       
        echo "<tr>";
        echo "<td> $isbn </td><td> $title </td><td> $author </td><td> $reserved </td>";
        echo '<td><a href="returnBook.php?isbn=' . urlencode($isbn) . '">Return</a></td>';
        echo "</tr>";
        
    }
    echo "</table>";



    




    

    ?>
      </main>
      <footer>
        <?php include 'footer.php'; ?>
      </footer>
    </div> <!-- end pagecontainer -->
  </body>
</html>