<?php include $_SERVER['DOCUMENT_ROOT']."/scripts/base.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<link href="/css/BuildIT_style.css" type="text/css" rel="stylesheet">
        <link href="/css/navbar.css" type="text/css" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    </head>

	<title>Search Results</title>

	<body>
		<!-- HEADER -->
		<div class= "topContainer">
			<!-- NAVIGATION BAR -->
			<?php include $_SERVER['DOCUMENT_ROOT']."/common/navbar.php";?>
		</div>
        <h1 style="margin-left: 4%;">Search Results</h1>
        <hr style="margin-left: 3%; margin-right: 55%;">
        <div class="search-results">
            <?php include $_SERVER['DOCUMENT_ROOT']."/scripts/search.php";?>
        </div>

	</body>
</html>
