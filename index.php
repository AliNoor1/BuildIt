<?php include $_SERVER['DOCUMENT_ROOT']."/scripts/base.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<link href="/css/BuildIT_style.css" type="text/css" rel="stylesheet">
       		<link href="/css/navbar.css" type="text/css" rel="stylesheet">
       	 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	</head>

	<title>BuildIT</title>
	
	<body>
		<!-- HEADER -->
		<div id= "topContainer">
		
			<!-- BuildIT Logo/Box -->
			<div class="header">
				<h1>BuildIT</h1>
			</div>
		
			<!-- NAVIGATION BAR -->
			<?php include $_SERVER['DOCUMENT_ROOT']."/common/navbar.php";?>
		</div>
		<!-- FIRST IMAGE ON THE SITE -->
		<div class="secondaryContainer">
			
		<div class= "slideShow">
			<div class="slide"><img class= "imagePreview" src="img/home01.jpg" alt="Shed_img"></div>
			<div class="slide"><img class= "imagePreview" src="img/home04.jpg" alt="Shed_img"></div>
			<div class="slide"><img class= "imagePreview" src="img/home05.jpg" alt="Shed_img"></div>
			<div class="slide"><img class= "imagePreview" src="img/home01.jpg" alt="Shed_img"></div>
			
			<div class="imageTab">
				<div class="shutterOutTab">
				<a href="#">Get Started</a>
				</div>
			</div>
		</div>
		</div>
		
		<div id= "description">
			<h2 id= "desc_header">BuildIT Sets Out A Plan For Anyone, Anywhere</h2>
            <p>Use our design page to start your shed project today. Our algorithm will estimate the base cost of the materials that will go into the structure. This includes the cost of the studs, planks, flooring, exterior sheathing panels, foundation blocks, gravel, nails, and more. There are hundreds of ways of creating a unique shed on our site, with a number of options on changing the height of your structure, to its length and width. We also offer  a variety of windows and doors to accommodate the aesthetics of your shed. Through our diligent work, we continue to add more design options to make the possibilities endless.</p>

        </div>
		
		<!-- SECOND IMAGE ON THE SITE -->
		<div class="secondaryContainer">
			<img class= "imagePreview" src="img/home02.jpg" alt="Contractor_img">
			<div class="imageTab">
				<div class="shutterOutTab">
				<a href="#">Contact Now</a>
				</div>
			</div>
		</div>
		
		<div id= "description">
			<h2 id= "desc_header">Find A Contractor Today</h2>
            <p>Post your design today, and have several contractors and builders contact you. Our contractor page wants to ease the process of finding a local builder. We created an algorithm to sort out the budget, location, and style of shed, to fit the needs on what the contractor is the most proficient at. No need to overpay or underpay on jobs, with our already calculated costs, and a buy-out cost, posted by the user. </p>

        </div>
		
		<!-- THIRD IMAGE ON THE SITE -->
		<div class="secondaryContainer">
			<img class= "imagePreview" src="img/home03.jpg" alt="Community_img">
			<div class="imageTab">
				<div class="shutterOutTab">
				<a href="#">Ask Us</a>
				</div>
			</div>
		</div>
		
		<div id= "description">
			<h2 id= "desc_header">A Community Of Builders</h2>
            <p>Don’t want to post your design for a contractor? You can do it yourself with our help. BuildIT is proud to welcome new builders with our forums page. Ask our community on the procedure required to build a shed in your backyard. We have a number of topics and categories to accommodate your questions. </p>
		
		</div>
        <?php include $_SERVER['DOCUMENT_ROOT']."/common/footer.php";?>
	</body>
</html>
