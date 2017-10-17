<!DOCTYPE html>

<html>
 <?php include 'head.php'; ?>
  <body>
  	<div id="pagecontainer">
  		<?php include ("header.php"); ?>
  		<main>
  			<h2>GALLERY</h2>

  			<!-- Code from github blueimp gallery -->
	  	
	  	<div id="blueimp-gallery" class="blueimp-gallery">
	    	<div class="slides"></div>
	    	<h3 class="title"></h3>
	    	<a class="prev">‹</a>
	    	<a class="next">›</a>
	    	<a class="close">×</a>
	    	<a class="play-pause"></a>
	    	<ol class="indicator"></ol>
		</div>

		<div id="links">
			<div id="border">

		    
      <!-- code from stackoverflow  -->

			<?php
			     $files = glob("uploadedfiles/*.*"); //hämtar från uploadedfiles
			     for ($i=0; $i<count($files); $i++) // forloop counts files and add 1 each time
			      {
			        $image = $files[$i];
			        $supported_file = array(      //support 
			                'gif',
			                'jpg',
			                'jpeg',
			                'png'
			         );

			         $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION)); //returns string lowercase
			         if (in_array($ext, $supported_file)) {
			            // echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
			            echo '<a href="'.$image .'"><img src="'.$image .'" alt="Random image" /></a>'."<br /><br />";
			            } else {
			                continue;
			            }
			          }
			       ?>

		<!-- end code from stackoverflow  -->

			  

			</div> <!-- end links tag  -->

		<script src="js/blueimp-gallery.min.js"></script>

		<script>
		document.getElementById('links').onclick = function (event) {
		    event = event || window.event;
		    var target = event.target || event.srcElement,
		        link = target.src ? target.parentNode : target,
		        options = {index: link, event: event},
		        links = this.getElementsByTagName('a');
		    blueimp.Gallery(links, options);
		};
		</script>

		<!-- End code from github blueimp gallery  -->

		</main>
		<footer>
  		 <?php include "footer.php"; ?>
  		</footer>
  	</div> <!-- end pagecontainer
  </body>
</html>