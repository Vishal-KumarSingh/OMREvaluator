<?php
include "../include/conn.php";
$sql = "DELETE FROM `students` WHERE `students`.`id` = ".$_POST["id"];
mysqli_query($conn , $sql);

?>