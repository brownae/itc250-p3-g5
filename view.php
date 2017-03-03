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
var_dump($_GET); 
var_dump($results); 
$subject = str_replace(' ', '+', $results['Subject']);
$url = 'https:news.google.com/news?cf=all&hl=en&pz=1&ned=' . $subject  . '&output=rss';
echo $url;
?>
</pre>

<?php include 'includes/footer.php'; ?>
