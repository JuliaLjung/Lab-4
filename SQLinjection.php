<?php

@ $db = new mysqli('localhost', 'root', '', 'book_lab1');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}


if (isset($_POST['username'], $_POST['password'])) {
    #with statement under we're making it SQL Injection-proof
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = sha1($_POST['password']);
    
    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql
    
    echo "SELECT * FROM User WHERE username = '{$username}' AND password = '{$password}'";
    
    $query = ("SELECT * FROM User WHERE username = '{$username}' "."AND password = '{$password}'");
       
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result(); 
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows();
       
    
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        
        if (isset($totalcount)) {
            if ($totalcount == 0) {
                echo '<h2>You got it wrong. Can\'t break in here!</h2>';
            } else {
                echo '<h2>Welcome! Correct password.</h2>';
                echo '<div class="link_upload"><h3> You can upload your images <a href="fileupload.php">here!</a></h3></div>';

               // <p>This is a longer sentence with a <a href=''>short link here</a></p>
            }
        }
        ?>
        <form method="POST" action="">
            <input type="text" placeholder="username" name="username"><br></br>
            <input type="password" placeholder="password" name="password"><br></br>
            <input type="submit" value="Go">
        </form>

    </body>
</html>