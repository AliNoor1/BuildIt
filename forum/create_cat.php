<?php include $_SERVER['DOCUMENT_ROOT'] . "/forum/header.php"; ?>

<h1>Forum</h1>

<?php
// check if info has been tried to be posted
if ($_SESSION['admin']!=1){
    echo "<h2>You are not authorized to view this page.</h2>";
}
else{
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
}
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/forum/footer.php"; ?>

