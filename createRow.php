<?php

/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

// array for JSON response
$response = array();

$host='localhost';
$uname='smartmirror';
$pwd='sharm@pleas3';
$db="smartmirror";

$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
mysql_select_db($db,$con) or die("db selection failed");


// check for required fields
if (isset($_POST['coordinatesX']) && isset($_POST['coordinatesY'])) {

    $coordinatesX = $_POST['coordinatesX'];
    $coordinatesY = $_POST['coordinatesY'];

    // mysql inserting a new row
    $result = mysql_query("INSERT INTO coords(coordinatesX, coordinatesY) VALUES('$coordinatesX', '$coordinatesY')", $con);
    echo "Values have been inserted into coords table";
}

?>
