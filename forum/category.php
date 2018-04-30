<?php include $_SERVER['DOCUMENT_ROOT'] . "/forum/header.php"; ?>
<h1 class="header">Forum</h1>
<div class="wrapper">
<?php
//first select the category based on $_GET['cat_id']
    echo '<div id="bread">
			<ul>
				<li class="active-bread"><a href="#">Topics</a></li>
				<li><a href="index.php">Forum</a></li>
			</ul>
		  </div>';

echo '<div class="content">';


$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            forum_categories
        WHERE
            cat_id = " . mysqli_real_escape_string($conn, $_GET['cat_id']);

$result = mysqli_query($conn, $sql) or die(mysqli_error());

if(!$result)
{
    echo 'The category could not be displayed, please try again later.' . mysqli_error($conn);
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'This category does not exist.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<h2 class="header2">Topics in ′' . $row['cat_name'] . '′ category</h2>';
        }

        //do a query for the topics
        $sql = "SELECT  
                    topic_id,
                    topic_subject,
                    topic_date,
                    topic_cat
                FROM
                    forum_topics
                WHERE
                    topic_cat = " . mysqli_real_escape_string($conn, $_GET['cat_id']);

        $result = mysqli_query($conn,$sql);

        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'There are no topics in this category yet.';
            }
            else
            {
                //prepare the table
                echo '<table class="ftable" border="1">
                      <tr>
                        <th>Topic</th>
                        <th>Posts</th>
                        <th>Created at</th>
                      </tr>';

                while($row = mysqli_fetch_assoc($result))
                {
                    $querystring = "
                    select count(forum_posts.post_id) as cnt from forum_posts
                      inner join forum_topics on forum_topics.topic_id=forum_posts.post_topic
                      where forum_topics.topic_subject like '". $row['topic_subject'] . "';";
                    $count_cat_query = mysqli_query($conn, $querystring) or die(mysqli_error($conn));
                    $post_cnt = mysqli_fetch_array($count_cat_query)['cnt'];
                    ?>
                    <tr>
                        <td class="topic_row">
                            <h3><a href="topic.php?topic_id=<?=$row['topic_id']?>&cat_id=<?=$_GET['cat_id']?>"><?=$row['topic_subject']?></a></h3>
                        </td>
                        <td>
                            <a href="topic.php?topic_id=<?=$row['topic_id']?>&cat_id=<?=$_GET['cat_id']?>"><?=$post_cnt?></a>
                        </td    >
                        <td class="posts_row">
                    <?php echo date('d-m-Y', strtotime($row['topic_date'])); ?>
                        </td>
                    </tr>
<?php
                }
            }
        }
    }
}
?>
    </table>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/forum/footer.php"; ?>


