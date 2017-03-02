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
 ?>

  <div class="banner" id="index">
    <a href='index.php'><img class="corner" src="images/corner-triangle-news.png" alt="News"></a>
  <h1>News Stand</h1>
  </div>
  <div class="panels">
    <div class="panel panel1">
      <h2>Tech</h2>
      <ul>
        <li><a href="view.php?companies">Companies</a></li>
        <li><a href="#">Discoveries</a></li>
        <li><a href="#">Gadgets</a></li>
      </ul>
    </div>
    <div class="panel panel2">
      <h2>Sports</h2>
      <ul>
        <li><a href="#">Climbing</a></li>
        <li><a href="#">Cycling</a></li>
        <li><a href="#">Running</a></li>
      </ul>
    </div>
    <div class="panel panel3">
      <h2>Art</h2>
      <ul>
        <li><a href="#">Dance</a></li>
        <li><a href="#">Painting</a></li>
        <li><a href="#">Sculpture</a></li>
      </ul>
    </div>

  </div>
<?php include 'includes/footer.php'; ?>
