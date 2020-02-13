<?php
$servername = "smdb2.ckwlewdgil7r.us-east-2.rds.amazonaws.com";
$username = "smartmirror";
$password = "hksahfih18$?";
$dbname = "smartmirror";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if($conn->connect_error){
        die('Connect error: ' . $conn->connect_error);
}

else{

        //get unique ID of newly logged in user here
        //for now we will hard code it in
        $UNIQUE_ID = 'A124';

        $sql0 = 'update settings set currently_used=0 where currently_used=1';
        $sql = "update settings set currently_used=1 where UNIQUE_ID='".$UNIQUE_ID."'";

        $conn->query($sql0);
        $conn->query($sql);
        $conn->close();
}

?>

