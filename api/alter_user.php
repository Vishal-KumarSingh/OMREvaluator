<?php
include "../include/conn.php";


if($_POST["id"]==0){
    $sql = "insert into  students (roll, name ) values (".$_POST["roll"].",'".$_POST["name"]."' )";
   echo "Student inserted successfully";
}else{
    $sql = "update students set roll=".$_POST["roll"].", name='".$_POST["name"]."' where id=".$_POST["id"];
    echo "Student updated successfully";   
    
}

mysqli_query($conn , $sql);
?>