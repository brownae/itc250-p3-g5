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
include 'includes/config.php';
// include'NewsStand/RssNews.php';

class RssNews
{
	 public $NewsID = 0;
	 public $FeedXML = "";
	 public $TimeCreated = 0;
	 public $Expire = 0;

	/**
	 * Constructor for Answer class.
	 *
	 * @param integer $NewsID ID number of news feed
	 * @param string $Description Additional description info
	 * @param integer $TimeCreated The current time Created of the answer
	 * @param integer $Expire The current time Created of the answer
	 * @return void
	 * @todo none
	 */
    function __construct($NewsId,$FeedXml,$Time,$Expire)
	{#constructor sets stage by adding data to an instance of the object
		$this->NewsID = (int)$NewsId;
		$this->FeedXML = $FeedXml;
		$this->TimeCreated = $Time;
		$this->Expire = $Expire;
	}#end RssNews() constructor
}#end RssNews class

// $testID = 5;
// $testFeed = "XML content";
// $now = time();

// $news = new RssNews($testID,$testFeed,$now);
//
// var_dump($news);
// die;


$now = time();//current time
$expire = time() + (2 * 60);


$id = $_GET['id'];

$sql = "
  SELECT FeedID, Subject, Description
  FROM Feed
  WHERE FeedID = ".$id.";
";//CLose sql query


$db = db_conn();              //Make db connection
$sql = $db->prepare($sql);    //Prepare SQL statement
$sql->execute();              //Execute SQL
$results = $sql->fetchAll();  //Store results
$sql->closeCursor();          //Close the connection for safety


$subject = $results[0][1];
$subject = strtolower($subject);
$subject = str_replace(' ', '+', $subject);

//THIS IS THE CORNER "NEWS" IMAGE THAT RETURNS YOU TO HOME PAGE.
echo '<div class="banner" id="index">
      <a href="index.php"><img class="corner" src="images/corner-triangle-news.png" alt="News"></a>
      <h1>News Stand</h1>
      </div>
      <div class="view">';


echo "<h2>" . $results[0]['Subject'] . "</h2>";
// echo "<h3>" . $results[0]['Description'] . "</h3>";

//TO DO LIST
//Make class that creates object to hold ID, xml, timestamp, exp time
//create session function if !set then set. if set and older than 15 minutes, then re-assign var to current info.
//


//if session "news" with X id doesn't exist then create it.
if(!isset($_SESSION['news'][$id]) || $now > $_SESSION['news'][$id]->Expire){
	//go to url
	$request = 'http://news.google.com/news?cf=all&hl=en&pz=1&ned=us&q='.$subject. '&output=rss';
	//get info from url and store
	$response = file_get_contents($request);

	//create object and store in Session array with same id as feed id
	$_SESSION['news'][$id] = new RssNews($id,$response,$now,$expire);
}
	//This is either the persisting news var or newly created one.
	$news = $_SESSION['news'][$id];

	// echo "<pre>";
	// var_dump($_SESSION);
	// echo "</pre>";
	//
	// echo "<pre>";
	// var_dump($news->Expire);
	// echo "</pre>";
	// die();


//Echo the time that this feed was cashed at
echo '<p class="right">News Cached at:'.date('h:i:s Y-m-d',$news->TimeCreated).'</p>';

//Take the $news->FeedXML and make it a xml string to parse
$xml = simplexml_load_string($news->FeedXML);
print '<h3>' . $xml->channel->title . '</h3>';

//Loop through each article and render it's data.
foreach($xml->channel->item as $story)
{
  echo '<a class="source" href="' . $story->link . '">' . $story->title . '</a><br />';
  echo '<p>' . $story->description . '</p><br /><br />';
}

echo '</div>';

include 'includes/footer.php';
