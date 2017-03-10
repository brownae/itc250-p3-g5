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
 include'includes/config.php';
echo '
  <!-- This is the alert that prompts mobile devices to use landscape mode -->
  <div id="dialog" title="Hey wait!">
  <p>This page is best <br>veiwed in landscape</p>
  <img src="images/icon-horizontal.png" alt="Best viewed in landscape view" />

  </div>';

  $sql = '
    SELECT c.CategoryID, f.Subject Feed_Name, c.Subject Category_Name, FeedID
<<<<<<< Updated upstream
    FROM Feed f
    JOIN Category c
=======
    FROM ' . PREFIX . 'Feed f
    JOIN ' . PREFIX . 'Category c
>>>>>>> Stashed changes
    ON f.CategoryID = c.CategoryID
    ORDER BY c.Subject;
  ';//CLose sql query

  $db = db_conn();              //Make db connection
  $sql = $db->prepare($sql);    //Prepare SQL statement
  $sql->execute();              //Execute SQL
  $results = $sql->fetchAll();  //Store results
  $sql->closeCursor();          //Close the connection for safety

  // echo "<pre>";
  // var_dump($results);
  // echo "</pre>";
  // die();

   echo '
    <div class="banner" id="index">
      <a href="index.php"><img class="corner" src="images/corner-triangle-news.png" alt="News"></a>
    <h1>News Stand</h1>
    </div>
    <div class="panels">';

    //Foreach loop to populate the list from the database.
    $i = 0;
    $panel = 1;
    //Loop through all entries
    while($i < count($results)) {

        $category = $results[$i]['Category_Name'];
        //Echo Div and h2 tag
        echo '  <div class="panel panel' .  $panel . '">
                    <h2>' . $category . '</h2>
                    <ul>
                ';

        //Loop for various feeds.
        while ($category == $results[$i]['Category_Name']) {

            echo'<li><a href="./view.php?id=' . $results[$i]['FeedID'] . '">' . $results[$i]['Feed_Name'] . '</a></li>';
             //Feed + FeedID
            $i++;
        }
        echo '</ul>
                </div>';
        //$i++;
        $panel++;
    }

    echo '</div>';



     //
    //       foreach ($results as $key => $value) {
    //         // if($key == 'CategoryID'){
    //         echo '<div class="panel panel' . $key['CategoryID'] . '">
    //         <h2>' . $key['Category_Name'] . '</h2>
     //
    //         <ul>
    //           <li><a href="view.php?companies">Companies</a></li>
    //           <li><a href="#">Discoveries</a></li>
    //           <li><a href="#">Gadgets</a></li>
    //         </ul>
    //         </div>';
    //         // }
    //       }
    //  //
    //   echo '</div>';


include 'includes/footer.php';
