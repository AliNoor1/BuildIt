<?php include $_SERVER['DOCUMENT_ROOT'] . "/scripts/base.php"; ?>
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
<div class="topContainer">
    <!-- NAVIGATION BAR -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php"; ?>
</div>

<div class="searchContainer">

    <h1 class="searchHeader">Search Results</h1>
    <div class="search-results">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/scripts/search.php"; ?>
    </div>

</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/common/footer.php"; ?>

</body>
</html>
