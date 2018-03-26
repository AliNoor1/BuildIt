<?php include $_SERVER['DOCUMENT_ROOT'] . "/forum/header.php"; ?>

<h1>Forum</h1>

<?php
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //someone is calling the file directly, which we don't want
    echo 'You have reached this page my mistake.';
}
else
{
    //check for sign in status
    if(empty($_SESSION['LoggedIn']))
    {
        echo 'You must be signed in to post a reply.';
    }
    else
    {
        //a real user posted a real reply
        $sql = "INSERT INTO 
                    forum_posts(post_content,
                          post_date,
                          post_topic,
                          post_by) 
                VALUES ('" . $_POST['reply-content'] . "',
                        NOW(),
                        " . mysqli_real_escape_string($conn, $_GET['id']) . ",
                        " . $_SESSION['userid'] . ")";

        $result = mysqli_query($conn, $sql);

        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later.';
        }
        else
        {
            echo 'Your reply has been saved, check out <a href="topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
        }
    }
}
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/forum/footer.php"; ?>

