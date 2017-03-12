<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$servername = "localhost";
$username = "languoco_user";
$password = "r19l87r19l87";
$databaseName = "languoco_database";
$table = "wordsDatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databaseName);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//$wordStringExploded = explode(";", $_GET['q']);
$explodedInformation = explode(";", $_GET['q']);
$wordPol = "$explodedInformation[0]";
$emailUser = "$explodedInformation[1]";
$date = "$explodedInformation[2]";


//$sql = "UPDATE $table SET lastTimedelta = '$lastTimedelta', nextRepetition = '$nextRepetition', ifToBeLearntToday = '$ifToBeLearntToday' WHERE id = '$id'";
//$sql = "UPDATE $emailUserWithoutAt SET repetitionsToday = repetitionsToday + 1, lastTimedelta = 1 WHERE wordPol = '$wordPol'";
$sql = "UPDATE $emailUser SET repetitionsToday = repetitionsToday + 1 WHERE wordPol = '$wordPol'";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>