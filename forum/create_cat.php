<?php include $_SERVER['DOCUMENT_ROOT'] . "/scripts/base.php";?>

    <!DOCTYPE html>
    <html>
    <head>
        <link href="/css/BuildIT_Forum_style.css" type="text/css" rel="stylesheet">
        <link href="/css/navbar.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <title>Forum</title>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php";?>

<h1>Forum</h1>

<?php
// check if info has been tried to be posted
if($_SERVER['REQUEST_METHOD'] != 'POST')
{?>
<!--    the form hasn't been posted yet, display it-->
    <form method='post' action=''>
        Category name: <input type='text' name='cat_name' />
        Category description: <textarea name='cat_description' /></textarea>
        <br>
        <input type='submit' value='Add category' />
     </form>;
    <?php
}
else
{
    //the form has been posted, so save it
    $sql = "INSERT INTO forum_categories(cat_name, cat_description)
            VALUES('" . mysqli_real_escape_string($conn, $_POST['cat_name']) . "',
            '". mysqli_real_escape_string($conn,     $_POST['cat_description']) . "')";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        //something went wrong, display the error
        echo 'Error' . mysqli_error($conn);
    }
    else
    {
        echo 'New category successfully added.';
    }
}
?>
</body>
</html>
