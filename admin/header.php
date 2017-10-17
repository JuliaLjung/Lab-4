
<!DOCTYPE html>
  <link href="../css/style.css" rel="stylesheet" type="text/css">
<body>
 <?php include ('config.php'); ?>
  	<div id="pagecontainer">
  		<header>
                <ul class="top_menu">
          <li>
            <a class="<?php echo $current_page =='logout.php' ? 'active' : NULL?>" 
                href="logout.php">LOG OUT</a>
          </li>

        </ul>
       

  			<h1> BOOK STORE </h1>
  			<nav class="main_menu">
  				<ul>
  					<li>
              <a class="<?php echo ($current_page =='index.php'||$current_page=="") ? 'active' : NULL?>" 
                href="main.php">HOME</a>
            </li>
  					<li>
              <a class="<?php echo $current_page =='addbook.php' ? 'active' : NULL?>" 
                href="addbook.php">ADD BOOK</a>
            </li>
  					<li>
              <a class="<?php echo $current_page =='deletebook.php' ? 'active' : NULL?>" 
                href="deletedbook.php">DELETE BOOK</a></li>
  					<li>
              <a class="<?php echo $current_page =='../fileupload.php' ? 'active' : NULL?>" 
                href="../fileupload.php">UPLOAD IMAGE</a></li>
            
  				</ul>
  			</nav>
  		</header>