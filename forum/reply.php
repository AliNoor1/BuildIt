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
                VALUES ('" . mysqli_real_escape_string($conn,$_POST['reply-content']) . "',
                        NOW(),
                        " . mysqli_real_escape_string($conn, $_GET['topic_id']) . ",
                        " . $_SESSION['userid'] . ");";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn) . $sql);

        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later.';
        }
        else
        {?>
            <meta http-equiv="refresh" content="0;/forum/topic.php?topic_id=<?=$_GET['topic_id']?>&cat_id=<?=$_GET['cat_id']?>">
        <?php
        }
    }
}
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/forum/footer.php"; ?>

