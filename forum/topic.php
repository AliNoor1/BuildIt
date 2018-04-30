<?php include $_SERVER['DOCUMENT_ROOT'] . "/forum/header.php"; ?>
<h1 class="header">Forum</h1>
<div class="wrapper">

    <div id="bread">
        <ul>
            <li class="active-bread"><a href="#">Posts</a></li>
            <li><a href="category.php?cat_id=<?= $_GET['cat_id'] ?>">Topics</a></li>
            <li><a href="index.php">Forum</a></li>
        </ul>
    </div>
    <?php
    //first select the category based on $_GET['cat_id']
    $sql = "SELECT
            topic_id,
            topic_subject
        FROM
            forum_topics
        WHERE
            forum_topics.topic_id = '" . mysqli_real_escape_string($conn, $_GET['topic_id']) . ";'";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo 'The category could not be displayed, please try again later.' . mysqli_error($conn);
    } else {
        if (mysqli_num_rows($result) == 0) {
            echo 'This category does not exist.';
        } else {

            //do a query for the topics
            $sql = "SELECT
                    forum_posts.post_topic,
                    forum_posts.post_content,
                    forum_posts.post_date,
                    forum_posts.post_by,
                    forum_posts.post_topic,
                    users.userID,
                    users.username
                FROM
                    forum_posts
                LEFT JOIN
                    users
                ON
                    forum_posts.post_by = users.userID
                WHERE
                    forum_posts.post_topic = " . mysqli_real_escape_string($conn, $_GET['topic_id']) . ";";


            $result = mysqli_query($conn, $sql);

            if (!$result) {
                echo 'This topic could not be displayed, please try again later.';
            } else {
                if (mysqli_num_rows($result) == 0) {
                    echo 'This post does not seem to exists.';
                } else { ?>
                    <table class="ftable">
                        <tr>
                            <th>Post</th>
                            <th>Created at</th>
                            <th>User</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td class="posts_row">
                                    <h3><?= $row['post_content'] ?></h3>
                                </td>
                                <td class="rightpart">
                                    <?php echo date('d-m-Y', strtotime($row['post_date'])); ?>
                                </td>
                                <td class="author_row">
                                    <h3><?= $row['username'] ?></h3>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <div>
                        <form method="post"
                              action="reply.php?topic_id=<?= $_GET['topic_id'] ?>&cat_id=<?= $_GET['cat_id'] ?>">
                            <textarea class="reply" name="reply-content"></textarea>
                            <div>
                                <input class="replyButton" type="submit" value="Submit reply"/>
                            </div>
                        </form>
                    </div>
                    <?php

                }
            }
        }
    }
    ?>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/forum/footer.php"; ?>


