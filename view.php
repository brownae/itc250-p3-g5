<?php 

include './includes/header.php';
require './includes/config.php';

if(isset($_GET['id']) && (int)$_GET['id'] > 0){#proper data must be on querystring
	 $myID = (int)$_GET['id']; #Convert to integer, will equate to zero if fails
}

$sql = 'SELECT * 
        FROM Feed
        WHERE FeedID = :id ;
    ';

$db = db_conn();            //Make Database connection
$sql = $db->prepare($sql);  //Prepare SQL statement
$sql->bindParam(':id', $myID, PDO::PARAM_INT);
$sql->execute();            //Execute SQL
$results = $sql->fetchAll();//Store results
$sql->closeCursor();        //Close the connection for safety

?>

<h3>Test view.php</h3>

<!--RSS URL-->
<!--https://news.google.com/news?cf=all&hl=en&pz=1&ned=' . SUBJECT . '&output=rss-->

<pre>
<?php

//var_dump($_GET); 
//var_dump($results); 

$feed = $results[0];

$now = time();
$last_update_time = strtotime($feed['LastUpdated']);
$age = $now - $last_update_time;
echo "Last download was " . $age . " seconds ago. <br>";

if ($age > 30) {
    // If the saved feed is more than 15 minutes old, download it from Google
    // and write it to the database.
    $subject = str_replace(' ', '+', $feed['Subject']);
    $url = 'https://news.google.com/news?cf=all&hl=en&pz=1&ned=' . $subject  . '&output=rss';
    echo "Cache is too old, downloading from " . $url . '<br>';
    $rss_feed = file_get_contents($url) . "<br>";

    $sql = 'UPDATE Feed
            SET LastUpdated=NOW(),SavedFeed=:feed
            WHERE FeedID = :id';
    $sql = $db->prepare($sql);
    $sql->bindParam(':id', $myID, PDO::PARAM_INT);
    $sql->bindParam(':feed', $rss_feed, PDO::PARAM_STR);
    $sql->execute();
    $sql->closeCursor();
} else {
    // If saved feed is less than 15 minutes old, use the data we have saved
    // in the database.
    $rss_feed = $feed['SavedFeed'];
}

echo $rss_feed;



?>
</pre>

<?php include 'includes/footer.php'; ?>
