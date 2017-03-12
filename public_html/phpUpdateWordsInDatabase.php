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

$explodedInformation = explode(";", $_GET['q']);
$wordPol = "$explodedInformation[0]";
$emailUser = "$explodedInformation[1]";
$date = "$explodedInformation[2]";


//calculate new repetition date
$sql = "SELECT * FROM $databaseName.$emailUser WHERE ifToBeLearntToday=1 ORDER BY repetitionsToday ASC, id ASC LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $lastTimedelta = $row["lastTimedelta"];
        $repetitionsToday = $row["repetitionsToday"];
    }
}

if ($repetitionsToday == 0){
    $newTimedelta = round((int)$lastTimedelta * 1.5);
} else {
    $newTimedelta = 2;
}

if ($newTimedelta == 0){
    $newTimedelta = 2;
}
if ($newTimedelta == 1){
    $newTimedelta = 2;
}


$nextRepetition = $date;
$nextRepetition = strtotime($date . '+'.$newTimedelta.' days');
$nextRepetition = date('Y-m-d', $nextRepetition);
$nextRepetition = str_replace("-", "", $nextRepetition);

//end of calculation



$sql = "UPDATE $emailUser SET lastTimedelta = $newTimedelta, nextRepetition = $nextRepetition, ifToBeLearntToday = 0, repetitionsToday = 0 WHERE wordPol = '$wordPol'";
//$sql = "UPDATE $emailUserWithoutAt SET lastTimedelta = round(lastTimedelta * 1.5), nextRepetition = 20160615, ifToBeLearntToday = 0, repetitionsToday = 0 WHERE wordPol = '$wordPol'";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>