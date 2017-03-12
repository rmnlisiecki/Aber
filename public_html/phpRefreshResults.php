<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

define('DISABLE_CACHE', true);

$servername = "localhost";
$username = "languoco_user";
$password = "r19l87r19l87";
$databaseName = "languoco_database";
$table = "wordsDatabase";

$explodedInformation = explode(";", $_GET['q']);
$emailUser = "$explodedInformation[0]";
$userEmailExploaded = explode("@", $emailUser);
$emailUser = "$userEmailExploaded[0]";

$table = "$emailUser";

$link = mysqli_connect($servername ,$username, $password) or die("failed to connect to server !!");
mysqli_select_db($link, $table);
{

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (wordLevel = 'a1' AND nextRepetition != 0)";
    $resultA1 = mysqli_query($link, $sql2);
    $resultA1 = mysqli_num_rows($resultA1);
    echo $resultA1.";";

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (wordLevel = 'a1')";
    $resultA1 = mysqli_query($link, $sql2);
    $resultA1 = mysqli_num_rows($resultA1);
    echo $resultA1.";";

    ////////////////////////

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (wordLevel = 'a2' AND nextRepetition != 0)";
    $resultA2 = mysqli_query($link, $sql2);
    $resultA2 = mysqli_num_rows($resultA2);
    echo $resultA2.";";

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (wordLevel = 'a2')";
    $resultA2 = mysqli_query($link, $sql2);
    $resultA2 = mysqli_num_rows($resultA2);
    echo $resultA2.";";

    ////////////////////////

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (wordLevel = 'b1' AND nextRepetition != 0)";
    $resultB1 = mysqli_query($link, $sql2);
    $resultB1 = mysqli_num_rows($resultB1);
    echo $resultB1.";";

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (wordLevel = 'b1')";
    $resultB1 = mysqli_query($link, $sql2);
    $resultB1 = mysqli_num_rows($resultB1);
    echo $resultB1.";";

    ////////////////////////

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (wordLevel = 'b2' AND nextRepetition != 0)";
    $resultB2 = mysqli_query($link, $sql2);
    $resultB2 = mysqli_num_rows($resultB2);
    echo $resultB2.";";

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (wordLevel = 'b2')";
    $resultB2 = mysqli_query($link, $sql2);
    $resultB2 = mysqli_num_rows($resultB2);
    echo $resultB2.";";

    ////////////////////////

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (wordLevel = 'c1' AND nextRepetition != 0)";
    $resultC1 = mysqli_query($link, $sql2);
    $resultC1 = mysqli_num_rows($resultC1);
    echo $resultC1.";";

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (wordLevel = 'c1')";
    $resultC1 = mysqli_query($link, $sql2);
    $resultC1 = mysqli_num_rows($resultC1);
    echo $resultC1.";";

    ////////////////////////

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (wordLevel = 'c2' AND nextRepetition != 0)";
    $resultC2 = mysqli_query($link, $sql2);
    $resultC2 = mysqli_num_rows($resultC2);
    echo $resultC2.";";

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (wordLevel = 'c2')";
    $resultC2 = mysqli_query($link, $sql2);
    $resultC2 = mysqli_num_rows($resultC2);
    echo $resultC2.";";

}

mysqli_close($link);

?>



