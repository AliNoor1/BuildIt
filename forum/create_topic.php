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
echo '<h2>Create a topic</h2>';
if($_SESSION['LoggedIn'] == false)
{
    //the user is not signed in
    echo 'Sorry, you have to be <a href="/login/">signed in</a> to create a topic.';
}
else
{
    //the user is signed in
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        //the form hasn't been posted yet, display it
        //retrieve the categories from the database for use in the dropdown
        $sql = "SELECT
            cat_id,
            cat_name,
            cat_description
            FROM
            forum_categories";

        $result = mysqli_query($conn, $sql);

        if(!$result)
        {
            //the query failed, uh-oh :-(
            echo 'Error while selecting from database. Please try again later.';
        }
        else
        {
            if (mysqli_num_rows($result) == 0)
            {
                //there are no categories, so a topic can't be posted
                // TODO - ADD ADMIN USER
                if($_SESSION['LoggedIn'] == 1)
                {
                    echo 'You have not created categories yet.';
                }
                else
                {
                    echo 'Before you can post a topic, you must wait for an admin to create some categories.';
                }
            }
            else
            {

                echo '<form method="post" action="">
                    Subject: <input type="text" name="topic_subject" />
                    Category:';

                    echo '<select name="topic_cat">';
                        while($row = mysqli_fetch_assoc($result))
                        {
                        echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
                        }
                        echo '</select>';

                    echo 'Message: <textarea name="post_content" /></textarea>
                    <input type="submit" value="Create topic" />
                </form>';
            }
        }
    }
            else
            {
            //start the transaction
            $query  = "BEGIN WORK;";
            $result = mysqli_query($conn, $query);

            if(!$result)
            {
                //Damn! the query failed, quit
                echo 'An error occured while creating your topic. Please try again later.';
            }
            else
            {
                //the form has been posted, so save it
                //insert the topic into the topics table first, then we'll save the post into the posts table
                $sql = "INSERT INTO
                        forum_topics(topic_subject,
                        topic_date,
                        topic_cat,
                        topic_by)
                        VALUES('" . mysqli_real_escape_string($conn, $_POST['topic_subject']) . "',
                        NOW(),
                        " . mysqli_real_escape_string($conn, $_POST['topic_cat']) . ",
                        " . $_SESSION['userid'] . "
                        )";

                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    //something went wrong, display the error
                    echo 'An error occured while inserting your data. Please try again later.' . mysqli_error($conn);
                    $sql = "ROLLBACK;";
                    $result = mysqli_query($conn, $sql);
                } else {
                    //the first query worked, now start the second, posts query
                    //retrieve the id of the freshly created topic for usage in the posts query
                    $topicid = mysqli_insert_id($conn);

                    $sql = "INSERT INTO
                    forum_posts(post_content,
                    post_date,
                    post_topic,
                    post_by)
                    VALUES
                    ('" . mysqli_real_escape_string($conn, $_POST['post_content']) . "',
                    NOW(),
                    " . $topicid . ",
                    " . $_SESSION['userid'] . "
                    )";
                    $result = mysqli_query($conn, $sql);

                    if (!$result) {
                        //something went wrong, display the error
                        echo 'An error occured while inserting your post. Please try again later.' . mysqli_error($conn);
                        $sql = "ROLLBACK;";
                        $result = mysqli_query($conn, $sql);
                    } else {
                        $sql = "COMMIT;";
                        $result = mysqli_query($conn, $sql);

                        //after a lot of work, the query succeeded!
                        echo 'You have successfully created <a href="topic.php?id=' . $topicid . '">your new topic</a>.';
                    }
            }
        }
    }
}
?>






</body>
</html>