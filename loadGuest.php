<?php

function loadGuest()
{

    $guestList = ["Jennica Jacobs", "Jenine Thockey", "Ferlin Arends", "Jennah Hurree", "Boitumelo Diale", "Bonga Magazi", "Maahier Maloon", "Xaviar Poole", "Donna Europa", "Nurhal", "Nico Busby", "Ryab Busby", "Shuan Baron", "Yolanda Baron", "Jo-Ann Solomans", "Selvin Solomans", "Dawie Olivier", "Elenor Olivier", "Ann Smith", "Leigh-Lynn Le Fleur", "Sandra Bason", "Japhet Kalombo", "Mano Olivier", "Maxine Olivier", "Sheroll Jansen", "Trevor Jansen", "Nadine Patterson", "Rochelle Jasson", "Donnie Jasson", "Maurisha Jasson", "Lauren Jasson", "Arthur Kayster", "Andrea Hendricks", "Maurisha Olivier", "Zhaundrea Bason", "Gavin Klein", "Angie Klein", "Raedene Naidoo", "Anver Naidoo", "Linda Patterson", "Ben Patterson", "Marie Smith", "Jaco Smith"];

    $rsvpList = ['63', '64', '65', '66', '67', '68', '69', '70', '71', '72', '73', '74', '75', '76', '77', '78', '79', '80', '81', '82', '83', '84', '85', '86', '87', '88', '89', '90', '91', '92', '93', '94', '95', '96', '97', '98', '99', '100', '101', '102', '103', '104', '105'];

    for ($i = 0; $i < count($guestList); $i++) {

        $a = strval(rand(0, 9));
        $b = strval(rand(0, 9));

        $code =  strval($rsvpList[$i] . '' . $a . '' . $b);

        require('dbConn.php');
        $query = "INSERT INTO `guests`(`rsvpCode`, `name`) VALUES ('$code','$guestList[$i]')";

        $result = mysqli_query($conn, $query) or die();
    }
}

function getRsvps()
{
    require('dbConn.php');

    $query = "SELECT `name` FROM `guests`";

    $result = mysqli_query($conn, $query) or die(); //executing the sql statement
    $rows = mysqli_num_rows($result); //checking whether there are any users with matching information and how many there are

    if ($rows > 0) // if theres one record found with mathing information 
    {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['name']) {
                $str = "'" . $row['name'] . "', ";
                $msg = `<p>$str.' '</p>`;
                echo $str;
            }
        }
    }
}
