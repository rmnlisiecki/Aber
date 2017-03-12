<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$servername = "localhost";
$username = "languoco_user";
$password = "r19l87r19l87";
$databaseName = "languoco_database";
$table = "wordsDatabase";

$explodedInformation = explode(";", $_GET['q']);

$wordsToLearn = $explodedInformation[0];
$wordsToLearn = (int)$wordsToLearn;

$wordsLevel = $explodedInformation[1];
$knowledgeArea = $explodedInformation[2];
$partOfSpeech = $explodedInformation[3];
$zeroNextRepetition = "00000000";

$userEmail = "$explodedInformation[4]";
$userEmailExploaded = explode("@", $userEmail);
$userEmailWithoutAt = "$userEmailExploaded[0]";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $databaseName);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//$sql = "UPDATE members SET ifToBeLearntToday = 1 WHERE ifToBeLearntToday = 0 LIMIT $wordsToLearn4";
$sql = "UPDATE $userEmailWithoutAt SET ifToBeLearntToday = 1 WHERE (ifToBeLearntToday = 0 AND wordLevel = '$wordsLevel' AND nextRepetition = 0) LIMIT $wordsToLearn";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>