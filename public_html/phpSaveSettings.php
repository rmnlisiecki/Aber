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

$defaultLanguageLearnt = "$explodedInformation[0]";
$defaultLanguageNative = "$explodedInformation[1]";
$defaultWordsNumber = "$explodedInformation[2]";
$defaultWordLevelOption = "$explodedInformation[3]";
$defaultSoundSettings = "$explodedInformation[4]";
$defaultRememberingCoefficient = "$explodedInformation[5]";

$emailUser = "$explodedInformation[6]";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databaseName);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE $table SET LearntLanguage = '$defaultLanguageLearnt', NativeLanguage = '$defaultLanguageNative', WordsNumber = $defaultWordsNumber, WordLevelOption = '$defaultWordLevelOption', SoundSettings = '$defaultSoundSettings', RememberingCoefficient = $defaultRememberingCoefficient WHERE Username = '$emailUser'";
//$sql = "INSERT INTO $table (LanguageLearnt, LanguageNative, WordsNumber, WordLevelOption, SoundSettings, RememberingCoefficient) VALUES ('$defaultLanguageLearnt', '$defaultLanguageNative', $defaultWordsNumber, '$defaultWordLevelOption', '$defaultSoundSettings', $defaultRememberingCoefficient) WHERE id = 1";

if (mysqli_query($conn, $sql)) {
    echo "1";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
