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

$currentDate = "$explodedInformation[1]";
$currentDate = str_replace('-','',$currentDate);
$currentDate = (int)$currentDate;
$currentDate0 = $currentDate + 0;
$currentDate1 = $currentDate + 1;
$currentDate2 = $currentDate + 2;
$currentDate3 = $currentDate + 3;
$currentDate4 = $currentDate + 4;
$currentDate5 = $currentDate + 5;
$currentDate6 = $currentDate + 6;
$currentDate7 = $currentDate + 7;
$currentDate8 = $currentDate + 8;
$currentDate9 = $currentDate + 9;
$currentDate10 = $currentDate + 10;


function writeDay($day)
{
    if ($day == 0){
        return " słów";
    } else if ($day == 1){
        return " słowo";
    } else if ($day < 5){
        return " słowa";
    } else if ($day < 22){
        return " słów";
    } else if (substr($day, -1) == 2 || substr($day, -1) == 3 || substr($day, -1) == 4 || substr($day, -1) == '2' || substr($day, -1) == '3' || substr($day, -1) == '4'){
        return " słowa";
    } else {
        return " słów";
    }
}

$table = "$emailUser";

$link = mysqli_connect($servername ,$username, $password) or die("failed to connect to server !!");
mysqli_select_db($link, $table);
{

    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (nextRepetition < $currentDate1 AND nextRepetition > 1)";
    $day = mysqli_query($link, $sql2);
    $day = mysqli_num_rows($day);
    echo "Dzisiaj --> ".$day.writeDay($day).";";


    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (nextRepetition = $currentDate1)";
    $day = mysqli_query($link, $sql2);
    $day = mysqli_num_rows($day);
    echo "Jutro --> ".$day.writeDay($day).";";


    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (nextRepetition = $currentDate2)";
    $day = mysqli_query($link, $sql2);
    $day = mysqli_num_rows($day);
    echo "Za 2 dni --> ".$day.writeDay($day).";";


    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (nextRepetition = $currentDate3)";
    $day = mysqli_query($link, $sql2);
    $day = mysqli_num_rows($day);
    echo "Za 3 dni --> ".$day.writeDay($day).";";


    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (nextRepetition = $currentDate4)";
    $day = mysqli_query($link, $sql2);
    $day = mysqli_num_rows($day);
    echo "Za 4 dni --> ".$day.writeDay($day).";";


    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (nextRepetition = $currentDate5)";
    $day = mysqli_query($link, $sql2);
    $day = mysqli_num_rows($day);
    echo "Za 5 dni --> ".$day.writeDay($day).";";


    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (nextRepetition = $currentDate6)";
    $day = mysqli_query($link, $sql2);
    $day = mysqli_num_rows($day);
    echo "Za 6 dni --> ".$day.writeDay($day).";";


    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (nextRepetition = $currentDate7)";
    $day = mysqli_query($link, $sql2);
    $day = mysqli_num_rows($day);
    echo "Za 7 dni --> ".$day.writeDay($day).";";


    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (nextRepetition = $currentDate8)";
    $day = mysqli_query($link, $sql2);
    $day = mysqli_num_rows($day);
    echo "Za 8 dni --> ".$day.writeDay($day).";";


    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (nextRepetition = $currentDate9)";
    $day = mysqli_query($link, $sql2);
    $day = mysqli_num_rows($day);
    echo "Za 9 dni --> ".$day.writeDay($day).";";


    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE (nextRepetition = $currentDate10)";
    $day = mysqli_query($link, $sql2);
    $day = mysqli_num_rows($day);
    echo "Za 10 dni --> ".$day.writeDay($day).";";

}

mysqli_close($link);

?>



