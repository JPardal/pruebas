<?php

error_reporting(E_ALL);

require("class_rrobin.php");

// Lets create a round robin style tournament between some of our dear physicists.
$competitors = array(
    'J1', 
    'J2', 
 //   'J3', 
//    'J4',
	'J5');

$robin = new RRobin();
$robin->create($competitors);

echo $robin->tot_games . " games scheduled:\n";
print_r($robin->tour);

?>
