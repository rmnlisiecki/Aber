<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

define('DISABLE_CACHE', true);

$servername = "localhost";
$username = "languoco_user";
$password = "r19l87r19l87";
$databaseName = "languoco_database";

$tableUsers = "users";
$emailUser = $_GET['q'];
$table = "$emailUser";

$link = mysqli_connect($servername ,$username, $password) or die("failed to connect to server !!");

//*********************
mysqli_select_db($link, $tableUsers);
{
    $sql2 = "SELECT * FROM $databaseName.$tableUsers WHERE (Username = '$emailUser') LIMIT 1";
    $result = mysqli_query($link, $sql2);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $nativeLanguage = $row["NativeLanguage"];
            $learntLanguage = $row["LearntLanguage"];
        }
    } 
}


//*********************

$nativeLanguageWord = "word" . $nativeLanguage;
$nativeLanguageSentence = "sentence" . $nativeLanguage;;
$learntLanguageWord = "word" . $learntLanguage;
$learntLanguageSentence = "sentence" . $learntLanguage;


mysqli_select_db($link, $table);

{
    $sql2 = "SELECT * FROM $databaseName.$emailUser WHERE ifToBeLearntToday=1 ORDER BY repetitionsToday ASC, id ASC LIMIT 1";
    $result = mysqli_query($link, $sql2);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $result2 = $row["$nativeLanguageWord"];
            echo $result2.";";
            $result3 = $row["$learntLanguageWord"];
            echo $result3.";";
            $result4 = $row["$nativeLanguageSentence"];
            echo $result4.";";
            $result5 = $row["$learntLanguageSentence"];
            echo $result5.";";
        }
    } else {
        echo "Brak słów do nauki;Lack of words to repeat;Wybierz nowe słowa... albo poczekaj na kolejne powtórki;Choose new words... or wait for new repetitions";
    }
}

mysqli_close($link);

?>



