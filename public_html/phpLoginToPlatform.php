<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$servername = "localhost";
$username = "languoco_user";
$password = "r19l87r19l87";
$databaseName = "languoco_database";
$table = "users";

$explodedInformation = explode(";", $_GET['q']);

$userEmail = "$explodedInformation[0]";
$userPassword = "$explodedInformation[1]";
$date = "$explodedInformation[2]";

$link = mysqli_connect($servername, $username, $password) or die("failed to connect to server!!");
mysqli_select_db($link, $table);
{
    $sql2 = "SELECT * FROM $databaseName.$table WHERE Username = '$userEmail'";
    $result = mysqli_query($link, $sql2);
    $row = mysqli_fetch_assoc($result);
    $result2 = $row["Password"];
    if ($result2 == $userPassword){
        echo "1";
    }
    else {
        echo "0";
    }
}


$date = str_replace("-", "", $date);
$date = (int)$date;
//set ifLearntToday = 1 if excess certain date
mysqli_select_db($link, $userEmail);
$sql = "UPDATE $databaseName.$userEmail SET ifToBeLearntToday = 1 WHERE nextRepetition <= $date AND nextRepetition > 0";
$result = mysqli_query($link, $sql);


mysqli_close($link);
?>