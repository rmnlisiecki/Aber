<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

define('DISABLE_CACHE', true);

$servername = "localhost";
$username = "languoco_user";
$password = "r19l87r19l87";
$databaseName = "languoco_database";
$table = "users";

$explodedInformation = explode(";", $_GET['q']);
$emailUser = "$explodedInformation[0]";
$userEmailExploaded = explode("@", $emailUser);
$emailUser = "$userEmailExploaded[0]";


$link = mysqli_connect($servername ,$username, $password) or die("failed to connect to server !!");
mysqli_select_db($link, $table);
{

    $sql2 = "SELECT * FROM $databaseName.$table WHERE (Username = '$emailUser')";
    $result = mysqli_query($link, $sql2);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $result = $row["WordsNumber"];
        }
        echo $result . ";";
    }


    $sql2 = "SELECT * FROM $databaseName.$table WHERE (Username = '$emailUser')";
    $result = mysqli_query($link, $sql2);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $result = $row["WordLevelOption"];
        }
        echo $result . ";";
    }
}

mysqli_close($link);

?>



