<?php
include "../include/conn.php";
$answers = $_POST["answers"];
//print_r($answers);
$question = explode( " " ,$answers);
print_r($question);


for($i=1; $i<=40;$i++){
    $answer = $question[$i];
    $sql ="UPDATE `answer` SET `answer` = '".$answer."' WHERE `answer`.`question_no` = ".$i;
    mysqli_query($conn , $sql);
}
?>