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

$user = "$explodedInformation[0]";
$email = "$explodedInformation[1]";
$pass = "$explodedInformation[2]";
$learntLanguage = "$explodedInformation[3]";
$nativeLanguage = "$explodedInformation[4]";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databaseName);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO $table (Username, Password, Email, NativeLanguage, LearntLanguage, WordsNumber) VALUES ('$user', '$pass', '$email', '$learntLanguage', '$nativeLanguage', 50)";

if (mysqli_query($conn, $sql)) {
    echo "1";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
