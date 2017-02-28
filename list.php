<?php
/**
 * index.php is the home page for ITC150 project 3 group 5.
 * This page acts as a switch to further define what subject to read about
 *
 * @package nmCommon?
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
<div id="list-page"><!-- enables styles for list page -->

<h3>Tech</h3>
<div class="panel panel1">
  <h2>Companies</h2>
  <ul>
    <li><a href="list.php?companies">Companies</a></li>
    <li><a href="#">New Gadgets</a></li>
    <li><a href="#">New Discoveries</a></li>
  </ul>
</div>


</div><!-- END list-page ID -->
<?php include 'includes/footer.php'; ?>
