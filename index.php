<?php
/**
 * index.php is the home page for ITC150 project 3 group 5.
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
require 'includes/config_0700.php';

//Set SQL statement
$sql = 'SELECT c.CategoryID, f.Subject Feed_Name, c.Subject Category_Name, FeedID
        FROM Feed f
        JOIN Category c
        ON f.CategoryID = c.CategoryID
        ORDER BY c.Subject;
        ';

$db = db_conn();            //Make Database connection
$sql = $db->prepare($sql);  //Prepare SQL statement
$sql->execute();            //Execute SQL
$results = $sql->fetchAll();//Store results
$sql->closeCursor();        //Close the connection for safety

//var_dump($results);
//die();

 ?>

  <div class="banner" id="index">
    <a href='index.php'><img class="corner" src="images/corner-triangle-news.png" alt="News"></a>
  <h1>News Stand</h1>  
  </div>

<?php

/*DB result 
array(9) { [0]=> array(8) { 
    ["CategoryID"]=> string(1) "1" 
    [0]=> string(1) "1" 
    
    ["Feed_Name"]=> string(8) "Painting" 
    [1]=> string(8) "Painting" 
    
    ["Category_Name"]=> string(3) "Art" 
    [2]=> string(3) "Art" 
    
    ["FeedID"]=> string(1) "1" 
    [3]=> string(1) "1"
*/
    //Foreach loop to populate the list from the database.
    $i = 0;
    $panel = 1;
    //Loop through all entries
    while($i < count($results)) {
        
        
        $category = $results[$i]['Category_Name'];
        //Echo Div and h2 tag
        echo '<div class="panels">
                <div class="panel panel' .  $panel . '">
                    <h2>' . $category . '</h2>
                    <ul>
                ';
//        echo'<li><a href="./view.php?id=' . $results[$i]['FeedID'] . '">' . $results[$i]['Feed_Name'] . '</a></li>';
        
        //Loop for various feeds.
        while ($category == $results[$i]['Category_Name']) {
            $i++;
            echo'<li><a href="./view.php?id=' . $results[$i]['FeedID'] . '">' . $results[$i]['Feed_Name'] . '</a></li>';
             //Feed + FeedID 
            
        }
        echo '</ul>
                </div>';
        $i++;
        $panel++;
    }
?>

<!--
  <div class="panels">
    <div class="panel panel1">
      <h2>Tech</h2> //Category
      <ul>
        <li><a href="view.php?companies">Companies</a></li> //Feed + FeedID
        <li><a href="#">New Gadgets</a></li>
        <li><a href="#">New Discoveries</a></li>
      </ul>
    </div>
    <div class="panel panel2">
      <h2>Sports</h2>
      <ul>
        <li><a href="#">Running </a></li>
        <li><a href="#">Jumping</a></li>
        <li><a href="#">Swimming</a></li>
      </ul>
    </div>
    <div class="panel panel3">
      <h2>Art</h2>
      <ul>
        <li><a href="#">Finger Painting</a></li>
        <li><a href="#">Singing</a></li>
        <li><a href="#">Interpretive Dance</a></li>
      </ul>
    </div>
  </div>
-->
<?php include 'includes/footer.php'; ?>
