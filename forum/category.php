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
//first select the category based on $_GET['cat_id']
$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            forum_categories
        WHERE
            cat_id = " . mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, $sql);

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
            echo '<h2>Topics in ′' . $row['cat_name'] . '′ category</h2>';
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
                    topic_cat = " . mysqli_real_escape_string($conn, $_GET['id']);

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
                echo '<table border="1">
                      <tr>
                        <th>Topic</th>
                        <th>Created at</th>
                      </tr>';

                while($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <tr>
                        <td class="leftpart">
                            <h3><a href="topic.php?id=<?=$row['topic_id']?>"><?=$row['topic_subject']?></a></h3>
                        </td>
                        <td class="rightpart">
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

</body>
</html>

