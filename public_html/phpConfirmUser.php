<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$servername = "localhost";
$username = "languoco_user";
$password = "r19l87r19l87";
$databaseName = "languoco_database";
$table = "users";


///password acceptance
$explodedInformation = explode(";", $_GET['q']);

$user = "$explodedInformation[0]";
$pass = "$explodedInformation[1]";
$currentDate = "$explodedInformation[2]";

$link = mysqli_connect($servername ,$username, $password) or die("failed to connect to server !!");
mysqli_select_db($link, $table);

$sql2 = "SELECT * FROM $databaseName.$table WHERE (Username = '$user' AND Password = '$pass')";
$result = mysqli_query($link, $sql2);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $result = $row["Password"];
        if ($result != ""){
            $first = 1;
        }
    }
} else {
    $first = 0;
}
mysqli_close($link);

///SQL check words to learnt for today
$databaseName = "languoco_database";
$table = "wordsDatabase";

$link = mysqli_connect($servername ,$username, $password) or die("failed to connect to server !!");
mysqli_select_db($link, $table);

$sql2 = "UPDATE $databaseName.$table SET ifToBeLearntToday = '1' WHERE (nextRepetition <= '$currentDate' AND nextRepetition >= '19000101')";
$result = mysqli_query($link, $sql2);

///ifToBeLearntToday = 1
$databaseName = "languoco_database";
$table = "wordsDatabase";

$link = mysqli_connect($servername ,$username, $password) or die("failed to connect to server !!");
mysqli_select_db($link, $table);

$sql2 = "SELECT * FROM $databaseName.$table WHERE (ifToBeLearntToday = 1)";
$result = mysqli_query($link, $sql2);
$second = (mysqli_num_rows($result));

///nextRepetition > 0
$databaseName = "languoco_database";
$table = "wordsDatabase";

$link = mysqli_connect($servername ,$username, $password) or die("failed to connect to server !!");
mysqli_select_db($link, $table);

$sql2 = "SELECT * FROM $databaseName.$table WHERE (nextRepetition != 0)";
$result = mysqli_query($link, $sql2);
$third = (mysqli_num_rows($result));

///learntWords
$databaseName = "languoco_database";
$table = "wordsDatabase";

$link = mysqli_connect($servername ,$username, $password) or die("failed to connect to server !!");
mysqli_select_db($link, $table);

$sql2 = "SELECT * FROM $databaseName.$table WHERE (lastTimedelta > 10)";
$result = mysqli_query($link, $sql2);
$forth = (mysqli_num_rows($result));

//////////////////////////////////////////////////////
$send = $first.";".$second.";".$third.";".$forth;
echo $send;


mysqli_close($link);

?>