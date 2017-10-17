<!DOCTYPE html>
<body>
  <?php include 'config.php'; ?>
  	<div id="pagecontainer">
  		<header>
        <ul class="top_menu">
          <li>
            <a class="<?php echo $current_page =='login.php' ? 'active' : NULL?>" 
                href="login.php">LOG IN</a>
          </li>

        </ul>
  			<h1> BOOK STORE </h1>
  			<nav class="main_menu">
  				<ul>
  					<li>
              <a class="<?php echo ($current_page =='index.php'||$current_page=="") ? 'active' : NULL?>" 
                href="index.php">HOME</a>
            </li>
  					<li>
              <a class="<?php echo $current_page =='aboutus.php' ? 'active' : NULL?>" 
                href="aboutus.php">ABOUT US</a>
            </li>
  					<li>
              <a class="<?php echo $current_page =='browse.php' ? 'active' : NULL?>" 
                href="browse.php">BROWSE BOOKS</a></li>
  					<li>
              <a class="<?php echo $current_page =='mybooks.php' ? 'active' : NULL?>" 
                href="mybooks.php">MY BOOKS</a></li>
            <li>
              <a class="<?php echo $current_page =='gallery.php' ? 'active' : NULL?>" 
                href="gallery.php">GALLERY</a></li>
  					<li>
              <a class="<?php echo $current_page =='contact.php' ? 'active' : NULL?>" 
                href="contact.php">CONTACT</a></li>
  				</ul>
  			</nav>
  		</header>