<?php
/**
 * view.php is the home page for ITC150 project 3 group 5.
 * This page acts as a switch to further define what subject to read about
 *
 * @package newsstand-News-Aggregator
 * @author Group 5 - Aaron: github -> aebrown9
 * @version 1 2/28/17
 * @link http://www.brownae.com/
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see header_inc.php
 * @see footer_inc.php
 * @todo Link to database and loop through options.
 */
include 'includes/header.php';
include'includes/config.php';



$id = $_GET['id'];

$sql = "
  SELECT FeedID, Subject, Description
  FROM NEWS_Feed
  WHERE FeedID = ".$id.";
";//CLose sql query


$db = db_conn();              //Make db connection
$sql = $db->prepare($sql);    //Prepare SQL statement
$sql->execute();              //Execute SQL
$results = $sql->fetchAll();  //Store results
$sql->closeCursor();          //Close the connection for safety


$subject = $results[0][1];
$subject = strtolower($subject);

echo '<div class="banner" id="index">
      <a href="index.php"><img class="corner" src="images/corner-triangle-news.png" alt="News"></a>
      <h1>News Stand</h1>
      </div>
      <div class="view">';


echo "<h2>" . $results[0]['Subject'] . "</h2>";
// echo "<h3>" . $results[0]['Description'] . "</h3>";


// echo "<pre>";
// var_dump($subject);
// echo "</pre>";
// die();

$request = 'http://news.google.com/news?cf=all&hl=en&pz=1&ned=us&q='.$subject. '&output=rss';
$response = file_get_contents($request);
$xml = simplexml_load_string($response);
print '<h3>' . $xml->channel->title . '</h3>';
foreach($xml->channel->item as $story)
{
  echo '<a class="source" href="' . $story->link . '">' . $story->title . '</a><br />';
  echo '<p>' . $story->description . '</p><br /><br />';
}

echo '</div>';

include 'includes/footer.php';
