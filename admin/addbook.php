<?php
include("config.php");
$title = "Add new book";
include("header.php");
?>

<?php
if (isset($_POST['newbooktitle'])) {
    // This is the postback so add the book to the database
    # Get data from form
    $newbooktitle = trim($_POST['newbooktitle']);
    $newbookauthor = trim($_POST['newbookauthor']);
    $newbookisbn = trim($_POST['newbookisbn']);

    if (!$newbooktitle || !$newbookauthor || !$newbookisbn) {
        printf("You must specify both a title, an author and ISBN");
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    $newbooktitle = addslashes($newbooktitle);
    $newbookauthor = addslashes($newbookauthor);
    $newbookisbn = addslashes($newbookisbn);

    # Open the database using the "librarian" account
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=main.php>Return to home page </a>");
        exit();
    }

    // Prepare an insert statement and execute it
    $stmt = $db->prepare("insert into Book(isbn, title, author) values (?, ?, ?)");
    $stmt->bind_param('iss', $newbookisbn, $newbooktitle, $newbookauthor );
    $stmt->execute();
    printf("<br>Book Added!");
    printf("<br><a href=main.php>Return to home page </a>");
    exit;
}

// Not a postback, so present the book entry form
?>

<h3>Add a new book</h3>
<hr>
You must enter both a title and an author and other stuff you have in the database....
<form action="addbook.php" method="POST">
    <table bgcolor="#bdc0ff" cellpadding="6">
        <tbody>
            <tr>
                <td>Title:</td>
                <td><INPUT type="text" name="newbooktitle"></td>
            </tr>
            <tr>
                <td>Author:</td>
                <td><INPUT type="text" name="newbookauthor"></td>
            </tr>
            <tr>
                <td>ISBN:</td>
                <td><INPUT type="text" name="newbookisbn"></td>
            </tr>
                <td></td>
                <td><INPUT type="submit" name="submit" value="Add Book"></td>
            </tr>
        </tbody>
    </table>
</form>
<?php include("../footer.php"); ?>