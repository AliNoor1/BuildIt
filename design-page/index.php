<?php include $_SERVER['DOCUMENT_ROOT']."/scripts/base.php"; ?>
<!DOCTYPE html>
<html>
	
	<head>
        <link href="/css/navbar.css" type="text/css" rel="stylesheet">
		<link href="BuildIT_Design_Page_style.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- SCRIPT FOR FOLLOWING A LINK TO THE DIMENSIONS OPTION, LITERALLY COPIED AND PASTED THIS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
			// Add smooth scrolling to all links
			$("a").on('click', function(event) {

			// Make sure this.hash has a value before overriding default behavior
				if (this.hash !== "") {
			// Prevent default anchor click behavior
					event.preventDefault();

					// Store hash
					var hash = this.hash;

					// Using jQuery's animate() method to add smooth page scroll
					// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
					$('html, body').animate({
						scrollTop: $(hash).offset().top
					}, 800, function(){
   
				// Add hash (#) to URL when done scrolling (default click behavior)
					window.location.hash = hash;
				});
			} // End if
			});
			});
		</script>
	</head>

	<title>Design</title>
	
	<body>

    <!-- NAVIGATION BAR -->
    <?php include $_SERVER['DOCUMENT_ROOT']."/common/navbar.php";?>

	<!-- MAIN CONTAINER -->
	<div class="parent">
		
		<!-- LEFT SIDE DIVS -->
		<div class="designLeft">
		
			<h1>Foundation</h1>
			
			<!-- PARENT TO CONTAIN ALL THE FOUNDATION DESIGN DIVS -->
				<div class="foundationDesigns"><a href="#dimensions"><img src="http://shedconstructionplans.com/images/10x10-storage-shed-plans-blueprints/10x10-storage-shed-plans-01-foundation-plan.jpg"></img></a></div>
				<div class="foundationDesigns"><a href="#dimensions"><img src="http://www.howtospecialist.com/wp-content/uploads/2012/11/Building-the-floor-of-the-shed-1024x584.jpg"></img></a></div>
				<div class="foundationDesigns"><a href="#dimensions"><img src="http://shedconstructionplans.com/images/12x16-gambrel-shed-plans-blueprints/12x16-gambrel-shed-plans-05-concrete-foundation.jpg"></img></a></div>
				<div class="foundationDesigns"><a href="#dimensions"><img src="http://shedconstructionplans.com/images/12x16-gambrel-shed-plans-blueprints/12x16-gambrel-shed-plans-06-floor-frame.jpg"></img></a></div>
				<div class="foundationDesigns"><a href="#dimensions"><img src="https://i.pinimg.com/736x/90/1a/52/901a5255adcc4a6f7778f7f1e182bcdf.jpg"></img></a></div>
			</div>
			
			<!-- DIMENSIONS CONTAINER -->
			<div id="dimensions">
				
				<h1>Dimensions</h1>
			
			</div>
		
		</div>
		
		<!-- ESTIMATE BAR -->
		<div class="estimateChart">
		
			<h1>Estimate</h1>
		
		</div>
	
	</div>


	</body>	
</html>