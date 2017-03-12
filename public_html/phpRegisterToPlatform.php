<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$servername = "localhost";
$username = "languoco_user";
$password = "r19l87r19l87";
$databaseName = "languoco_database";
$table = "users";

$databaseNameWords = "languoco_database";
$oldTableWords = "wordsDatabase";

$explodedInformation = explode(";", $_GET['q']);

$userEmail = "$explodedInformation[0]";
$userEmailExploaded = explode("@", $userEmail );
$userEmailWithoutAt = "$userEmailExploaded[0]";

$userPassword = "$explodedInformation[1]";
$userPasswordRepeat = "$explodedInformation[2]";
$languageLearntRegister = "$explodedInformation[3]";
$languageNativeRegister = "$explodedInformation[4]";
$languageLevel = "$explodedInformation[5]";
$date = "$explodedInformation[6]";
$date = str_replace("-", "", $date);
$email2 = "$explodedInformation[7]";


if ($userPassword !=$userPasswordRepeat){
    echo "000";
} else{

    $link = mysqli_connect($servername, $username, $password) or die("failed to connect to server!!");
    mysqli_select_db($link, $table);
    {
        $sql2 = "SELECT * FROM $databaseName.$table WHERE (Username = '$userEmail')";
        $resultTemp = mysqli_query($link, $sql2);
        if (mysqli_num_rows($resultTemp) > 0){
            echo "00";
        } else {
            $sql2 = "INSERT INTO $databaseName.$table (Username, Password, Email, NativeLanguage, LearntLanguage, WordLevelOption, WordsNumber, RegistrationDate) VALUES ('$userEmail', '$userPassword', '$email2', '$languageNativeRegister', '$languageLearntRegister', '$languageLevel', 50, $date)";
            mysqli_query($link, $sql2);
            echo "1";
            $sql2 = "CREATE TABLE $databaseNameWords.$userEmailWithoutAt (id int(10), wordPol varchar(128), wordEng varchar(128), sentencePol varchar(128), sentenceEng varchar(128),wordFrench varchar(128), sentenceFrench varchar(128), wordSpanish varchar(128), sentenceSpanish varchar(128), wordGerman varchar(128), sentenceGerman varchar(128), wordItalian varchar(128), sentenceItalian varchar(128), wordNorwegian varchar(128), sentenceNorwegian varchar(128), wordRussian varchar(128), sentenceRussian varchar(128), wordChinese varchar(128), sentenceChinese varchar(128), 
ifToBeLearntToday varchar(128), repetitionsToday varchar(128), nextRepetition date, lastTimedelta varchar(128), speechPart varchar(128), wordScope varchar(128), wordLevel varchar(128))";
            mysqli_query($link, $sql2);
            $sql2 = "INSERT INTO $databaseNameWords.$userEmailWithoutAt (id, wordPol, wordEng, sentencePol, sentenceEng, wordFrench, sentenceFrench, 
wordSpanish, sentenceSpanish, wordGerman, sentenceGerman, wordItalian, sentenceItalian, wordNorwegian, sentenceNorwegian, wordRussian, sentenceRussian, wordChinese, sentenceChinese,
ifToBeLearntToday, repetitionsToday, nextRepetition, lastTimedelta, speechPart, wordScope, wordLevel) SELECT id, wordPol, wordEng, sentencePol, sentenceEng, wordFrench, sentenceFrench, wordSpanish, sentenceSpanish, wordGerman, sentenceGerman, wordItalian, sentenceItalian, wordNorwegian, sentenceNorwegian, wordRussian, sentenceRussian, wordChinese, sentenceChinese, 
ifToBeLearntToday, repetitionsToday, nextRepetition, lastTimedelta, speechPart, wordScope, wordLevel FROM $databaseNameWords.$oldTableWords";
            mysqli_query($link, $sql2);
        }
    }
}


mysqli_close($link);
?>