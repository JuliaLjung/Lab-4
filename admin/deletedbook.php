
<?php
include("header.php");
?>
<h3>Book List</h3>
<hr>
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

$searchtitle = htmlentities($searchtitle);
$searchauthor = htmlentities($searchauthor);


# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

# Build the query. Users are allowed to search on title, author, or both

$query = " select isbn, title, author, reserved from Book";


//echo "Running the query: $query <br/>"; # For debugging

/*
  # Here's the query using an associative array for the results
  $result = $db->query($query);
  echo "<p> $result->num_rows matching books found </p>";
  echo "<table border=1>";
  while($row = $result->fetch_assoc()) {
  echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
  }
  echo "</table>";
 */

# Here's the query using bound result parameters
// echo "we are now using bound result parameters <br/>";
$stmt = $db->prepare($query);
$stmt->bind_result($isbn, $title, $author, $reserved);
$stmt->execute();

echo '<table bgcolor="dddddd" cellpadding="6">';
echo '<tr><b><td>ID</td><td>Title</td> <td>Author</td><td>Reserved</td><td>Delete</td> </b> </tr>';
while ($stmt->fetch()) {
  if($reserved == 0)
    $reserved='NO';
  else $reserved='YES';

    echo "<tr>";
    echo "<td> $isbn </td><td> $title </td><td> $author </td><td> $reserved </td>";
    echo '<td><a href="deletebook.php?isbn=' .
    urlencode($isbn) . '"> Delete </a></td>';
    echo "</tr>";
}
echo "</table>";




?>