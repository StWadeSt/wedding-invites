<?php

use LDAP\Result;




function pushToDB($rsvp, $attending, $food, $music)
{
    require('dbConn.php');

    $query1 = "UPDATE `guests` SET `attending`='$attending',`foodOption`='$food', `musicRequest` = '$music' WHERE `rsvpCode` = '$rsvp'";

    $result = mysqli_query($conn, $query1) or die();

    header("Location: confirmPage.php");
}
