<!DOCTYPE html>

<html>
  <head>
  <meta charset="UTF-8">
  <title>Book store</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"
  </head>
  <body>
    <div id="pagecontainer">
      
     
      
      <main>
        <h2>UPLOAD FILE</h2>
        



<?php

if(isset($_FILES['upload'])){

   $allowedextensions = array('jpg', 'jpeg', 'gif', 'png');

   $extension = strtolower(substr($_FILES['upload']['name'], strrpos($_FILES['upload']['name'], '.') + 1));

   echo "Your file extension is: ".$extension;

   $error = array ();

    if(in_array($extension, $allowedextensions) === false){
        
        #add a new array entry
        $error[] = 'This is not an image, upload is allowed only for images.';        
    }

    if($_FILES['upload']['size'] > 1000000){
        
        $error[]='The file exceeded the upload limit';
    }
    
    
    #now you do the 'final check' to see if there are no errors in the array.
    #if they array is empty = no errors have been written in it.
    #if there is something in the array 'errors' that means an error has occured and we should not upload
    
    if(empty($error)){

      move_uploaded_file($_FILES['upload']['tmp_name'], "uploadedfiles/{$_FILES['upload']['name']}");

      } 
}


?>


<html>
    <head>
        <title>Security - Upload</title>
           </head>
           
           <body>
            <div>
                   <?php 
                   
                   #Now we want to either upload the file or type an error
                   #what we do is basically  check if there's an array named 'error'
                   #and we check if it's empty. If it's empty that means no errors we found
                   #we should proceed with the upload.
                   if (isset($error)){
                       if (empty($error)){
                           
                           #here we give the user the chance to check the file right away. 
                           #this is just for testing purposes so we can see the file is there
                           #when the user clicks, it will open the folder "uploadedfiles" and look for filename
                           echo '<a href="uploadedfiles/' . $_FILES['upload']['name'] . '">Check file';
                           
                       } else {
                           #else, if there was an error, then it simply goes through the error array
                           #it prints out ALL errors in the array.
                           #you can have one or more errors. 
                           #e.g. File too big, AND not supported!
                           foreach ($error as $err){
                               echo $err;
                           }
                           
                       }
                   }
                   
                   ?>
               </div>
               
               
               <div class="upload_file">
                   
                   <form action="" method="POST" enctype="multipart/form-data">
                       <input type="file" name="upload" /></br>
                       <input  type="submit" value="submit" />
                   </form>                   
               </div>

               </main>
          <footer>
            <?php include "footer.php"; ?>
          </footer>
        </div> <!-- end pagecontainer -->
      </body>
    </html>
          
    
    
    
    
</html>