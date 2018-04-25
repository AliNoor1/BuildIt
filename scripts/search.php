<?php
$query = $_GET['query'];
// gets value sent over search form

$min_length = 0;
// you can set minimum length of the query if you want

if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then

    $query = htmlspecialchars($query);
    // changes characters used in html to their equivalents, for example: < to &gt;

    mysqli_real_escape_string($conn,$query);
    // makes sure nobody uses SQL injection

    $sql_query = "SELECT * FROM users
            WHERE (`firstName` LIKE '%".$query."%') OR
             (`lastName` LIKE '%".$query."%')";

    $raw_results = mysqli_query($conn, $sql_query) or die(mysqli_error());

    // * means that it selects all fields, you can also write: `id`, `title`, `text`
    // articles is the name of our table

    // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
    // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
    // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

    if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following

        while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

            echo "<a href='/user/index.php?username=".$results['username'] ."'>".
                "<div class='result'>".
                    "<p class='name'>".$results['firstName']." ".$results['lastName']."</p>".
                    "<p class='location'><i class=\"fa fa-map-marker\"></i> " . $results['city'] . ", " . $results['state'] . "</p>".
                "</div>".
            "</a>";

        }

    }
    else{ // if there is no matching rows do following
        echo "No results";
    }

}
else{ // if query length is less than minimum
    echo "Minimum length is ".$min_length;
}
?>